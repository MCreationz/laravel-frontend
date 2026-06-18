@extends('auth.auth_layout')

@section('title', 'Forgot Password')
@section('heading', 'Forgot Password')

@section('content')

    <div class="form-heading mb-4">
        <div class="gradient-icon mb-4">
            <img src="{{ asset('img/direction.png') }}"
                alt="direction icon"
                width="25.228912353515625"
                height="18.28917694091797"
                fetchpriority="high">
        </div>

        <h1>Forgot Password?</h1>

        <p class="font-small">
            Enter your registered email address and we'll send you a password reset link.
        </p>
    </div>

    {{-- @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif --}}

    <form method="POST"
        action="{{ route('forgot.password.send') }}"
        class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">

        @csrf

        <div class="fields-wrap">

            <div class="col-12 mb-md-3 mb-2">
                <label class="form-label">
                    Work Email<span>*</span>
                </label>

                <input
                    type="email"
                    name="work_email"
                    class="form-control @error('work_email') is-invalid @enderror"
                    placeholder="Email address"
                    value="{{ old('work_email') }}"
                    required>

                @error('work_email')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>

        <div class="account-wrap">

            <div class="col-12 btn-wrap mt-4">
                <button type="submit" class="btn btn-primary w-100">
                    Send Reset Link
                </button>
            </div>

            <div class="col-12 login-text text-center mt-3">
                <p>
                    Remember your password?
                    <a href="{{ route('login') }}">
                        Back to Login
                    </a>
                </p>
            </div>

        </div>

    </form>

@endsection