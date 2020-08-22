<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\UserCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
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
        ]);

        Auth::guard('company')->login($user);

        return redirect()->route('companyNewProfile');
    }

    public function loginForm()
    {
        return view('auth.companyLogin');
    }

    public function login(Request $request)
    {
    	if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password])) return redirect()->route('companyDashboard');
    	
    	return redirect('/company-login')->withErrors(['password' => 'Email or password are wrong!']);
    }

    public function profileForm()
    {
        return view('auth.companyProfile');
    }

    public function profile(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'work_field' => ['required', 'string', 'max:255'],
            'date_of_built' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'company_logo' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:255'],
            'contact_email' => ['required', 'string', 'max:255'],
            'bio' => ['required', 'string', 'max:255'],
        ]);

        UserCompany::profileCompany()->create([
            'user_company_id' => Auth::guard('company')->user()->id,
            'name' => $request->name,
            'work_field' => $request->work_field,
            'date_of_built' => $request->date_of_built,
            'address' => $request->address,
            'company_logo' => $request->company_logo,
            'contact_number' => $request->contact_number,
            'contact_email' => $request->contact_email,
            'bio' => $request->bio,
        ]);

        return redirect()->route('companyDashboard');
    }

    public function logout()
    {
        return Auth::guard('company')->logout();
    }
}
