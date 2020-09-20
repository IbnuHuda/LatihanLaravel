@extends('layouts.vendorDashboard')

@section('content')
<div class="container">

    <div class="card-deck">

        <div class="card">
          <div class="card-body">
            <img src="{{ asset($data->photo) }}" class="rounded-circle float-right" id="photo">
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

            <form action="{{route('usersEditProfile')}}" method="post">
            @csrf

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputProfileName">Name</label>
                  <input type="name" name="name" class="form-control" id="inputProfileName" value="{{$data->name}}" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="selectProfileGender">Gender</label>
                    {{-- <select type="gender" class="custom-select" id="selectProfileGender" required>
                        <option selected>Gender</option>
                        <option value="1" @php
                            if ($data->gender == "Male" || $data->gender == "male") {
                                echo "selected";
                            }
                        @endphp>Male</option>

                        <option value="2" @php
                        if ($data->gender == "Female" || $data->gender == "female") {
                            echo "selected";
                        }
                        @endphp>Female</option> --}}
                    <input type="gender" name="gender" class="form-control" id="selectProfilGender" value="{{$data->gender}}" required>



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
