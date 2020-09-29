@extends('layouts.dashboard')


{{-- <div class="container">
    <div class="row"> --}}
@section('content')
        <div>
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
                    <a href="{{route('companyListJobs')}}" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                        <a href="" class="btn btn-md btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- </div>
</div> --}}
