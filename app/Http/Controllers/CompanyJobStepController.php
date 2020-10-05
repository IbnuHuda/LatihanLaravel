<?php

namespace App\Http\Controllers;

use App\CompanyJobs;
use App\CompanyProfile;
use App\CompanyJobsStep;
use App\UsersJobRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyJobStepController extends Controller
{
    public function submissionForm()
    {
        $data = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

        if ($data != null) {
            $jobs = CompanyJobs::where('user_company_id', '=', Auth::guard('company')->user()->id)->get();

            return view('pages.company.activity.submission1', compact('jobs'));
        }
        else return redirect()->route('companySelfProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }

    public function submissionDetailForm($id) 
    {
        $data = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

        if ($data != null) {
            $list_user_jobs = UsersJobRegistered::where('company_job_id', '=', $id)->orderBy('id','desc')->paginate(8);

            return view('pages.company.activity.submissionDetail', compact('list_user_jobs'));
        }
        else return redirect()->route('companySelfProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
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
            $new->user_id_accepted   = $request->user_id_accept[$i];
            $new->inweb_message_to_vendor = $request->inweb_message_to_vendor[$i];
        $new->save();          # code...

        }


        return redirect()->route('companyStepAssesment')->with(session()->flash('alert-success', 'Assesment successful!'));
    }

}
