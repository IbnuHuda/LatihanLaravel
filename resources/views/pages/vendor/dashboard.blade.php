<style>
    #font {
        font-size: 20px;
    }
</style>

@extends('layouts.dashboard')

@section('content')

    <div class="offset-3 mt-5 row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Portofolios</h5>
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="justify-content-center">
                                <i class="fa fa-file fa-2x"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                {{-- <p id="font">{{$data_stat->portofolio_sent_amount}}</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registered Jobs</h5>
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="justify-content-center">
                                <i class="fa fa-briefcase fa-2x"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                {{-- <p id="font">{{$data_stat->job_registered_amount}}</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card text-left">
                <div class="card-body">
                    <h5 class="card-title">Rating</h5>
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="text-left">
                                <p id="font">{{($data_stat == null || $data_stat->rating_granted_amount == null) ? '0' : $data_stat->rating_granted_amount}}.0/5.0</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <i class="fa fa-star fa-2x"></i>
                                <i class="fa fa-star fa-2x"></i>
                                <i class="fa fa-star fa-2x"></i>
                                <i class="fa fa-star fa-2x"></i>
                                <i class="fa fa-star fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 offset-3 row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name : {{Auth::user()->name}}</li>
                        <li class="list-group-item">Email : {{Auth::user()->email}}</li>
                        <li class="list-group-item">Address : {{($data_profile == null || $data_profile->address == null) ? '-' :  $data_profile->address}}</li>
                        <li class="list-group-item">Bio : <br /> {{($data_profile == null || $data_profile->bio == null) ? '-' :  $data_profile->bio}}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Team</h5>
                    @if ($data_team == null)
                        {{"You Don't Have a Team"}}
                    @else
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$data_team->name}}</li>
                            <li class="list-group-item">{{$data_team->owner}}</li>
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
