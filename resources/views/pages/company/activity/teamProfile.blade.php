<style>
    div.card div.card-body hr {
        width: 10%;
        border: 1px solid #000;
        margin-top: 0px;
    }

    .img {
        max-width: 30%;
        margin-left: 35%;
    }

    @media screen and (max-width: 991px) {
        .card-title{
            font-size: 20px;
        }

        li{
            font-size: 13px;
        }
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

    <div class="col-sm-7 mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Team Profile</h4>
                <hr class="float-left" />

                <div style="clear: both;"></div>

                <img src="{{ ($data == null || $data->photo == null) ?  asset('images/websites/def_photo.png') : url('storage/images/team/'. $data->photo) }}" class="img rounded-circle" id="photo">
                <ul class="list-group list-group-flush mt-4">
                    <li class="list-group-item">Name : {{ucfirst( $data->name)}}</li>
                    <li class="list-group-item">Owner : {{$data->owner}}</li>
                    <li class="list-group-item">Address : {{$data->address}}</li>
                    <li class="list-group-item">Bio : <br />{{$data->bio}}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-5">
        <div class="row mt-3">
            <div class="col colspan-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Membership</h4>
                        <hr class="float-left" />

                        <div style="clear: both;"></div>
                        <ul class="list-group list-group-flush">
                            @foreach ($total as $item)
                                <li class="list-group-item">
                                    <a href="{{ route('companyUserDetail', $item->id) }}">{{ $item->name }}</a> {{ ($item->name == $data->owner) ? '(Leader)' : '' }}
                                </li>
                            @endforeach
                            <li class="list-group-item">
                                <div class="float-right">
                                    <button onclick="window.history.back();" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
