<style type="text/css">
    div.card div.card-body hr {
        width: 7.5%;
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
                <h4 class="card-title">User Profile</h4>
                <hr class="float-left" />

        <div class="flash-message col-lg-12">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if (Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }} w-100">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>

        <table class="table table-hover table-light ">
            <thead>
              <tr class="bg-primary text-light ">
                {{-- <th scope="col">#</th> --}}
                <th scope="col" >Name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Place Of Birth</th>
                <th scope="col">Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Photo</th>
                <th scope="col">Bio</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user_profile[0]->gender}}</td>
                    <td>{{$user_profile[0]->place_of_birth}}</td>
                    <td>{{$user_profile[0]->address}}</td>
                    <td>{{$user_profile[0]->contact}}</td>
                    <td>{{$user_profile[0]->photo}}</td>
                    <td>{{$user_profile[0]->bio}}</td>
                </tr>
            </tbody>
          </table>
          <div class="float-left mt-3">
            <button onclick="window.history.back();" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</button>
        </div>
        </div>
   </div>
    </div>
</div>

@endsection
