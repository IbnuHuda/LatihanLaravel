<style>
    #font {
        font-size: 20px;
    }

    div.card div.card-body hr {
        width: 10%;
        border: 1px solid #000;
        margin-top: -2.5px;
    }

    div.card div.card-body hr#jobs {
        width: 5%;
        border: 1px solid #000;
        margin-top: -2.5px;
    }

    div#rating {
        margin-top: 2.5px;
    }
</style>

@extends('layouts.dashboard')

@section('content')
<br>
<div class="row">
    <div class="flash-message col-lg-12">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} w-100">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Approval</h5>
                <hr class="float-left" />

                <div style="clear: both;"></div>

                <div class="card-text">
                    <i class="fa fa-file fa-2x float-left"></i>
                    <p id="font" class="float-right">{{ count($data_approval) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Submission</h5>
                <hr class="float-left" />

                <div style="clear: both;"></div>

                <div class="card-text">
                    <i class="fa fa-briefcase fa-2x float-left"></i>
                     <p id="font" class="float-right">{{ count($data_user_registered)}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4" >
        <div class="card text-left pb-3">
            <div class="card-body">
                <h5 class="card-title">Create New Jobs</h5>
                <hr class="float-left" />

                <div style="clear: both;"></div>

                <div class="card-text">
                    <div class="float-left" id="rating">
                        <a href="{{ route('companyPublishJobs') }}" class="btn btn-sm btn-success w-100"><i class="fa fa-plus"></i>&nbsp; Add Job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-8 mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">My Jobs</h5>
                <hr class="float-left" id="jobs" />

                <div style="clear: both;"></div>

                <div class="row">
                    @foreach ($data_jobs as $job)
                        <div class="col-md-12 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title float-left">{{ $job->userCompany->companyProfile[0]->name }}</h5>
                                    <p class="float-right" style="font-style: oblique;">Expired at {{ $job->jobs_expired }}</p>
                                    <div style="clear: both;"></div>
                                    <h6 class="card-subtitle text-muted mb-2 float-left">{{ ucfirst($job->available_positions) }}</h6>

                                    <div style="clear: both;"></div>

                                    <p class="card-text">{{ ucfirst((str_word_count($job->jobs_description) > 2) ? substr($job->jobs_description, 0, 75)."..." : $job->jobs_description)}}</p>
                                    <a href="{{ route('companyJobsDetail', $job->id) }}" class="card-link float-right">Read more</a>

                                    {{-- <a href="{{ route('usersDetailJobs', $job->id) }}" class="card-link float-right">Read more</a> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-12">
                        <a href="{{ route('myCompanyJobs')}}  " class="float-right mt-4">See More Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4 mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <hr class="float-left" />

                        <div style="clear: both;"></div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Name : {{ Auth::user()->name }}</li>
                            <li class="list-group-item">Email : {{ Auth::user()->email }}</li>
                            {{-- <li class="list-group-item">Gender : {{ (Auth::user()->usersProfile->isEmpty() || Auth::user()->usersProfile[0]->gender == null) ? '-' : Auth::user()->usersProfile[0]->gender }}</li> --}}
                            <li class="list-group-item"><a href="{{ route('usersProfile') }}" class="float-right">Read More</a></li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
