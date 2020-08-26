<?php

namespace App\Http\Controllers\Auth;

use DB;
use Validator;
use App\UserCompany;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CompanyController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'company';

    public function __construct()
    {
    	$this->middleware('guest')->except('logout');
    }

    public function guard()
    {
    	return Auth::guard('company');
    }

    public function registerForm()
    {
        return view('auth.companyRegister');
    }

    public function register(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = UserCompany::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code' => sha1(time()),
        ]);

        if (!$user) return redirect()->back()->with(session()->flash('alert-error', 'Something wrong happen, try again later!'));

        MailController::sendRegisterEmail($request->name, $request->email, $user->verification_code);

        return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created. Please verify your account first from your email before using our application!'));
    }

    public function verifyRegister(Request $request)
    {
        $verification_code = $request->code;
        $getData = UserCompany::where('verification_code', '=', $verification_code)->first();

        if ($getData != null) {
            $getData->is_verified = 1;
            $getData->email_verified_at = Carbon::now();
            $getData->save();
            return redirect()->route('companyLogin')->with(session()->flash('alert-success', 'Your account has been activated!'));
        }

        return redirect()->route('companyLogin')->with(session()->flash('alert-error', 'Something wrong happen, try again later!'));
    }

    public function loginForm()
    {
        return view('auth.companyLogin');
    }

    public function login(Request $request)
    {
    	if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password, 'is_verified' => 1], $request->filled('remember'))) return redirect()->route('companyDashboard');
    	
    	return redirect('/company-login')->withErrors(['password' => 'Email or password are wrong OR your account is not verified!']);
    }

    public function profileForm()
    {
        
    }

    public function profile(Request $request)
    {
        
    }

    public function validatePasswordRequestForm()
    {
        return view('auth.companyEmail');
    }

    public function validatePasswordRequest(Request $request)
    {
        $user = UserCompany::where('email', '=', $request->email)->first();

        if ($user == null) return redirect()->back()->withErrors(['email' => trans('Email doesnt exist.')]);

        $generateToken = sha1(time());

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $generateToken,
            'created_at' => Carbon::now()
        ]);

        try {
            MailController::sendResetPassword($request->email, $generateToken);

            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error', trans('Something wrong happen, please try again later!')]);
        }
    }

    public function resetPasswordForm(Request $request)
    {
        $data = DB::table('password_resets')->where('token', '=', $request->token)->first();

        return view('auth.companyNewPassword')->with([
            'email' => $data->email,
            'token' => $request->token
        ]);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $tokenData = DB::table('password_resets')->where('token', '=', $request->token)->first();

        if (!$tokenData) return view('auth.companyNewPassword');

        $user = UserCompany::where('email', '=', $tokenData->email)->first();

        if (!$user) return redirect()->back()->withErrors(['email', 'Email not found!']);

        $user->password = Hash::make($request->password);
        $user->update();

        Auth::guard('company')->login($user);

        DB::table('password_resets')->where('email', '=', $user->email)->delete();

        return redirect()->route('companyDashboard');
    }

    public function logout()
    {
        return Auth::guard('company')->logout();
    }
}
