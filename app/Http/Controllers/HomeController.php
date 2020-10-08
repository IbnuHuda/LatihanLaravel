<?php

namespace App\Http\Controllers;

use App\CompanyJobs;
use App\StatisticUsers;
use App\TeamProfile;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_stat = StatisticUsers::where('user_id', '=', Auth::user()->id)->first();
        $data_jobs = CompanyJobs::orderBy('created_at', 'desc')->take(3)->get();
        $data_team = TeamProfile::where('id', '=', Auth::user()->team_id)->first();

        return view('pages.vendor.dashboard', compact('data_stat', 'data_jobs', 'data_team'));
    }
}
