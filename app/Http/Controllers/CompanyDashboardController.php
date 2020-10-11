<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyJobs;
use App\UsersJobRegistered;
use App\CompanyJobStep;

class CompanyDashboardController extends Controller
{
    public function home()
    {
        $data_jobs = CompanyJobs::orderBy('created_at', 'desc')->take(3)->get();
        $data_user_registered = UsersJobRegistered::all();
        $data_approval = CompanyJobStep::all();

        return view('pages.company.dashboard', compact( 'data_jobs', 'data_user_registered','data_approval'));
    }
}
