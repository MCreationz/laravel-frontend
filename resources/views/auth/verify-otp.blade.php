@extends('auth.auth_layout')

@section('title', 'Verify OTP')
@section('heading', 'OTP Verification')

@section('content')

    <div class="form-heading mb-5 pb-lg-4">
        <h1 class="">Check your Email</h1>
        <p class="font-small">We’ve sent a 6-digit verification code to your registered email address. Please enter the
            code below to securely log in to your Fundink account.</p>
    </div>
    <form id="otpForm" method="POST" action="/verify-otp"
        class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">
        <div class="fields-wrap">
            @csrf
            <div class="otp-container">
                <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" placeholder="-">
            <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" placeholder="-">
            <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" placeholder="-">
            <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" placeholder="-">
            <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" placeholder="-">
            <input type="text" maxlength="1" class="otp-input" inputmode="numeric" pattern="[0-9]*" placeholder="-">
            </div>

            <input type="hidden" name="otp" id="otpValue">
            <div class="col-12 otp-text login-text text-center mt-4">
                <p>Didn’t receive the OTP? <a href="#">Resend in 30 sec</a></p>
            </div>
        </div>
        <div class="account-wrap">
            <div class="col-12 btn-wrap mt-4 mt-md-5 pt-xl-4">
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </div>
            <div class="col-12 login-text text-center mt-3 mt-md-5 pt-xl-3">
                <p>Already have an account? <a href="#">Log in</a></p>
            </div>
        </div>

    </form>

<script>

document.addEventListener("DOMContentLoaded", function () {

    const inputs = document.querySelectorAll(".otp-input");
    const otpValue = document.getElementById("otpValue");
    const form = document.getElementById("otpForm");

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


    inputs[0].addEventListener("paste", function(e) {

        let paste = e.clipboardData.getData("text").trim();

        if(paste.length === 6){

            inputs.forEach((input,i)=>{
                input.value = paste[i];
            });

            updateOTP();
        }

    });


    function updateOTP(){

        let otp = "";

        inputs.forEach(input=>{
            otp += input.value;
        });

        otpValue.value = otp;

        if(otp.length === 6){
            form.submit();
        }

    }

});

</script>
@endsection
