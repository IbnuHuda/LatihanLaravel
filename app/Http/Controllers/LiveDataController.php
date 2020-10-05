<?php

namespace App\Http\Controllers;

use App\User;
use App\UsersJobRegistered;
use Illuminate\Http\Request;

class LiveDataController extends Controller
{
    public function searchUsers(Request $request)
    {
    	$result = User::where('name', '=', "{$request->name}")->get(['name', 'email']);

    	return json_encode($result);
    }

    public function getImage(Request $request) 
    {
        $data = UsersJobRegistered::where('id', '=', $request->user_registered_id)->pluck('portofolio_uploaded');

        $data = explode('|', $data[0]);

        return $data;
    }
}
