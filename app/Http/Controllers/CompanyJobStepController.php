<?php

namespace App\Http\Controllers;

use App\User;
use App\Rating;
use App\UserCompany;
use App\CompanyJobs;
use App\UsersProfile;
use App\CompanyProfile;
use App\CompanyJobStep;
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

            return view('pages.company.activity.submission', compact('jobs'));
        }
        else return redirect()->route('companySelfProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }

    public function submissionDetailForm($id)
    {
        $data = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

        if ($data != null) {
            $list_user_jobs = UsersJobRegistered::
                                    where('score', '=', 'null')
                                    ->orWhereNull('score')
                                    ->orderBy('created_at','asc')
                                    ->paginate(8);

            return view('pages.company.activity.submissionDetail', compact('list_user_jobs'));
        }
        else return redirect()->route('companySelfProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }

    public function submissionScoreForm($id)
    {
        $data = UsersJobRegistered::where('id', '=', $id)->first();

        $data_image = explode("|", $data->portofolio_uploaded);

        return view('pages.company.activity.submissionScore', compact('data', 'data_image'));
    }

    public function submissionScore(Request $request)
    {
        $data = UsersJobRegistered::where('id', '=', $request->portofolio)->first();

        $data_image = explode("|", $data->portofolio_uploaded);

        $count = 1;
        if (is_array($data_image)) $count = count($data_image);

        $score = [];
        
        if (isset($request->portofolio1)) $score[] = $request->portofolio1;
        if (isset($request->portofolio2)) $score[] = $request->portofolio2;
        if (isset($request->portofolio3)) $score[] = $request->portofolio3;
        if (isset($request->portofolio4)) $score[] = $request->portofolio4;

        $result = 0;
        for ($i = 0; $i < $count; $i++) $result += $score[$i];

        $data->update(['score' => $result / $count . "%"]);

        return redirect()->route('companyStepSubmission')->with(session()->flash('alert-success', 'Score was submitted.'));
    }

    public function assesmentForm()
    {
        $result = UsersJobRegistered::orderBy('score','desc')->paginate(8);
        return view('pages.company.activity.assesment', compact('result'));
    }

    public function assesmentProcess(Request $request)
    {
        $total = count($request->accept) ;
        for ($i=0; $i < $total; $i++) {
            $new = new CompanyJobStep;
            $new->company_job_id = $request->company_job_id[$i];
            $new->step_name = $request->step_name[$i];
            $new->user_id_accepted   = $request->user_id_accept[$i];
            $new->inweb_message_to_vendor = $request->inweb_message_to_vendor[$i];
        $new->save();

        }

        return redirect()->route('companyStepAssesment')->with(session()->flash('alert-success', 'Assesment successful!'));
    }

    public function assesmentDetailForm($id){
        $user = User::find($id);
        $user_profile = UsersProfile::where('user_id', $id)->get();
        // dd($user_profile[0]);
        return view('pages.company.activity.user-profile', compact('user','user_profile'));


    }

    public function approvalForm(){

        $result = CompanyJobStep::all();
        $company_profile = UserCompany::where('id', Auth::guard('company')->user()->id)->get();
        return view('pages.company.activity.approval', compact('result', 'company_profile'));
    }

    public function ratingProcess(Request $request){
        $result = new Rating;
        // $result->id = $request->user_id;
        $result->user_id = $request->user_id;
        $result->company_id =$request->company_id;
        $result->rating = $request->star;
        $result->save();
        dd($result->save());

    //return redirect()->route('companyStepApproval')->with(session()->flash('alert-success', 'Assesment successful!'));

    }
}
