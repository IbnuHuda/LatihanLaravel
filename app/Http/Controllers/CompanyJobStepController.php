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
use App\Http\Controllers\MailController;

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
                        where('id', '=', $id)
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
        $data = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

        if ($data != null) {
            $jobs = CompanyJobs::where('user_company_id', '=', Auth::guard('company')->user()->id)->get();

            return view('pages.company.activity.assesment', compact('jobs'));
        }
        else return redirect()->route('companySelfProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }

    public function assesmentDetailForm($id)
    {
        $result = UsersJobRegistered::
                    where('score', '!=', 'null')
                    ->where('id', '=', $id)
                    ->orderBy('score','desc')
                    ->get();

        return view('pages.company.activity.assesmentDetail', compact('result'));
    }

    public function assesmentProcess(Request $request){
        $data = CompanyJobs::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

        if (count($request->approval) > $data->vendor_accepted_total) 
            return redirect()->route('companyStepAssesment')->with(session()->flash('alert-danger', 'Vendor accepted must less or equal then ' . $data->vendor_accepted_total));

        foreach ($request->approval as $user) {
            $vendor = UsersJobRegistered::where('id', '=', $user)->first();

            CompanyJobStep::create([
                'company_job_id' => $data->id,
                'step_name' => 'approved',
                'user_id_accepted' => $vendor->user->id,
                'inweb_message_to_vendor' => null
            ]);
        }

        $vendor_data = UsersJobRegistered::where('company_job_id', '=', $data->id)->get();

        foreach ($vendor_data as $value) UsersJobRegistered::find($value->id)->delete();

        return redirect()->route('companyStepApproval')->with(session()->flash('alert-success', 'Assesment successful!'));
    }

    public function approvalForm()
    {
        $data = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

        if ($data != null) {
            $jobs = CompanyJobs::where('user_company_id', '=', Auth::guard('company')->user()->id)->get();

            return view('pages.company.activity.approval', compact('jobs'));
        }
        else return redirect()->route('companySelfProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }

    public function approvalDetailForm($id)
    {
        $data = CompanyJobStep::where('company_job_id', '=', $id)->paginate(8);
        $data_job = CompanyJobs::where('id', '=', $id)->first();
        $data_job = $data_job->available_positions;

        return view('pages.company.activity.approvalDetail', compact('data', 'data_job'));
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
