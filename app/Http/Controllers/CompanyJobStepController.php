<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersJobRegistered;
use App\CompanyJobs;
use Illuminate\Support\Facades\Auth;

class CompanyJobStepController extends Controller
{
    function submissionForm(Request $request){
        // $user = Auth::guard('company')->user()->id;
        // $session = $request->session()->put($user);
        $value = 0;
        $text = ''; // added
        for ($i=1; $i <=3; $i++) {

            $gambar = $request->gambar.$i;
            $text .= $i==1 ? $i : '+' . $i;  // added
            $value+= $gambar;

        }
        // $score_session = $request->session()->put('score',$value );
        $list_user_jobs = UsersJobRegistered::orderBy('id','desc')->paginate(8);

        // return $list_user_jobs;
        // $reques
        return view('pages.company.activity.submission', compact('list_user_jobs'));

    }

    function submissionProcess(Request $request){
        $score_result = $request->session()->get('score');

        UsersJobRegistered::updateOrCreate(
            ['id' => 2,],
        ['score' => $score_result]
        );

        return redirect()->route('companyStepSubmission')->with(session()->flash('alert-success', 'Job publish successful!'));
    }

}
