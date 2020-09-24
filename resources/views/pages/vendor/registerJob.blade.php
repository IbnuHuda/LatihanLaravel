<style>
    .img{
        max-width: 10%;
    }
</style>

@extends('layouts.dashboard')

@section('content')

    <div class="container mr-5 mt-3">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$job->jobs_name}}</h5>
                <p class="">{{$job->available_position}}</p>

                <form action="{{route('usersJobsRegister')}}" method="post" enctype="multipart/form-data">
                @csrf

                    <input type="hidden" name="job" value="{{ Request::route('id') }}">

                    <div class="form-group">
                        <label for="text-area-p">Proposal</label>
                        <textarea name="proposal" class="form-control" id="text-area-p" rows="3" placeholder="Proposal"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="text-area-q">Question</label>
                        <textarea name="question" class="form-control" id="text-area-q" rows="3" placeholder="Any Question ?"></textarea>
                    </div>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="portofolio" name="portofolios[]" multiple>
                        <label class="custom-file-label" for="portofolio"></label>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Submit As Team</button>
                        <button type="submit" class="btn btn-success">Submit As Personally</button>
                    </div>


                </form>
            </div>
        </div>

    </div>



@endsection
