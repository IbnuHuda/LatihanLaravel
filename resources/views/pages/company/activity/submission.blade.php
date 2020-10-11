<style type="text/css">
    div.card div.card-body hr {
        width: 3%;
        border: 1px solid #000;
        margin-top: 0px;
    }

    div.col-md-4 div.card div.card-body hr {
        width: 15%;
        border: 1px solid #000;
        margin-top: 0px;
    }
</style>
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="flash-message col-lg-12">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
            @if (Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} w-100">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Submission</h4>
                <hr class="float-left" />

                <div style="clear: both;"></div>
                <div class="mt-2"></div>

                @if ($jobs->isEmpty())
                    <p class="alert alert-danger w-100"><i class="fa fa-times-circle"></i> You not publish a job. <a href="{{ route('companyPublishJobs') }}">Publish now.</a></p>
                @else
                    <div class="row">
                        @foreach($jobs as $job)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $job->available_positions }}</h5>
                                        <h6 class="card-subtitle text-muted mb-2">Created at {{ explode(' ', $job->created_at)[0] }}</h6>
                                        <hr class="float-left" />

                                        <br />

                                        <p class="card-text">{{ (str_word_count($job->jobs_description) > 2) ? substr($job->jobs_description, 0, 75) . "..." : $job->jobs_description }}</p>
                                        <a href="{{ route('companyStepDetailSubmission', $job->id) }}" class="card-link float-right">Read more</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection