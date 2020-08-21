<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\User;
use App\UserCompany;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($type, $provider)
    {
        session(['type' => $type]);

        try {
            $scopes = config("services.$provider.scopes") ?? [];

            if (count($scopes) == 0) return Socialite::driver($provider)->redirect();
            else return Socialite::driver($provider)->scopes($scopes)->redirect(['type' => $type]);
            
        } catch (Exception $e) {
            if (session('type') == 'company') return redirect()->route('companyLogin')->withErrors(['Authentication_denied' => 'Login with ' . ucfirst($provider) . ' failed. Please try again!']);
            else return redirect('/login')->withErrors(['Authentication_denied' => 'Login with ' . ucfirst($provider) . ' failed. Please try again!']);
        }
    }

    public function handleProviderCallback($provider)
    {
        try {
            $data = Socialite::driver($provider)->stateless()->user();

            return $this->handleSocialUser($provider, $data);

        } catch (Exception $e) {
            if (session('type') == 'company') return redirect()->route('companyLogin')->withErrors(['Authentication_denied' => 'Login with ' . ucfirst($provider) . ' failed. Please try again!']);
            else return redirect('/login')->withErrors(['Authentication_denied' => 'Login with ' . ucfirst($provider) . ' failed. Please try again!']);
        }
    }

    public function handleSocialUser($provider, $data)
    {
        if (session('type') == 'company') {
            $user = UserCompany::where(["social->{$provider}->id" => $data->id])->first();

            if (!$user) $user = UserCompany::where(['email' => $data->email])->first();
            if (!$user) return $this->createUserWithSocialData($provider, $data);

        } else {
            $user = User::where(["social->{$provider}->id" => $data->id])->first();

            if (!$user) $user = User::where(['email' => $data->email])->first();
            if (!$user) return $this->createUserWithSocialData($provider, $data);
        }

        $social = $user->social;
        $social[$provider] = [
            'id' => $data->id,
            'token' => $data->token
        ];
        $user->social = $social;
        $user->save();

        return $this->socialLogin($user);
    }

    public function createUserWithSocialData($provider, $data)
    {
        try {

            if (session('type') == 'company') $user = new UserCompany;
            else $user = new User;

            $user->name = $data->name;
            $user->email = $data->email;
            $user->social = [
                $provider => [
                    'id' => $data->id,
                    'token' => $data->token
                ]
            ];

            if ($user instanceof MustVerifyEmail) $user->markEmailAsVerified();
            $user->save();

            return $this->socialLogin($user);

        } catch (Exception $e) {
            if (session('type') == 'company') return redirect()->route('companyLogin')->withErrors(['Authentication_denied' => 'Login with ' . ucfirst($provider) . ' failed. Please try again!']);
            else return redirect('/login')->withErrors(['Authentication_denied' => 'Login with ' . ucfirst($provider) . ' failed. Please try again!']);
        }
    }

    public function socialLogin($user)
    {
        if (session('type') == 'company') {
            Auth::guard('company')->loginUsingId($user->id);

            return redirect()->route('companyDashboard');

        } else {
            Auth::loginUsingId($user->id);

            return redirect()->route('usersDashboard');
        }
    }
}
