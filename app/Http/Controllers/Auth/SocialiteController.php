<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\User;
use App\UserCompany;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    use AuthenticatesUsers;

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
        try {
            if (session('type') == 'company') {
                if ($user->email_verified_at == null) {
                    
                    $verification_code = sha1(time());

                    $user->verification_code = $verification_code;
                    $user->update();

                    MailController::sendRegisterEmail($user->name, $user->email, $user->verification_code);

                    return redirect()->back()->with(session()->flash('alert-success', 'Your account is recorded. Please verify account at your email address!'));

                } else {

                    Auth::guard('company')->loginUsingId($user->id);

                    return redirect()->route('companyDashboard');
                }

            } else {
                Auth::loginUsingId($user->id);

                return redirect()->route('usersDashboard');
            }
        
        } catch (Exception $e) {
            if (session('type') == 'company') return redirect()->route('companyLogin')->withErrors(['Authentication_denied' => 'Access Denied!']);
            else return redirect('/login')->withErrors(['Access Denied']);
        }
    }
}