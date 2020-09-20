<style type="text/css">
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
        display: flex;
        justify-content: center;
        align-items: center;
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
</style>

@extends('layouts.index')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register as Vendor</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div id="card-register">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <h3 class="text-center">Sign Up for Free Vendor Account</h3>

                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg) 
                            @if (Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div>

                    <div class="form-label-group mt-4 w-75">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required autofocus>
                        <label for="name">{{ __('Name') }}</label>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-label-group w-75">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail Address" required>
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

                    <div class="form-label-group w-75">
                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm Password" required>
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                        @error('password-confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me" required><span class="ml-3">I agree to the <a href="">Term of Use</a>, <a href="">Privacy Police</a>, and <a href="">Refund Police</a>.</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary w-75 mt-2">
                        {{ __('Register') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
