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

    public function publishForm()
    {
        $data = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

        if ($data != null) return view('pages.company.jobs.create', compact('data'));
        else return redirect()->route('companySelfProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));
    }
    
    public function publishJobs(Request $request, $id = null)
    {
        if ($request->minimum_portofolio < 0 || $request->vendor_accepted_total <= 0)
            return redirect()->route('companyPublishJobs')->with(session()->flash('alert-danger', 'Minimum portofolio at least 0 or vendor total accepted must higher then 0'));

        else {
            CompanyJobs::updateOrCreate(
                ['user_company_id' => Auth::guard('company')->user()->id],
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
        // $company_jobs = CompanyJobs::orderBy('id', 'desc')->paginate(6);

        // $companies_data = [];

        // foreach ($company_jobs as $job) $companies_data[] =  CompanyProfile::where('user_company_id', '=', $job->user_company_id)->first();

        $data = UserCompany::all();

        // $data = array_merge($company_jobs, $companies_data)
        
        return response()->json($data->companyProfile);

        // return view('pages.company.jobs.list', compact('company_jobs', 'companies_data'));
    }

    public function detailJobs($id)
    {
        $data = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

        if ($data != null) return view('pages.company.jobs.detail', compact('data'));
        else return redirect()->route('companySelfProfile')->with(session()->flash('alert-warning', 'Please fill profile first before access page!'));

        // $detail_jobs = CompanyJobs::where('id', $id)->first();
        // return view('pages.company.jobs.detail', compact('detail_jobs'));
    }
}
