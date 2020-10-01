<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersJobRegistered;
use App\CompanyJobs;
use App\StatisticUsers;
use Illuminate\Support\Facades\Auth;

class UsersJobRegisteredController extends Controller
{
    public function registerJobsForm($id) {
        $job = CompanyJobs::where('id','=', $id)->first();

        return view('pages.vendor.registerJob', compact('job'));
    }

    public function registerJobs(Request $request) {

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

        $result = implode(" | ", $portofolios);
        $r_amount++;
        $data->insert([
            'user_id' => Auth::user()->id,
            'team_id' => Auth::user()->team_id,
            'company_job_id' => $request->job,
            'users_description' => $request->proposal,
            'other_question' => $request->question,
            'portofolio_uploaded' => $result
        ]);

        $stats = StatisticUsers::where('user_id','=',Auth::user()->id)->first();

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
