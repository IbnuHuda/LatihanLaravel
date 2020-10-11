<?php

namespace App\Http\Controllers;

use App\TeamProfile;
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
            $detail_companies = CompanyProfile::where('user_company_id', "=", $detail_jobs->user_company_id)->first();

            return view('pages.vendor.activity.jobDetail', compact('detail_companies', 'detail_jobs'));
        }

        else return redirect()->route('usersProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }

    public function registerJobsForm($id)
    {
        $data = UsersProfile::where('user_id', '=', Auth::user()->id)->first();

        if ($data != null) {
            $job = CompanyJobs::where('id', '=', $id)->first();
            $detail_companies = CompanyProfile::where('user_company_id', "=", $job->user_company_id)->first();

            return view('pages.vendor.activity.registerJob', compact('job', 'detail_companies'));
        }

        else return redirect()->route('usersProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }

    public function registerJobs(Request $request)
    {
        $data = UsersJobRegistered::where('id', '=', Auth::user()->id);
        $portofolios = [];
        $p_amount = 0;
        $r_amount = 0;

        if($files = $request->file('portofolios')){
            foreach($files as $file) $p_amount++;

            if ($p_amount > 4) return redirect()->back()->with(session()->flash('alert-danger', "Portofolio must lower or equal then four."));
        }

        $result = implode("|", $portofolios);
        $r_amount++;

        if ($request->apply == 1) {
            $data_team = TeamProfile::where('id', '=', Auth::user()->team_id)->first();

            if (Auth::user()->name != $data_team->owner) return redirect()->back()->with(session()->flash('alert-danger', "Only leader team can apply job as team."));
            else {
                if($files = $request->file('portofolios')){
                    foreach ($files as $file) {
                        $name = $file->getClientOriginalName();
                        $file->storeAs('/public/images/company/portofolio/', Auth::user()->id . "_" . $name);
                        $portofolios[] = Auth::user()->id . "_" . $name;
                    }
                }

                $result = implode("|", $portofolios);
                $r_amount++;

                $data->create([
                    'team_id' => $data_team->id,
                    'company_job_id' => $request->job,
                    'users_description' => $request->proposal,
                    'other_question' => $request->question,
                    'portofolio_uploaded' => $result,
                    'salary' => $request->salary
                ]);

                foreach ($data_team->users as $value) {
                    $stats = StatisticUsers::where('user_id', '=', $value->id)->first();

                    if ($stats != null) {
                        $p_amount += $stats->portofolio_sent_amount;
                        $r_amount += $stats->job_registered_amount;
                        $stats->update([
                            'portofolio_sent_amount' => $p_amount,
                            'job_registered_amount' => $r_amount
                        ]);
                    }
                    else {
                        StatisticUsers::create([
                            'user_id' => $value->id,
                            'portofolio_sent_amount' => $p_amount,
                            'job_registered_amount' => $r_amount,
                        ]);
                    }
                }
            }

        }
        else {
            if($files = $request->file('portofolios')){
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('/public/images/company/portofolio/', Auth::user()->id . "_" . $name);
                    $portofolios[] = Auth::user()->id . "_" . $name;
                }
            }

            $result = implode("|", $portofolios);
            $r_amount++;
                

            $data->create([
                'user_id' => Auth::user()->id,
                'company_job_id' => $request->job,
                'users_description' => $request->proposal,
                'other_question' => $request->question,
                'portofolio_uploaded' => $result,
                'salary' => $request->salary
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
                StatisticUsers::create([
                    'user_id' => Auth::user()->id,
                    'portofolio_sent_amount' => $p_amount,
                    'job_registered_amount' => $r_amount
                ]);
            }
        }

        return redirect()->route('usersSubmission')->with(session()->flash('alert-success', "You're apply are saved!"));
    }
}