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

    public static function sendRequestJoinTeam($team_id, $owner_email, $id_request, $name_request)
    {
        $data = [
            'team_id' => $team_id,
            'id' => $id_request,
            'name' => $name_request
        ];

        Mail::to($owner_email)->send(new UsersRequestJoinTeam($data));
    }
}
