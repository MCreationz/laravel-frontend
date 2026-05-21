@extends('auth.auth_layout')

@section('title', 'Login with OTP')
@section('heading', 'Login with One-Time Code')

@section('content')

    <div class="form-heading mb-4 pb-lg-2">
        <div class="with-back d-flex justify-content-between align-items-center mb-4" >
        <div class="gradient-icon ">
            <img src="{{ asset('img/direction.png') }}" alt="direction icon" width="25.228912353515625"
                height="18.28917694091797" fetchpriority="high">
        </div>
        <a href="#" class="back-btn">Go Back</a>
        </div>

        <h1>Welcome to Fundink</h1>
        <p class="font-small">Enter your registered email to continue.</p>
    </div>

    <form method="POST" action="{{ route('login.otp.send') }}"
        class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">

        @csrf

        <div class="fields-wrap">

            <div class="col-12 mb-md-3 mb-2">
                <label class="form-label">Registered email</label>

                <input type="email" name="email" class="form-control" placeholder="Email address" required>
            </div>

        </div>

        <div class="account-wrap">

            <div class="col-12 btn-wrap mt-2">
                <button type="submit" class="btn btn-primary w-100">
                    Send OTP
                </button>
            </div>
            <div class=" login-text text-center mt-3">
            <p> <a style="color:#282828 !important;" href="{{ route('login.password') }}">Log in with password instead</a>
            </p>
            
         </div>
         
        </div>

        </div>

    </form>

@endsection
