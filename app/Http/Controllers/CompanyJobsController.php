<?php

namespace App\Http\Controllers;

use App\CompanyProfile;
use App\CompanyJobs;
use App\UserCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyJobsController extends Controller
{
    public function myJobs()
    {
        $data = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

        if ($data != null) {
            $jobs = CompanyJobs::where('user_company_id', '=', Auth::guard('company')->user()->id)->get();

            return view('pages.company.jobs.myJobs', compact('jobs'));
        }
        else return redirect()->route('companySelfProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }

    public function publishForm(Request $request)
    {
        $data = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

        if ($data != null) {
            if ($request->id) {
                $company_jobs = CompanyJobs::where('id', '=', $request->id)->first();

                return view('pages.company.jobs.create', compact('data', 'company_jobs'));
            }

            else return view('pages.company.jobs.create', compact('data'));
        }

        else return redirect()->route('companySelfProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }
<<<<<<< HEAD

    public function publishJobs(Request $request, $id = null)
=======
    
    public function publishJobs(Request $request)
>>>>>>> feaf0190d2cd8e25a01918183eac107c39a68616
    {
        if ($request->minimum_portofolio < 0 || $request->vendor_accepted_total <= 0)
            return redirect()->route('companyPublishJobs')->with(session()->flash('alert-danger', 'Minimum portofolio at least 0 or vendor total accepted must higher then 0'));

        else {
            CompanyJobs::updateOrCreate(
                [
                    'id' => ($request->job != null) ? $request->job : null,
                    'user_company_id' => Auth::guard('company')->user()->id
                ],
                [
                    'available_positions' => $request->available_positions,
                    'jobs_description' => $request->jobs_description,
                    'jobs_requirements' => $request->jobs_requirements,
                    'minimum_portofolio' => ($request->minimum_portofolio == null) ? '0' : $request->minimum_portofolio,
                    'vendor_accepted_total' => $request->vendor_accepted_total,
                    'jobs_expired' => $request->jobs_expired,
                    'other' => $request->other
                ]
            );

            return redirect()->route('myCompanyJobs')->with(session()->flash('alert-success', 'Job publish successful!'));
        }
    }

    public function listJobs()
    {
        $companies_jobs = CompanyJobs::orderBy('created_at', 'desc')->paginate(6);
        
        $companies_profile = [];

        foreach ($companies_jobs as $job) {
            $getData = CompanyProfile::where('user_company_id', '=', $job->user_company_id)->first();

<<<<<<< HEAD
        // $data = array_merge($company_jobs, $companies_data)

        return response()->json($data->companyProfile);
=======
            if (!in_array($getData, $companies_profile)) $companies_profile[] = $getData;
        }
>>>>>>> feaf0190d2cd8e25a01918183eac107c39a68616

        return view('pages.company.jobs.list', compact('companies_jobs', 'companies_profile'));
    }

    public function detailJobs($id)
    {
        $data = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

        if ($data != null) {
            $detail_jobs = CompanyJobs::where('id', '=', $id)->first();

            return view('pages.company.jobs.detail', compact('data', 'detail_jobs'));
        }

        else return redirect()->route('companySelfProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }
}
