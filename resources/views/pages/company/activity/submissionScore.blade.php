<style type="text/css">
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
        <div class="flash-message col-lg-12">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
                @if (Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }} w-100">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Submission Score</h4>
                <hr class="float-left" />

                <div style="clear: both;"></div>
                <div class="mt-3"></div>
                
                <div class="form-group col-md-12">
                    <label for="inputProfileName">Name</label>
                    <input type="text" class="form-control" id="inputProfileName" value="{{ ($data->team_id != null) ? $data->teamProfile->name . ' - as Team' : $data->user->name . ' - as Person' }}" disabled>
                </div>

                <div class="col-md-12">
                    <form method="post" action="{{ route('companySubmissionScore') }}">
                        @csrf

                        <input type="hidden" value="{{ Request::route('id') }}" name="portofolio">
                        <div class="row">
                            @foreach ($data_image as $image)
                                <div class="col-md-6 text-center" style="border: 1px solid #000;">
                                    <h5 class="mb-3 mt-3">Portofolio #{{ $loop->iteration }}</h5>
                                    <img class="img-responsive w-50 mb-3" src="{{ url('storage/images/company/portofolio/' . $image) }}">
                                    <p>Give score :</p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="portofolio{{$loop->iteration}}" id="100p{{ $loop->iteration }}" value="100" required />
                                            <label class="form-check-label" for="100p{{ $loop->iteration }}">100%</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input class="form-check-input" type="radio" name="portofolio{{$loop->iteration}}" id="75p{{ $loop->iteration }}" value="75" required />
                                                <label class="form-check-label" for="75p{{ $loop->iteration }}">75%</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input class="form-check-input" type="radio" name="portofolio{{$loop->iteration}}" id="50p{{ $loop->iteration }}" value="50" required />
                                            <label class="form-check-label" for="50p{{ $loop->iteration }}">50%</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input class="form-check-input" type="radio" name="portofolio{{$loop->iteration}}" id="25p{{ $loop->iteration }}" value="25" required />
                                            <label class="form-check-label" for="25p{{ $loop->iteration }}">25%</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-check-input" type="radio" name="portofolio{{$loop->iteration}}" id="0p{{ $loop->iteration }}" value="0" required />
                                            <label class="form-check-label" for="0p{{ $loop->iteration }}">0%</label>
                                        </div>        
                                    </div>  
                                </div>
                                
                            @endforeach
                        </div>

                        <div class="float-right mt-5">
                            <button onclick="window.history.back();" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</button>
                            <button class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection