<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersActivityController extends Controller
{
    public function submission()
    {
    	return view('pages.vendor.activity.submission');
    }

    public function assesment()
    {
    	return view('pages.vendor.activity.assesment');
    }

    public function approval()
    {
        return view('pages.vendor.activity.approval');
    }
}