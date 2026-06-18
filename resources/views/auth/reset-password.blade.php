@extends('auth.auth_layout')

@section('title', 'Reset Password')
@section('heading', 'Reset Password')

@section('content')

    <div class="form-heading mb-4">
        <div class="gradient-icon mb-4">
            <img src="{{ asset('img/direction.png') }}"
                alt="direction icon"
                width="25.228912353515625"
                height="18.28917694091797"
                fetchpriority="high">
        </div>

        <h1>Set New Password</h1>

        <p class="font-small">
            Please enter your new password below.
        </p>
    </div>

    <form method="POST"
        action="{{ route('password.reset') }}"
        class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">

        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="fields-wrap">

            <div class="col-12 mb-md-3 mb-2 position-relative">
                <label class="form-label">
                    New Password<span>*</span>
                </label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Enter new password"
                    required>

                <button type="button"
                    class="btn show-password btn-outline-secondary position-absolute bottom-0 end-0 translate-middle-y me-2 p-0"
                    onclick="togglePassword('password','eyeIcon1')">
                    <i id="eyeIcon1" class="bi bi-eye"></i>
                </button>

                @error('password')
                    <div class="text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-12 mb-md-3 mb-2 position-relative">
                <label class="form-label">
                    Confirm Password<span>*</span>
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control"
                    placeholder="Confirm password"
                    required>

                <button type="button"
                    class="btn show-password btn-outline-secondary position-absolute bottom-0 end-0 translate-middle-y me-2 p-0"
                    onclick="togglePassword('password_confirmation','eyeIcon2')">
                    <i id="eyeIcon2" class="bi bi-eye"></i>
                </button>
            </div>

        </div>

        <div class="account-wrap">

            <div class="col-12 btn-wrap mt-4">
                <button type="submit" class="btn btn-primary w-100">
                    Reset Password
                </button>
            </div>

            <div class="col-12 login-text text-center mt-3">
                <p>
                    <a href="{{ route('login') }}">
                        Back to Login
                    </a>
                </p>
            </div>

        </div>

    </form>

    <script>
        function togglePassword(fieldId, iconId) {

            const field = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }
    </script>

@endsection