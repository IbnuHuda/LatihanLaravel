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

                <div class="mt-2"></div>

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

        <!-- <div>
            <div class="card-deck">
            <div class="card mt-4" style="width: 60%">
                <div class="card-header bg-primary text-light">
                <h3>Detail Jobs {{$detail_jobs->id}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('/images/users/1/示例图片_01.jpg') }}" class="rounded img-fluid" alt="Cinque Terre" width="80%">
                        </div>
                        <div class="col-md-9">
                            <table border="0" class="table"  style="font-size: 15px; color:black">
                                <tbody>
                                <tr style="">
                                    <td>Company Name</td>
                                    <td>&nbsp;&nbsp; : </td>
                                    <td>&nbsp;&nbsp;{{$detail_jobs->company_id}}</td>
                                </tr>
                                <tr>
                                    <td>Jobs Name</td>
                                    <td>&nbsp;&nbsp; : </td>
                                    <td>&nbsp;&nbsp;{{$detail_jobs->jobs_name}}</td>
                                </tr>
                                <tr>
                                    <td>Available Positions</td>
                                    <td>&nbsp;&nbsp; : </td>
                                    <td>&nbsp;&nbsp;{{$detail_jobs->available_positions}}</td>
                                </tr>
                                <tr>
                                    <td>Jobs Description</td>
                                    <td>&nbsp;&nbsp; : </td>
                                    <td>&nbsp;&nbsp;{{$detail_jobs->jobs_description}}</td>
                                </tr>
                                <tr>
                                    <td>Jobs Requirement</td>
                                    <td>&nbsp;&nbsp; : </td>
                                    <td>&nbsp;&nbsp;{{$detail_jobs->jobs_requirements}}</td>
                                </tr>
                                <tr>
                                    <td>Minimum Portofolio</td>
                                    <td>&nbsp;&nbsp; : </td>
                                    <td>&nbsp;&nbsp;{{$detail_jobs->minimum_portofolio}}</td>
                                </tr>
                                <tr>
                                    <td>Vendor Accepted</td>
                                    <td>&nbsp;&nbsp; : </td>
                                    <td>&nbsp;&nbsp;{{$detail_jobs->vendor_accepted_total}}</td>
                                </tr>
                                <tr>
                                    <td>Job Expired</td>
                                    <td>&nbsp;&nbsp; : </td>
                                    <td>&nbsp;&nbsp;{{$detail_jobs->jobs_expired}}</td>
                                </tr>
                                <tr>
                                    <td>Other</td>
                                    <td>&nbsp;&nbsp; : </td>
                                    <td style="width:70%">&nbsp;&nbsp;{{$detail_jobs->other}}</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-left">
                    <a href="{{ route('companyListJobs') }}" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                        <a href="" class="btn btn-md btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
