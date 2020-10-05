<style>
    .img{
        max-width: 10%;
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
</div>

<div>
    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <img src="{{ (!$data->photo) ? asset('images/websites/def_photo.png') : url('storage/images/users/'. $data->photo) }}" class="img rounded-circle float-right h-10 w-10" id="photo">
                <h5 class="card-title">{{ $data->name }}</h5>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Gender : {{ (!$data->gender) ? '-' : $data->gender }}</li>
                    <li class="list-group-item">Birth : {{ (!$data->place_of_birth && !$data->date_of_birth) ? '-' : $data->place_of_birth . ', ' . $data->date_of_birth }}</li>
                    <li class="list-group-item">Address : {{ (!$data->address) ? '-' : $data->address }}</li>
                    <li class="list-group-item">Contact : {{ (!$data->contact) ? '-' : $data->contact }}</li>
                    <li class="list-group-item">Bio : <br />{{ (!$data->bio) ? '-' : $data->bio }}</li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Profile</h5>

                <form action="{{ route('usersProfile') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputProfileName">Name <span style="color: red;">*</span></label>
                            <input type="text" name="name" placeholder="Fullname" class="form-control" id="inputProfileName" value="{{ $data->name }}" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="selectProfileGender">Gender <span style="color: red;">*</span></label>
                            <select name="gender" class="custom-select" id="selectProfileGender" required>
                                @if ($data->gender == 'Female')
                                    <option disabled>-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                                @elseif ($data->gender == 'Male')
                                    <option disabled>-- Select Gender --</option>
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                @else
                                    <option selected disabled>-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputProfilePlace">Place Of Birth <span style="color: red;">*</span></label>
                            <input type="text" name="place_of_birth" placeholder="Surabaya" class="form-control" id="inputProfilePlace" value="{{ $data->place_of_birth }}" required>
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="selectProfileDate">Date Of Birth <span style="color: red;">*</span></label>
                            <input type="date" name="date_of_birth" class="form-control" id="selectProfileDate" value="{{ $data->date_of_birth }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputProfileAddress">Address <span style="color: red;">*</span></label>
                        <input type="address" name="address" class="form-control" id="inputProfileAddress" placeholder="1234 Main St" value="{{ $data->address }}" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputProfileContact">Contact <span style="color: red;">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+62</div>
                                    </div>
                          
                                    <input type="contact" name="contact" class="form-control" id="inlineFormInputGroupUsername" placeholder="123456789" value="{{ $data->contact }}" required>
                                </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="uploadPhoto">Photo Profile</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="uploadPhoto" name="photo">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Bio</label>
                        <textarea name="bio" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="My hobby is ...">{{ $data->bio }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
