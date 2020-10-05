<style>
    .img{
        max-width: 10%;
    }
</style>

@extends('layouts.dashboard')

@section('content')
<div class="container">

        <div class="row mt-5">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">

                    <img src="{{ ($data == null || $data->photo == null) ?  asset('images/websites/def_photo.png') : url('storage/images/team/'. $data->photo) }}" class="img rounded-circle float-right h-10 w-10" id="photo">

                    <h5 class="card-title mt-3">Team Profile</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name : {{$data->name}}</li>
                        <li class="list-group-item">Owner : {{$data->owner}}</li>
                        <li class="list-group-item">Address : {{$data->address}}</li>
                        <li class="list-group-item">Bio : <br />{{$data->bio}}</li>
                    </ul>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Total : {{$i}} </li>
                                    @if ($data->owner == Auth::user()->name)
                                        <li class="list-group-item">Access Code : {{$data->access_code}}</button></li>
                                    @elseif(Auth::user()->team_id != null)
                                        <li class="list-group-item"><button class="btn btn-danger">Leave Team</button></li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col colspan-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Membership</h5>
                                <ul class="list-group list-group-flush">
                                    @foreach ($total as $item)
                                        <li class="list-group-item">{{ ($item->name == $data->owner) ? $item->name . ' (Leader)' : $item->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



</div>
@endsection
