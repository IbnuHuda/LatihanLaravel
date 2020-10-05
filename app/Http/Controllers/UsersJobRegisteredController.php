<?php

namespace App\Http\Controllers;

use App\CompanyJobs;
use App\UsersProfile;
use App\CompanyProfile;
use App\StatisticUsers;
use App\UsersJobRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersJobRegisteredController extends Controller
{
    public function listJobsForm()
    {
        $companies_jobs = CompanyJobs::orderBy('created_at', 'desc')->paginate(6);
        
        $companies_profile = [];

        foreach ($companies_jobs as $job) {
            $getData = CompanyProfile::where('user_company_id', '=', $job->user_company_id)->first();

            if (!in_array($getData, $companies_profile)) $companies_profile[] = $getData;
        }

        return view('pages.vendor.activity.listJobs', compact('companies_jobs', 'companies_profile'));
    }

    public function detailJobsForm($id)
    {
        $data = UsersProfile::where('user_id', '=', Auth::user()->id)->first();

        if ($data != null) {
            $detail_jobs = CompanyJobs::where('id', '=', $id)->first();

            return view('pages.vendor.jobs.jobDetail', compact('data', 'detail_jobs'));
        }

        else return redirect()->route('usersProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }

    public function registerJobsForm($id) 
    {
        $job = CompanyJobs::where('id', '=', $id)->first();

        return view('pages.vendor.registerJob', compact('job'));
    }

    public function registerJobs(Request $request) 
    {
        $data = UsersJobRegistered::where('id','=',Auth::user()->id);
        $p_amount = 0;
        $r_amount = 0;

        if($files = $request->file('portofolios')){

            foreach($files as $file){
                $name = $file->getClientOriginalName();
                $file->storeAs('public/images/company/jobPortofolios',Auth::user()->id . "_" . $name);
                $portofolios[] = Auth::user()->id . "_" . $name;
                $p_amount++;
            }
        }

        $result = implode("|", $portofolios);
        $r_amount++;
        $data->insert([
            'user_id' => Auth::user()->id,
            'team_id' => Auth::user()->team_id,
            'company_job_id' => $request->job,
            'users_description' => $request->proposal,
            'other_question' => $request->question,
            'portofolio_uploaded' => $result
        ]);

        $stats = StatisticUsers::where('user_id', '=', Auth::user()->id)->first();

        if ($stats != null) {
            $p_amount += $stats->portofolio_sent_amount;
            $r_amount += $stats->job_registered_amount;
            $stats->update([
                'portofolio_sent_amount' => $p_amount,
                'job_registered_amount' => $r_amount
            ]);
        }
        else {
            StatisticUsers::insert([
                'user_id' => Auth::user()->id,
                'portofolio_sent_amount' => $p_amount,
                'job_registered_amount' => $r_amount,
                'rating_granted' => 0
            ]);
        }

        return response()->json($stats);
    }
}
