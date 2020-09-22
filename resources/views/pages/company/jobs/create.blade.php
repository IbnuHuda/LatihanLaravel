@extends('layouts.companyDashboard')

@section('content')
<div class="container" style="margin-top:25px">
    <form action="/company/jobs/publish" method="post">
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
    </form>
    </div>
@endsection