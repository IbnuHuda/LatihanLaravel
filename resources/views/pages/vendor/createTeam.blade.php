<style>
    .img{
        max-width: 10%;
    }
</style>

@extends('layouts.dashboard')

@section('content')

    <div class="container-lg mr-5 mt-3">

        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if (Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>

            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Create Team</h5>

                            <form action="{{ route('usersCreateTeam') }}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputProfileName">Name <span style="color: red;">*</span></label>
                                        <input type="text" name="name" placeholder="Team Name" class="form-control" id="inputProfileName" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputProfileAddress">Address <span style="color: red;">*</span></label>
                                        <input type="address" name="address" class="form-control" id="inputProfileAddress" placeholder="1234 Main St"required>
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
                                <button type="submit" class="btn btn-success">Create</button>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('usersJoinTeam') }}" method="post">
                            <label for="joinTeam"><p class="card-title">Team Code</p></label>

                            <input type="text" class="form-control col-md-12" id="joinTeam" name="team_join" placeholder="Team Code">
                            <button type="submit" class="btn btn-primary mt-3">Join Team</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
