<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersJobRegistered;
use App\CompanyJobs;
use Illuminate\Support\Facades\Auth;

class CompanyJobStepController extends Controller
{
    function submissionForm(Request $request){
        $user = Auth::guard('company')->user()->id;
        $session = $request->session()->put($user);
        $list_user_jobs = UsersJobRegistered::orderBy('id','desc')->paginate(8);

        // return $list_user_jobs;
        // $reques
        return view('pages.company.activity.submission', compact('list_user_jobs'));

    }
}
