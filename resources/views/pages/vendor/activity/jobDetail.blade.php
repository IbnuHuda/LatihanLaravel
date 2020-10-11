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

                <br />
                <div class="mt-2"></div>

                <div class="row">
                    <div class="col-md-4 text-center">
                        <h4>{{ $detail_companies->name }}</h4>
                        <img src="{{ url('storage/images/company/'. $detail_companies->company_logo) }}" class="img img-fluid mt-3">
                    </div>

                    <div class="col-md-8 mt-5">
                        <table border="0" class="table table-striped"  style="font-size: 15px; color:black">
                            <tbody>
                                <tr>
                                    <td>Publisher</td>
                                    <td>:</td>
                                    <td>{{ $detail_companies->name }}</td>
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
                            <a href="{{ route('usersRegisterJobs', $detail_jobs->id) }}" class="btn btn-md btn-primary"><i class="fa fa-edit"></i> Enroll</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
