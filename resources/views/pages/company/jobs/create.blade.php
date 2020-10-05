<style type="text/css">
    div.card div.card-body a.btn {
        margin-top: -7.5px;
    }

    div.card div.card-body hr {
        width: 7%;
        border: 1px solid #000;
        margin-top: -7.5px;
    }
</style>
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card bg-light">
            <form action="{{ route('companyPublishJobs') }}" method="post">
                @csrf
                <div class="card-body">
                    <h4 class="card-title float-left">{{ (Request::input('id')) ? "Edit Job" : "Publish New Job" }}</h4>
                    <a class="btn btn-info float-right" href="">How i fill the form for publish job?</a>

                    <br />
                    <br />

                    <hr class="float-left" />

                    <br />

                    <div class="card-text">
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
                                @if (Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }} w-100">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>

                        <input type="hidden" name="job" value="{{ Request::input('id') ?? '' }}">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <label for="company"><strong>{{ __('Company Name') }} <span style="color: red;">*</span></strong></label>
                                    <input type="text" id="company_name" name="company_name" class="form-control" value="{{ $data->name }}" disabled />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-label-group">
                                    <label for="positions"><strong>{{ __('Available Positions')}} <span style="color: red;">*</span></strong></label>
                                    <input type="text" id="positions" name="available_positions" class="form-control" placeholder="Available Positions" value="{{ $company_jobs->available_positions ?? '' }}" required />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-label-group mt-3">
                                    <label for="description"><strong>{{ __('Jobs Description') }} <span style="color: red;">*</span></strong></label>
                                    <textarea class="form-control" id="jobs_description" name="jobs_description" placeholder="Jobs Description" rows="3">{{ $company_jobs->jobs_description ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-label-group mt-3">
                                    <label for="requirements"><strong>{{ __('Requirements') }} <span style="color: red;">*</span></strong></label>
                                    <textarea class="form-control" id="requirements" name="jobs_requirements" placeholder="Requirements Jobs" rows="3">{{ $company_jobs->jobs_requirements ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-label-group mt-3">
                                    <label for="portofolio"><strong>{{ __('Minimum Portofolio')}}</strong></label>
                                    <input type="number" id="portofolio" name="minimum_portofolio" class="form-control" placeholder="Minimum Portofolio" value="{{ $company_jobs->minimum_portofolio ?? '' }}">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-label-group mt-3">
                                    <label for="vendor_accepted_total"><strong>{{ __('Vendor Accepted Total')}} <span style="color: red;">*</span></strong></label>
                                    <input type="number" id="vendor_accepted_total" name="vendor_accepted_total" class="form-control" placeholder="Vendor Accepted Total" value="{{ $company_jobs->vendor_accepted_total ?? '' }}" required>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-label-group mt-3">
                                    <label for="jobs_expired"><strong>{{ __('Jobs Expired')}} <span style="color: red;">*</span></strong></label>
                                    <input type="date" id="jobs_expired" name="jobs_expired" class="form-control" placeholder="Jobs Expired" value="{{ $company_jobs->jobs_expired ?? '' }}" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-label-group mt-3">
                                    <label for="contact_number"><strong>{{ __('Contact Number')}}</strong></label>
                                    <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ $data->contact_number }}" disabled />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-label-group mt-3">
                                    <label for="contact_email"><strong>{{ __('Email Address')}}</strong></label>
                                    <input type="text" id="contact_email" name="contact_email" class="form-control" value="{{ $data->contact_email }}" disabled />
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-label-group mt-3">
                                    <label for="other"><strong>{{ __('Other')}}</strong></label>
                                    <textarea type="text" id="jobs_expired" name="other" class="form-control" placeholder="Other" rows="3">{{ $company_jobs->other ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-label-group mt-5">
                                    <div class="row">
                                        <span class="col-4"><button type="reset" class="btn btn-danger w-100">Reset</button></span>
                                        <span class="col-8"><button type="submit" class="btn btn-success w-100">{{ (Request::input('id')) ? "Edit Job" : "Publish Jobs" }}</button></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->

    <!-- <form action="{{ route('companyPublishJobs') }}" method="post">
        @csrf
        <h2>Publish New Jobs</h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-label-group mt-4">
                <label for="company"><strong>{{ __('Company Name') }}</strong></label>
                <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Company Name" required autofocus>
                    
                @error('company')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-label-group mt-4">
                <label for="jobs"><strong>{{ __('Jobs Name') }}</strong></label>
                <input type="text" id="jobs_name" name="jobs_name" class="form-control" placeholder="Jobs Name" required autofocus>

                    @error('jobs')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-label-group mt-4">
                <label for="description"><strong>{{ __('Jobs Description') }}</strong></label>
                <textarea class="form-control" id="jobs_description" name="jobs_description" rows="5"></textarea>
    
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-label-group mt-4">
                <label for="requirements"><strong>{{ __('Requirements') }}</strong></label>
                <textarea class="form-control" id="requirements" name="jobs_requirements" rows="5"></textarea>
                    
                @error('requirements')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-label-group mt-4">
                <label for="positions"><strong>{{ __('Positions')}}</strong></label>
                <input type="text" id="positions" name="available_positions" class="form-control" placeholder="Available Positions" required autofocus>

                    @error('positions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-label-group mt-4">
                <label for="portofolio"><strong>{{ __('Minimum Portofolio')}}</strong></label>
                <input type="number" id="portofolio" name="minimum_portofolio" class="form-control" placeholder="Minimum Portofolio" required autofocus>

                    @error('portofolio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-label-group mt-4">
                <label for="vendor_accepted_total"><strong>{{ __('Vendor Accepted Total')}}</strong></label>
                <input type="number" id="vendor_accepted_total" name="vendor_accepted_total" class="form-control" placeholder="Vendor Accepted Total" required autofocus>

                    @error('vendor_accepted_total')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-label-group mt-4">
                <label for="jobs_expired"><strong>{{ __('Jobs Expired')}}</strong></label>
                <input type="date" id="jobs_expired" name="jobs_expired" class="form-control" placeholder="Jobs Expired" required autofocus>

                    @error('jobs_expired')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-label-group mt-4">
                <label for="other"><strong>{{ __('other')}}</strong></label>
                <input type="text" id="jobs_expired" name="other" class="form-control" placeholder="other" required autofocus>

                    @error('other')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
             {{-- input type date --}}
            {{-- <div class="col-lg-6">
                <div class="form-label-group mt-4">
                <label for="name"><strong>{{ __('Start Submission') }}</strong></label>
                <input class="form-control" type="date" value="" id="start_submission" name="start_submission">
                    
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-label-group mt-4">
                <label for="name"><strong>{{ __('End Submission') }}</strong>,</label>
                <input class="form-control" type="date" value="" id="end_submission" name="end_submission">
                    
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div> --}}
            <div class="col-lg-9 col-md-8"></div>
            <div class="col-lg-3 col-md-4">
                <div class="form-label-group mt-4">
                    
                    <span><button type="submit" class="btn btn-danger"  style="width:35%">Cancel</button></span>
                    <span><button type="submit" class="btn btn-success" style="width:63%">Publish Jobs</button></span>


                </div>
            </div>
            </div>
        </div>
    </form> -->
</div>
@endsection