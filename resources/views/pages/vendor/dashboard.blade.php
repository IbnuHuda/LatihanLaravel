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

    @media screen and (max-width: 991px) {
        .large{
            display: none;
        }
    }

    @media screen and (min-width: 992px) {
        .small{
            display: none;
        }
    }

    .card{
        height: 100%;
    }
</style>

@extends('layouts.dashboard')

@section('content')
<div class="large">
<div class="row ">
    <div class="flash-message col-lg-12">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} w-100">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>

    <div class="col-lg-4 col-md-6 mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Portofolios</h5>
                <hr class="float-left" />

                <div style="clear: both;"></div>

                <div class="card-text">
                    <i class="fa fa-file fa-2x float-left"></i>
                    <p id="font" class="float-right">{{ $data_stat->portofolio_sent_amount ?? '0' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Registered Jobs</h5>
                <hr class="float-left" />

                <div style="clear: both;"></div>

                <div class="card-text">
                    <i class="fa fa-briefcase fa-2x float-left"></i>
                    <p id="font" class="float-right">{{ $data_stat->job_registered_amount ?? '0' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="rating-lg col-lg-4 col-md-4 mt-3">
        <div class="card text-left">
            <div class="card-body">
                <h5 class="card-title">Rating</h5>
                <hr class="float-left" />

                <div style="clear: both;"></div>

                <div class="card-text">
                    <div class="float-left" id="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p id="font" class="float-right">{{( $data_stat == null || $data_stat->rating_granted_amount == null) ? '0.0' : $data_stat->rating_granted_amount }}/5.0</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-8 mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Recomended Jobs</h5>
                <hr class="float-left" id="jobs" />

                <div style="clear: both;"></div>

                <div class="row">
                    @if ($data_jobs->isEmpty())
                        <div class="col-md-12">
                            <p class="alert alert-warning w-100"><i class="fa fa-times-circle"></i> No job available.</p>
                        </div>
                    @else
                        @foreach ($data_jobs as $job)
                            <div class="col-md-12 mt-2">
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
                                        <a href="{{ route('usersDetailJobs', $job->id) }}" class="card-link float-right">Read more</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            <a href="{{ route('usersListJobs') }}" class="btn btn-sm btn-primary float-right mt-4">See More Jobs</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 mt-3">
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
                            <li class="list-group-item">Gender : {{ (Auth::user()->usersProfile->isEmpty() || Auth::user()->usersProfile[0]->gender == null) ? '-' : Auth::user()->usersProfile[0]->gender }}</li>
                            <li class="list-group-item mt-3"><a href="{{ route('usersProfile') }}" class="btn btn-sm btn-primary float-right"> Read More</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Team</h5>
                        <hr class="float-left" />

                        <div style="clear: both;"></div>

                        @if (Auth::user()->team_id == null)
                            <p>You not joined to a team.</p>
                            <form method="post" action="{{ route('usersJoinTeam') }}">
                                @csrf

                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type code join of team" aria-label="Recipient's username" aria-describedby="basic-addon2" name="team_join">

                                    <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">join</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Name Team : {{ Auth::user()->teamProfile->name }}</li>
                                <li class="list-group-item">Owner : {{ Auth::user()->teamProfile->owner }}</li>
                                <li class="list-group-item"><a href="{{ route('usersProfileTeam') }}" class="float-right">Read More</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="small">
    <div class="row ">
        <div class="flash-message col-lg-12">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if (Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }} w-100">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>

        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Portofolios</h5>
                    <hr class="float-left" />

                    <div style="clear: both;"></div>

                    <div class="card-text">
                        <i class="fa fa-file fa-2x float-left"></i>
                        <p id="font" class="float-right">{{ $data_stat->portofolio_sent_amount ?? '0' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registered Jobs</h5>
                    <hr class="float-left" />

                    <div style="clear: both;"></div>

                    <div class="card-text">
                        <i class="fa fa-briefcase fa-2x float-left"></i>
                        <p id="font" class="float-right">{{ $data_stat->job_registered_amount ?? '0' }}</p>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recomended Jobs</h5>
                    <hr class="float-left" id="jobs" />

                    <div style="clear: both;"></div>

                    <div class="row">
                        @if ($data_jobs->isEmpty())
                            <div class="col-md-12">
                                <p class="alert alert-warning w-100"><i class="fa fa-times-circle"></i> No job available.</p>
                            </div>
                        @else
                            @foreach ($data_jobs as $job)
                                <div class="col-md-12 mt-2">
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
                                            <a href="{{ route('usersDetailJobs', $job->id) }}" class="card-link float-right">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <a href="{{ route('usersListJobs') }}" class="btn btn-sm btn-primary float-right mt-4">See More Jobs</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Profile</h5>
                            <hr class="float-left" />

                            <div style="clear: both;"></div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Name : {{ Auth::user()->name }}</li>
                                <li class="list-group-item">Email : {{ Auth::user()->email }}</li>
                                <li class="list-group-item">Gender : {{ (Auth::user()->usersProfile->isEmpty() || Auth::user()->usersProfile[0]->gender == null) ? '-' : Auth::user()->usersProfile[0]->gender }}</li>
                                <li class="list-group-item mt-4"><a href="{{ route('usersProfile') }}" class="btn btn-sm btn-primary float-right">Read More</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-3">
                    <div class="card text-left">
                        <div class="card-body">
                            <h5 class="card-title">Rating</h5>
                            <hr class="float-left" />

                            <div style="clear: both;"></div>

                            <div class="card-text">
                                <div class="float-left" id="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p id="font" class="float-right">{{( $data_stat == null || $data_stat->rating_granted == null) ? '0.0' : $data_stat->rating_granted }}/5.0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Team</h5>
                            <hr class="float-left" />

                            <div style="clear: both;"></div>

                            @if (Auth::user()->team_id == null)
                                <p>You not joined to a team.</p>
                                <form method="post" action="{{ route('usersJoinTeam') }}">
                                    @csrf

                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Type code join of team" aria-label="Recipient's username" aria-describedby="basic-addon2" name="team_join">

                                        <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">join</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Name Team : {{ Auth::user()->teamProfile->name }}</li>
                                    <li class="list-group-item">Owner : {{ Auth::user()->teamProfile->owner }}</li>
                                    <li class="list-group-item"><a href="{{ route('usersProfileTeam') }}" class="float-right">Read More</a></li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>


    </div>
    </div>
@endsection
