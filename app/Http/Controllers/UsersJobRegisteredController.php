<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersJobRegistered;
use App\CompanyJobs;
use Illuminate\Support\Facades\Auth;

class UsersJobRegisteredController extends Controller
{
    public function registerJobsForm($id) {
        $job = CompanyJobs::where('id','=',$id)->first();

        return view('pages.vendor.registerJob', compact('job'));
    }

    public function registerJobs(Request $request) {

        $data = UsersJobRegistered::where('id','=',Auth::user()->id);

        if($files = $request->file('portofolios')){

            foreach($files as $file){

                $name = $file->getClientOriginalName();
                $file->storeAs('public/images/company/jobPortofolios',Auth::user()->id . "_" . $name);
                $portofolios[] = Auth::user()->id . "_" . $name;
            }
        }

        $result = implode(" | ", $portofolios);

        $data->insert([
            'user_id' => Auth::user()->id,
            'team_id' => Auth::user()->team_id,
            'company_job_id' => $request->job,
            'users_description' => $request->proposal,
            'other_question' => $request->question,
            'portofolio_uploaded' => $result
        ]);

        return response()->json($result);

    }
}
