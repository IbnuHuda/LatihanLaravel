<style>
    div.card div.card-body hr {
        width: 5%;
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
                <h4 class="card-title">Register Job</h4>
                <hr class="float-left" />

                <div style="clear: both;"></div>
                
                <p class="">{{$job->available_position}}</p>

                <form action="{{ route('usersJobsRegister') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="job" value="{{ Request::route('id') }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input class="form-control" id="company" value="{{ $detail_companies->name }}" disabled></input>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="available_position">Job Available</label>
                                <input class="form-control" id="available_position" value="{{ $job->available_positions }}" disabled></input>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="text-area-p">Describe Yourself <span style="color: red">*</span></label>
                        <textarea name="proposal" class="form-control" id="text-area-p" rows="3" placeholder="Type about yourself"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="salary" id="salary" placeholder="Rp. 10.000.000">
                            <div class="input-group-append">
                                <div class="input-group-text">IDR</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="text-area-q">Question</label>
                        <textarea name="question" class="form-control" id="text-area-q" rows="3" placeholder="Any Question ?"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="portofolio">Portofolio <span style="color: red;">*max 4</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="portofolio" name="portofolios[]" multiple>
                            <label class="custom-file-label form-control" for="portofolio">Portofolio</label>
                        </div>
                    </div>

                    <div class="mt-4 float-right">
                        @if (Auth::user()->team_id == null)
                            <button type="submit" class="btn btn-primary" onclick="return apply('team')"><i class="fa fa-users"></i> Submit As Team</button>
                        @else
                            <button type="submit" class="btn btn-danger" disabled><i class="fa fa-users"></i> Submit As Team</button>
                        @endif
                        <button type="submit" class="btn btn-success" onclick="return apply()"><i class="fa fa-user"></i> Submit As Personally</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/image.js') }}" defer></script>
@endsection