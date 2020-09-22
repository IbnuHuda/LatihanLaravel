<style>
    .img{
        max-width: 10%;
    }
</style>

@extends('layouts.vendorDashboard')

@section('content')
<div class="container">

    @if ($pData != null)

        <div class="row mt-5">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                    @if ($pData->photo == null)
                        <img src="{{ url('images/websites/def_photo.png') }}" class="img rounded-circle float-right h-10 w-10" id="photo">
                    @else
                        <img src="{{ url('storage/images/users/'. $pData->photo) }}" class="img rounded-circle float-right h-10 w-10" id="photo">
                    @endif

                    <h5 class="card-title mt-3">{{$data->name}}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Gender : {{$pData->gender!=null ? $pData->gender : 'Empty'}}</li>
                        <li class="list-group-item">Birth : {{$pData->place_of_birth!=null ? $pData->place_of_birth : 'Empty'}} / {{$pData->date_of_birth!=null ? $pData->date_of_birth : 'Empty'}}</li>
                        <li class="list-group-item">Address : {{$pData->address!=null ? $pData->address : 'Empty'}}</li>
                        <li class="list-group-item">Contact : {{$pData->contact!=null ? $pData->contact : 'Empty'}}</li>
                        <li class="list-group-item">Bio : <br />{{$pData->bio!=null ? $pData->bio : 'Empty'}}</li>
                    </ul>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Company</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Name : </li>
                                    <li class="list-group-item">Address : </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col colspan-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rating</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="list-group-item">Project Done : </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else

        <div class="row mt-5">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                    <img src="{{ url('images/websites/def_photo.png') }}" class="img rounded-circle float-right h-10 w-10" id="photo">
                    <h5 class="card-title mt-3">{{$data->name}}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Gender : Empty</li>
                        <li class="list-group-item">Birth : Empty</li>
                        <li class="list-group-item">Address : Empty</li>
                        <li class="list-group-item">Contact : Empty</li>
                        <li class="list-group-item">Bio : <br />Empty</li>
                    </ul>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Company</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Name : Empty</li>
                                    <li class="list-group-item">Address : Empty</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col colspan-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Rating</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li class="list-group-item">Project Done : Empty</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif

</div>
@endsection
