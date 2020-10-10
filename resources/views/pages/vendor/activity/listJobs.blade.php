<style type="text/css">
    div.card div.card-body hr {
        width: 3%;
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
                <h4 class="card-title">List Jobs</h4>
                <hr class="float-left" />

                <br />

                @if ($companies_jobs->isEmpty())
                    <p class="alert alert-warning w-100"><i class="fa fa-times-circle"></i> No job available.</p>
                @else
                    <div class="row">
                        @foreach ($companies_jobs as $job)
                        <div class="col-md-6 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    @foreach ($companies_profile as $profile)
                                        <h5 class="card-title float-left">{{ $profile['name'] }}</h5>
                                    @endforeach
                                    <p class="float-right" style="font-style: oblique;">Expired at {{ $job->jobs_expired }}</p>
                                    <div style="clear: both;"></div>
                                    <h6 class="card-subtitle text-muted mb-2 float-left">{{ $job->available_positions }}</h6>

                                    <div style="clear: both;"></div>

                                    <p class="card-text">{{ (str_word_count($job->jobs_description) > 2) ? substr($job->jobs_description, 0, 75)."..." : $job->jobs_description}}</p>
                                    <a href="{{ route('usersDetailJobs', $job->id) }}" class="card-link float-right">Read more</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{ $companies_jobs->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection