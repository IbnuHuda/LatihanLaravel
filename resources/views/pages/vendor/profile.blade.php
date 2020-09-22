<style>
    .img{
        max-width: 10%;
    }
</style>

@extends('layouts.vendorDashboard')

@section('content')
<div class="container">

    <div class="card-deck">

        <div class="card">
          <div class="card-body">
            <img src="{{ url('storage/images/users/'. $data->photo) }}" class="img rounded-circle float-right h-10 w-10" id="photo">
            <h5 class="card-title">{{$data->name}}</h5>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">Gender : {{$data->gender}}</li>
                <li class="list-group-item">Birth : {{$data->place_of_birth}} / {{$data->date_of_birth}}</li>
                <li class="list-group-item">Address : {{$data->address}}</li>
                <li class="list-group-item">Contact : {{$data->contact}}</li>
                <li class="list-group-item">Bio : <br />{{$data->bio}}</li>
            </ul>

          </div>
        </div>


        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Profile</h5>

            <form action="{{route('usersEditProfile')}}" method="post" enctype="multipart/form-data">
            @csrf

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputProfileName">Name</label>
                  <input type="name" name="name" class="form-control" id="inputProfileName" value="{{$data->name}}" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="selectProfileGender">Gender</label>
                    <select name="gender" class="custom-select" id="selectProfileGender" required>
                        @if ($data->gender == 'Female')
                            <option disabled>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female" selected>Female</option>
                        @elseif ($data->gender == 'Male')
                            <option disabled>Gender</option>
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                        @else
                            <option selected disabled>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        @endif
                    </select>
                  </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputProfilePlace">Place Of Birth</label>
                    <input type="birth_place" name="place_of_birth" class="form-control" id="inputProfilePlace" value="{{$data->place_of_birth}}" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="selectProfileDate">Date Of Birth</label>
                      <input type="birth_date" name="date_of_birth" class="form-control" id="selectProfileDate" value="{{$data->date_of_birth}}" required>
                    </div>
                  </div>

                <div class="form-group">
                  <label for="inputProfileAddress">Address</label>
                  <input type="address" name="address" class="form-control" id="inputProfileAddress" placeholder="1234 Main St" value="{{$data->address}}" required>
                </div>

                <div class="form-group">
                  <label for="inputProfileContact">Contact</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text">+62</div>
                    </div>
                  <input type="contact" name="contact" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username" value="{{$data->contact}}" required>
                </div>

                </div>

                <div class="form-group">
                    <label for="uploadPhoto">Photo Profile</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="uploadPhoto" name="photo">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Bio</label>
                    <textarea name="bio" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$data->bio}}</textarea>
                  </div>


                <button type="submit" class="btn btn-primary">Save</button>
              </form>

          </div>
        </div>

      </div>


</div>
@endsection
