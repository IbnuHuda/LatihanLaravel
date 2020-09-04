<?php

namespace App\Http\Controllers;

use App\User;
use App\UserCompany;
use Illuminate\Http\Request;

class LiveDataController extends Controller
{
    public function searchUsers(Request $request)
    {
    	$result = User::where('name', '=', "{$request->name}")->get(['name', 'email']);

    	return json_encode($result);
    }
}
