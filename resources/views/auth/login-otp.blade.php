@extends('auth.auth_layout')

@section('title', 'Login with OTP')
@section('heading', 'OTP Verification')

@section('content')

    <div class="form-heading mb-5 pb-lg-4">
        <h1>Verify your Email</h1>
        <p class="font-small">
            We’ve sent a 6-digit verification code to your registered email address. Please enter the code below to securely log in to your Fundink account.

        </p>
    </div>

    <form id="otpForm" method="POST" action="{{ route('login.otp.verify') }}"
        class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">

        @csrf

        <div class="fields-wrap">

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

            <div class="col-12 btn-wrap mt-4 mt-md-5 pt-xl-4">
                <button type="submit" class="btn btn-primary w-100">
                    Verify & Login
                </button>
            </div>

            <div class="col-12 login-text text-center mt-3 mt-md-5 pt-xl-3">
                <p>
                    Back to
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>

        </div>

    </form>


    <script>

        document.addEventListener("DOMContentLoaded", function () {

            const inputs = document.querySelectorAll(".otp-input");
            const otpValue = document.getElementById("otpValue");

            inputs.forEach((input, index) => {

                input.addEventListener("input", function () {

                    this.value = this.value.replace(/[^0-9]/g, '');

                    if (this.value && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }

                    updateOTP();
                });

                input.addEventListener("keydown", function (e) {

                    if (e.key === "Backspace" && !this.value && index > 0) {
                        inputs[index - 1].focus();
                    }

                });

            });

            inputs[0].addEventListener("paste", function (e) {

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

            }

        });

    </script>

@endsection