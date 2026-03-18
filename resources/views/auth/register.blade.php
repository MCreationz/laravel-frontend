@extends('auth.auth_layout')

@section('title', 'Register')
@section('heading', 'Create Account')

@section('content')

    <div class="form-heading mb-4 pb-lg-2">
        <h2 class="h1 mb-2">Welcome to Fundink</h2>
        <p class="font-small">Register your organization to start funding journey</p>
    </div>

    <form action="{{ route('register.step1') }}" method="POST"
        class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column gap-3">

        @csrf

        <div class="fields-wrap">

            <div class="col-12">
                <div class="row mb-md-3 mb-2">

                    <div class="col-6 pe-md-2 pe-1">
                        <label class="form-label">Organization Name</label>

                        <input type="text" name="organization_name"
                            class="form-control @error('organization_name') is-invalid @enderror"
                            placeholder="Enter Organization Name" value="{{ old('organization_name') }}" required>

                        @error('organization_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-6 ps-md-2 ps-1">
                        <label class="form-label">Work Email</label>

                        <input type="email" name="work_email"
                            class="form-control @error('work_email') is-invalid @enderror" placeholder="Enter Email"
                            value="{{ old('work_email') }}" required>

                        @error('work_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="col-12 mb-md-3 mb-2">
                <label class="form-label">Are you looking to:</label>

                <div class="select-wrapper w-100 position-relative">
                    <div class="custom-select form-control @error('role') is-invalid @enderror">
                        {{ old('role') ? ucfirst(str_replace('_', ' ', old('role'))) : 'Select an option' }}
                    </div>

                    <ul class="select-list">
                        <li data-value="funder">Raise Fund</li>
                        <li data-value="fund_seeker">Invest Fund</li>
                    </ul>

                    <input type="hidden" name="role" class="hidden-select" value="{{ old('role') }}">
                </div>

                @error('role')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12 mb-md-3 mb-2">
                <label class="form-label">How did you hear about Fundink?</label>

                <div class="select-wrapper w-100 position-relative">
                    <div class="custom-select form-control @error('referral_source') is-invalid @enderror">
                        {{ old('referral_source') ?? 'Select an option' }}
                    </div>

                    <ul class="select-list">
                        <li data-value="Referrals">Referrals</li>
                        <li data-value="Fundink Website">Fundink Website</li>
                        <li data-value="Internet">Internet</li>
                        <li data-value="Networking Event">Networking Event</li>
                        <li data-value="News Article">Remove duplicacy</li>
                        <li data-value="News Article">News Article</li>
                        <li data-value="Advertising">Advertising</li>
                        <li data-value="Direct Visit">LinkedIn</li>
                        <li data-value="Other Social Media">Other Social Media</li>
                    </ul>

                    <input type="hidden" name="referral_source" class="hidden-select" value="{{ old('referral_source') }}">
                </div>

                @error('referral_source')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12 mb-md-3 mb-2 position-relative">
                <label class="form-label">Create Password</label>

                <input type="password" name="password" id="createPassword"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" required>

                <button type="button"
                    class="btn show-password btn-outline-secondary position-absolute bottom-0 end-0 translate-middle-y me-2 p-0"
                    onclick="togglePasswordField('createPassword', 'createEye')">
                    <i id="createEye" class="bi bi-eye"></i>
                </button>

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12 mb-md-3 mb-2 position-relative">
                <label class="form-label">Re-enter Password</label>

                <input type="password" name="password_confirmation" id="confirmPassword"
                    class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password"
                    required>

                <button type="button"
                    class="btn show-password btn-outline-secondary position-absolute bottom-0 end-0 translate-middle-y me-2 p-0"
                    onclick="togglePasswordField('confirmPassword', 'confirmEye')">
                    <i id="confirmEye" class="bi bi-eye"></i>
                </button>

                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <!-- temporary captcha placeholder -->
            <input type="hidden" name="captcha" value="123456">

        </div>

        <div class="account-wrap">

            <div class="col-12 btn-wrap">
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </div>

            <div class="col-12 login-text text-center mt-3">
                <p>Already have an account? <a href="#">Log in</a></p>
            </div>

        </div>

    </form>

    <style>
        .otp-input.is-invalid {
            border-color: #dc3545;
        }
    </style>
    <script>
        function togglePasswordField(inputId, iconId) {
            const field = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                field.type = "password";
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }
    </script>

   

@endsection
