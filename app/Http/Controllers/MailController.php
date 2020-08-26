<?php

namespace App\Http\Controllers;

use App\Mail\CompanyRegister;
use App\Mail\CompanyResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
	public static function sendRegisterEmail($name, $email, $verification_code)
	{
		$data = [
			'name' => $name,
			'verification_code' => $verification_code
		];

		Mail::to($email)->send(new CompanyRegister($data));
	}

	public static function sendResetPassword($email, $token)
	{
		$data = ['token' => $token];

		Mail::to($email)->send(new CompanyResetPassword($data));
	}
}
