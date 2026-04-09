@extends('auth.auth_layout')

@section('title', 'Login with OTP')
@section('heading', 'OTP Verification')

@section('content')

    <div class="form-heading mb-5 pb-lg-4">
        <h1>Verify your Email</h1>
        <p class="font-small">
            We’ve sent a 6-digit verification code to your registered email address. Please enter the code below to securely
            log in to your Fundink account.

        </p>
    </div>

    <form id="otpForm" method="POST" action="{{ route('login.otp.verify') }}"
        class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">

        @csrf

        <div class="fields-wrap">
                @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

            <div class="otp-container">

                <input type="hidden" name="work_email" value="{{ session('email') }}">

                <input type="text" maxlength="1" class="otp-input {{ session('error') ? 'is-invalid' : '' }}"
                    inputmode="numeric" pattern="[0-9]*" placeholder="-">

                <input type="text" maxlength="1" class="otp-input {{ session('error') ? 'is-invalid' : '' }}"
                    inputmode="numeric" pattern="[0-9]*" placeholder="-">

                <input type="text" maxlength="1" class="otp-input {{ session('error') ? 'is-invalid' : '' }}"
                    inputmode="numeric" pattern="[0-9]*" placeholder="-">

                <input type="text" maxlength="1" class="otp-input {{ session('error') ? 'is-invalid' : '' }}"
                    inputmode="numeric" pattern="[0-9]*" placeholder="-">

                <input type="text" maxlength="1" class="otp-input {{ session('error') ? 'is-invalid' : '' }}"
                    inputmode="numeric" pattern="[0-9]*" placeholder="-">

                <input type="text" maxlength="1" class="otp-input {{ session('error') ? 'is-invalid' : '' }}"
                    inputmode="numeric" pattern="[0-9]*" placeholder="-">
            </div>

            <input type="hidden" name="otp" id="otpValue">

            <div class="col-12 otp-text login-text text-center mt-4">
                <p>
                    Didn’t receive the OTP?
                    <a href="{{ route('login.otp.email') }}">Send again</a>
                </p>
            </div>

        </div>

        <div class="account-wrap">

            <div class="col-12 btn-wrap mt-2">
                <button type="submit" class="btn btn-primary w-100" id="verifyBtn" disabled>
                    Verify & Login
                </button>
            </div>

            <div class="col-12 login-text text-center mt-3">
                <p class="text-decoration-none">By continuing you agree to our <a href="#">privacy policy</a> and <a
                        href="#">terms of use</a></p>
                <p>
                    Already have an account?
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>

        </div>

    </form>


    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const inputs = document.querySelectorAll(".otp-input");
            const otpValue = document.getElementById("otpValue");
            const form = document.getElementById("otpForm");
            const submitBtn = document.getElementById("verifyBtn");

            inputs.forEach((input, index) => {

                input.addEventListener("input", function() {

                    this.value = this.value.replace(/[^0-9]/g, '');

                    if (this.value && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }

                    updateOTP();
                });

                input.addEventListener("keydown", function(e) {
                    if (e.key === "Backspace" && !this.value && index > 0) {
                        inputs[index - 1].focus();
                    }
                });

            });

            inputs[0].addEventListener("paste", function(e) {
                let paste = e.clipboardData.getData("text").trim();

                if (/^\d{6}$/.test(paste)) {
                    inputs.forEach((input, i) => {
                        input.value = paste[i];
                    });
                    updateOTP();
                }
            });

            function updateOTP() {
                let otp = "";

                inputs.forEach(input => {
                    otp += input.value;
                });

                otpValue.value = otp;

                // enable only when valid 6 digit OTP
                submitBtn.disabled = !/^\d{6}$/.test(otp);
            }

            form.addEventListener("submit", function(e) {
                let otp = otpValue.value;

                if (!/^\d{6}$/.test(otp)) {
                    e.preventDefault();
                    alert("Please enter all 6 digits of OTP");
                }
            });

            // initialize state on page load
            updateOTP();

        });
    </script>

@endsection
