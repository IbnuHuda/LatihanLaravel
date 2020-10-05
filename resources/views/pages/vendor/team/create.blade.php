<style>
    div.card div.card-body hr {
        width: 10%;
        border: 1px solid #000;
        margin-top: -2.5px;
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
    
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Team</h5>
                <hr class="float-left" />

                <div style="clear: both;"></div>

                <form action="{{ route('usersCreateTeam') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-12 mt-2">
                            <label for="inputProfileName">Name <span style="color: red;">*</span></label>
                            <input type="text" name="name" placeholder="Team Name" class="form-control" id="inputProfileName" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputProfileAddress">Address</label>
                            <input type="address" name="address" class="form-control" id="inputProfileAddress" placeholder="1234 Main St">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="uploadPhoto">Photo Profile</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="uploadPhoto" name="photo">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">Team Bio</label>
                            <textarea name="bio" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="My Team is ..."></textarea>
                        </div>
                    </div>

                    <div class="float-right mt-2">
                        <button onclick="window.history.back();" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('usersJoinTeam') }}" method="post">
                    <h5 class="card-title">Join Team</h5>

                    <hr class="float-left" />

                    <div style="clear: both;"></div>

                    <input type="text" class="form-control col-md-12 mt-2" id="joinTeam" name="team_join" placeholder="Type team access code">
                    <button type="submit" class="btn btn-primary mt-3 float-right">Join Team</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
