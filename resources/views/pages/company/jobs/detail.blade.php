<style type="text/css">
    div.card div.card-body hr {
        width: 5%;
        border: 1px solid #000;
        margin-top: 0px;
    }
</style>
@extends('layouts.dashboard')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Job Detail</h4>
                <hr class="float-left" />

                <div style="clear: both;"></div>

                <div class="row">
                    <div class="col-md-4 text-center">
                        <h4>{{ $data->name }}</h4>
                        <img src="{{ url('storage/images/company/'. $data->company_logo) }}" class="w-100 mt-4">
                    </div>

                    <div class="col-md-8">
                        <table border="0" class="table table-striped"  style="font-size: 15px; color:black">
                            <tbody>
                                <tr>
                                    <td>Publisher</td>
                                    <td>:</td>
                                    <td>{{ $data->userCompany->name }}</td>
                                </tr>
                                <tr>
                                    <td>Available Positions</td>
                                    <td>:</td>
                                    <td>{{ $detail_jobs->available_positions }}</td>
                                </tr>
                                <tr>
                                    <td>Jobs Description</td>
                                    <td>:</td>
                                    <td>{{ $detail_jobs->jobs_description }}</td>
                                </tr>
                                <tr>
                                    <td>Jobs Requirement</td>
                                    <td>:</td>
                                    <td>
                                        - {{ $detail_jobs->jobs_requirements }} <br />
                                        - aaaa <br />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Minimum Portofolio</td>
                                    <td>:</td>
                                    <td>{{ $detail_jobs->minimum_portofolio }}</td>
                                </tr>
                                <tr>
                                    <td>Vendor Accepted</td>
                                    <td>:</td>
                                    <td>{{ $detail_jobs->vendor_accepted_total }}</td>
                                </tr>
                                <tr>
                                    <td>Job Expired</td>
                                    <td>:</td>
                                    <td>{{ $detail_jobs->jobs_expired }}</td>
                                </tr>
                                <tr>
                                    <td width="25%">Other</td>
                                    <td>:</td>
                                    <td>{{ $detail_jobs->other }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="float-right mt-2">
                            <button onclick="window.history.back();" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</button>

                            @if ($detail_jobs->user_company_id == Auth::guard('company')->user()->id)
                            <a href="{{ route('companyPublishJobs') }}?id={{ $detail_jobs->id }}" class="btn btn-md btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                            @elseif (!Auth::guard('company')->check())
                            <a href="{{ route('companyPublishJobs') }}?id={{ $detail_jobs->id }}" class="btn btn-md btn-success"><i class="fa fa-pencil"></i> Apply Job</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection