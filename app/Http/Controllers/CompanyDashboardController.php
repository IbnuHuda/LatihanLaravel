<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyDashboardController extends Controller
{
    public function home()
    {
    	return view('pages.company.dashboard');
    }
}
