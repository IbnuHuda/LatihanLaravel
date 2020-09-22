<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyJobs;    

class CompanyJobsController extends Controller
{
    public function publishForm()
    {
        return view('pages.company.jobs.create');
    }
    
    public function publishJobs(Request $request)
    {
        $jobs = new CompanyJobs;
        $jobs->company_id = $request->company_name;
        $jobs->jobs_name = $request->jobs_name;
        $jobs->available_positions = $request->available_positions;
        $jobs->jobs_description = $request->jobs_description;
        $jobs->jobs_requirements = $request->jobs_description;
        $jobs->minimum_portofolio = $request->minimum_portofolio;
        $jobs->vendor_accepted_total = $request->vendor_accepted_total;
        $jobs->jobs_expired = $request->jobs_expired;
        $jobs->other = $request->other;
        $jobs->save();

    }
}
