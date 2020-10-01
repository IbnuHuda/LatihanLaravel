<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\StatisticUsers;
use App\TeamProfile;
use App\User;
use App\UsersProfile;

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
        $data_stat = StatisticUsers::where('user_id','=',Auth::user()->id)->first();
        $data_profile = UsersProfile::where('user_id','=',Auth::user()->id)->first();
        $data_team = TeamProfile::where('id', '=', Auth::user()->team_id)->first();
        return view('pages.vendor.dashboard',compact('data_stat', 'data_profile', 'data_team'));
    }
}
