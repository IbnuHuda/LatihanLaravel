<style>

    /*#bg-image {
        background: url('/images/websites/wave-login.png') no-repeat;
        width: 100%;
        height: 50%;
        background-size: 100%;
        background-position: bottom;
        background-color: #B9D5FF;
    }*/

    #text-title {
        color: #4093FB;
        font-weight: bold;
        font-size: 25px;
    }

    #text-content {
        color: #4093FB;
        font-weight: bold;

    }

    #form-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: -8px -8px 10px #ededed, 8px 8px 10px  #4B4B4B;
    }
</style>

@extends('layouts.index')

@section('content')

<!-- <div class="container-fluid h-100" id="bg-image"> -->

<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if (Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>

            <div class="card w-60 mt-5" id="form-container">
                <div class="text-center mt-3">
                    <p id="text-title">Welcome Company</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('company-login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                            <div class="col-md-11">
                                <input id="email" placeholder="E-Mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-11">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 ml-3">
                                <div class="text-left">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-11 ml-3">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-11 ml-1">
                                @if (Route::has('companyResetPasswordForm'))
                                    <a class="btn btn-link" href="{{ route('companyEmailValidationForm') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div align="center">
                        <p align="center" class="font-weight-bold">Or Login With</p>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="/vendor/auth/google"><i class="fa fa-google fa-2x"></i><tr></a>
                            </div>

                            <div class="col-auto">
                                <a href="/vendor/auth/facebook"><i class="fa fa-facebook fa-2x"></i></a>
                            </div>
                        </div>
                        <!-- <a href="/vendor/auth/github" class="btn btn-success">Login with Github</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
