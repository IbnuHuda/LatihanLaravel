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

    div#card-login {
        border-radius: 10px;
        margin-top: 80px;
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

            <div id="card-login">
                <form method="POST" action="{{ route('company-login') }}">
                    @csrf

                    <h4 class="text-center mb-4 mt-5" style="overflow-y: hidden;">Sign Up as Company</h4>

                    <div class="row">
                        <div class="flash-message col-md-12">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
                                @if (Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="form-label-group w-75">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail Address" required autofocus>
                        <label for="email">{{ __('E-Mail Address') }}</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-label-group w-75">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
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
                            @if (Route::has('companyEmailValidationForm'))
                                <a class="float-right" href="{{ route('companyEmailValidationForm') }}">
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
                        <p class="text-center" style="overflow-y: hidden;">
                            <a href="/company/auth/google"><i class="fa fa-google text-danger"></i></a>
                            <!-- <a href="/company/auth/facebook"><i class="fa fa-facebook text-primary"></i></a> -->
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection