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
                    <p class="alert alert-danger w-100"><i class="fa fa-times-circle"></i> Wait for company publish jobs.</p>
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

    <!-- <div class="container">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if (Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }} w-100">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>

        <div class="row">
        <table class="table table-hover">
            <thead>
              <tr class="bg-primary text-light">
                <th scope="col">#</th>
                <th scope="col">Company Name</th>
                <th scope="col">Jobs Description</th>
                <th scope="col">Publisher</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $number = 1;
                @endphp
                @foreach ($companies_jobs as $list_jobs)
                    <tr>
                        <th scope="row">{{$number++}}</th>
                        <td>{{ $list_jobs->company_id }}</td>
                        <td>{{ (str_word_count($list_jobs->jobs_description) > 2 ? substr($list_jobs->jobs_description,0,15)."..." : $list_jobs->jobs_description)
                        }}</td>
                        <td>Falah</td>
                        <td><a href="/company/jobs/detail/{{ $list_jobs->id }}" class="btn btn-md btn-info text-light"><i class="fa fa-eye"> Details</i></a></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          <div>
              {{$companies_jobs->links()}}
          </div>
        </div>
    </div> -->
@endsection
