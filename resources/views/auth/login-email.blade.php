@extends('auth.auth_layout')

@section('title', 'Login with OTP')
@section('heading', 'Login with One-Time Code')

@section('content')

    <div class="form-heading mb-4 pb-lg-2">
        <h1>Welcome to Fundink</h1>
        <p class="font-small">Login to continue</p>
    </div>

    <form method="POST" action="{{ route('login.otp.send') }}"
        class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">

        @csrf

        <div class="fields-wrap">

            <div class="col-12 mb-md-3 mb-2">
                <label class="form-label">Enter your registered email</label>

                <input type="email" name="email" class="form-control" placeholder="Email address" required>
            </div>

        </div>

        <div class="account-wrap">

            <div class="col-12 btn-wrap mt-2">
                <button type="submit" class="btn btn-primary w-100">
                    Send OTP
                </button>
                <p class="text-center my-2">or</p>
                <a href="{{ route('login.password') }}" class="btn btn-primary w-100">
                    Login with Password
                </a>
            </div>


        </div>

        <div class="col-12 login-text text-center mt-3">
            <p class="text-decoration-none">By continuing you agree to our <a href="#">privacy policy</a> and <a
                    href="#">terms of use</a></p>
            <p>Don’t have an account? <a href="{{ route('register') }}">Register</a>
            </p>
        </div>

        </div>

    </form>

@endsection
