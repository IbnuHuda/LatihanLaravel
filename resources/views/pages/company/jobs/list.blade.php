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
                    <p class="alert alert-danger w-100"><i class="fa fa-times-circle"></i> You not publish a job. <a href="{{ route('companyPublishJobs') }}">Publish now.</a></p>
                @else
                    <div class="row">
                        @foreach ($companies_jobs as $job)
                        <div class="col-md-6 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    @foreach ($companies_profile as $profile)
                                        @if ($job->user_company_id == $profile->user_company_id)
                                        <h5 class="card-title float-left">{{ $profile->name }}</h5>
                                        @endif
                                    @endforeach
                                    <p class="float-right" style="font-style: oblique;">Expired at {{ $job->jobs_expired }}</p>
                                    <div style="clear: both;"></div>
                                    <h6 class="card-subtitle text-muted mb-2 float-left">{{ $job->available_positions }}</h6>

                                    <div style="clear: both;"></div>

                                    <p class="card-text">{{ (str_word_count($job->jobs_description) > 2) ? substr($job->jobs_description, 0, 75)."..." : $job->jobs_description}}</p>
                                    <a href="{{ route('companyJobsDetail', $job->id) }}" class="btn btn-sm btn-primary card-link float-right">Read more</a>
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
