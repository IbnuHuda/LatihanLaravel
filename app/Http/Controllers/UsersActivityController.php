<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersJobRegistered;
use Illuminate\Support\Facades\Auth;

class UsersActivityController extends Controller
{
    public function submission()
    {
        $data = UsersJobRegistered::where('user_id', '=', Auth::user()->id)->first();

        return view('pages.vendor.activity.submission', compact('data'));
    }

    public function assesment()
    {
        $data = UsersJobRegistered::where('user_id', '=', Auth::user()->id)->first();

        return view('pages.vendor.activity.assesment', compact('data'));
    }

    public function approval()
    {
        return view('pages.vendor.activity.approval');
    }
}
