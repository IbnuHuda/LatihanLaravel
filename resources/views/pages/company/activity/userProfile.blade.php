<style>
    div.card div.card-body hr {
        width: 10%;
        border: 1px solid #000;
        margin-top: 0px;
    }

    .img-responsive.rounded-circle.mt-3 {
        width: 200px;
        height: 200px;
    }
</style>
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Profile</h4>
                <hr class="float-left" />

                <div style="clear: both;"></div>

                <div class="text-center">
                    <img src="{{ (!$data->photo) ? asset('images/websites/def_photo.png') : url('storage/images/users/'. $data->photo) }}" class="img-responsive rounded-circle mt-3" id="photo">
                </div>
                
                <table border="0" class="table table-striped mt-4"  style="font-size: 15px; color:black">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>{{ $data->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td>{{ (!$data->gender) ? '-' : $data->gender }}</td>
                        </tr>
                        <tr>
                            <td>Birth</td>
                            <td>:</td>
                            <td>{{ (!$data->place_of_birth && !$data->date_of_birth) ? '-' : $data->place_of_birth . ', ' . $data->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>{{ (!$data->address) ? '-' : $data->address }}</td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>:</td>
                            <td>{{ (!$data->contact) ? '-' : '+62' . $data->contact }}</td>
                        </tr>
                        <tr>
                            <td>Bio</td>
                            <td>:</td>
                            <td>{{ (!$data->bio) ? '-' : $data->bio }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Activity</h4>
                <hr class="float-left" />

                <div style="clear: both;"></div>

                <div class="card-text">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Portofolio : {{ $data_stat->portofolio_sent_amount ?? '0' }}</li>
                        <li class="list-group-item">Registered Jobs : {{ $data_stat->job_registered_amount ?? '0' }}</li>
                        <li class="list-group-item">Rating : {{( $data_stat == null || $data_stat->rating_granted == null) ? '0.0' : $data_stat->rating_granted }} / 5.0</li>
                        <li class="list-group-item">
                            <div class="float-right mt-2">
                                <button onclick="window.history.back();" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection