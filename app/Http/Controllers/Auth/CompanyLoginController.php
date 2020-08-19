<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CompanyLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'company';

    protected $redirectTo = '/company/dashboard';

    public function __construct()
    {
    	$this->middleware('guest')->except('logout');
    }

    public function guard()
    {
    	return Auth::guard('company');
    }

    public function loginForm()
    {
        return view('auth.companyLogin');
    }

    public function login(Request $request)
    {
    	if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password])) return redirect($this->redirectTo);
    	
    	return redirect('/company-login')->withErrors(['password' => 'Email or password are wrong!']);
    }

    public function logout()
    {
        return Auth::guard('company')->logout();
    }
}
