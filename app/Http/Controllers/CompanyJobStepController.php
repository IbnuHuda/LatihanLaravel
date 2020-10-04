<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersJobRegistered;
use App\CompanyJobStep;
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

    function assesmentForm(){

        $result = UsersJobRegistered::orderBy('score','desc')->paginate(8);
        return view('pages.company.activity.assesment', compact('result'));
    }

    function assesmentProcess(Request $request){
        $total = count($request->accept) ;
        for ($i=0; $i < $total; $i++) {
            $new = new CompanyJobStep;
            $new->company_job_id = $request->company_job_id[$i];
            $new->step_name = $request->step_name[$i];
            $new->user_id_accepted	 = $request->user_id_accept[$i];
            $new->inweb_message_to_vendor = $request->inweb_message_to_vendor[$i];
        $new->save();          # code...

        }


        return redirect()->route('companyStepAssesment')->with(session()->flash('alert-success', 'Assesment successful!'));
    }

}
