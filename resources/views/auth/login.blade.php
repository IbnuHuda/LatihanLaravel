<style>
    :root {
        --input-padding-x: .75rem;
        --input-padding-y: .75rem;
    }

    div.col-md-8 {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    div#card-register {
        border-radius: 10px;
        margin-top: 25px;
        background-color: var(--main-bg-color);
        color: var(--main-text-color);
        width: 26rem;
        height: 28.5rem;
        opacity: 0.95;
        box-shadow: 1px 1px 7.5px var(--shadow-color);
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem;
        margin-left: 12.5%;
    }

    .form-label-group > input,
    .form-label-group > label {
        padding: var(--input-padding-y) var(--input-padding-x);
        height: 45px;
        overflow-y: hidden;
    }

    .form-label-group > label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-moz-placeholder {
        color: transparent;
    }

    .form-label-group input::placeholder {
        color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
        padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
        padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown) ~ label {
        padding-top: calc(var(--input-padding-y) / 3);
        padding-bottom: calc(var(--input-padding-y) / 3);
        font-size: 12px;
        color: #777;
    }

    div form div.checkbox {
        margin-left: 12.5%;
        margin-right: 12.5%;
    }

    div form button.btn.btn-primary.w-75 {
        margin-left: 12.5%;
    }

    div#social-login p.text-center a {
        font-size: 30px;
        margin: 0 10px;
        text-decoration: none;
    }
</style>

@extends('layouts.index')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div id="card-register">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <h4 class="text-center mb-4 mt-5">Sign Up as Vendor</h4>

                    <div class="form-label-group w-75">
                        <input type="email" id="email" class="form-control" placeholder="E-mail Address" required autofocus>
                        <label for="email">{{ __('E-Mail Address') }}</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-label-group w-75">
                        <input type="password" id="password" class="form-control" placeholder="Password" required>
                        <label for="password">{{ __('Password') }}</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" id="checkbox" {{ old('remember') ? 'checked' : '' }}>
                            <span class="ml-3">{{ __('Remember Me') }}
                        </label>
                            @if (Route::has('password.request'))
                                <a class="float-right" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </span>
                    </div>

                    <button type="submit" class="btn btn-primary w-75 mt-2">
                        {{ __('Login') }}
                    </button>

                    <div id="social-login">
                        <p class="mt-4 text-center">Or Sign Up With</p>
                        <p class="text-center">
                            <a href="/vendor/auth/google"><i class="fa fa-google text-danger"></i></a>
                            <a href="/vendor/auth/facebook"><i class="fa fa-facebook text-primary"></i></a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container-fluid h-100" id="bg-image">

<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card w-60 mt-5" id="form-container">

                <div class="text-center mt-3">
                    <p id="text-title">Welcome Vendor</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label><br> --}}

                            <div class="col-md-11">
                                <input id="email" type="email" placeholder="E-Mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
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
                        <a href="/vendor/auth/github" class="btn btn-success">Login with Github</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div> -->
@endsection
