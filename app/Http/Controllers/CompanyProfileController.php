<?php

namespace App\Http\Controllers;

use App\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
	public function companyProfileForm()
	{
		$data = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

		return view('pages.company.companyProfile', compact('data'));
	}

	public function companyProfile(Request $request)
	{	
		$checkData = CompanyProfile::where('user_company_id', '=', Auth::guard('company')->user()->id)->first();

		$data = CompanyProfile::updateOrCreate(
			['user_company_id' => Auth::guard('company')->user()->id],
			[
				'name' => $request->name,
				'work_field' => $request->work_field,
				'date_of_built' => $request->date_of_built,
				'company_address' => $request->address,
				'contact_number' => '+62 ' . $request->contact_number,
				'contact_email' => $request->contact_email,
				'company_description' => $request->company_description 
			]
		);

		if ($request->hasFile('photo')) {
            if ($request->file('photo')->isValid()) {
                $validate = $request->validate(['photo' => 'mimes:png,jpg,jpeg,PNG,JPG,JPEG']);

                $filename = $request->photo->getClientOriginalName();
                $request->photo->storeAs('public/images/company/', $data->id . '_' . str_replace(' ', '_', $data->name) . '_' . $filename);

                if ($checkData != null && $checkData->company_logo != null) unlink(public_path('storage') . '/images/company/' . $checkData->company_logo);

                $data->updateOrCreate(
                	['user_company_id' => Auth::guard('company')->user()->id],
                	['company_logo' => $data->id . '_' . str_replace(' ', '_', $data->name) . '_' . $filename]
                );
            }
        }

		return redirect()->route('companySelfProfile')->with(session()->flash('alert-success', 'Company profile has been save!'));
	}
}
