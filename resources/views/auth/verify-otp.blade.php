@extends('auth.auth_layout')

@section('title', 'Verify OTP')
@section('heading', 'OTP Verification')

@section('content')

    <div class="form-wrap">
        <div class="form-heading mb-5 pb-lg-4">
            <h1 class="">Check your Email</h1>
            <p class="font-small">We’ve sent a 6-digit verification code to your registered email address. Please enter the
                code below to securely log in to your Fundink account.</p>
        </div>
        <form class="otp-fields">
            <div class="col-12 mb-md-3 mb-2">
                <form id="otpForm" method="POST" action="/verify-otp">
                    @csrf

                    <div class="otp-container">
                        <input type="text" maxlength="1" class="otp-input">
                        <input type="text" maxlength="1" class="otp-input">
                        <input type="text" maxlength="1" class="otp-input">
                        <input type="text" maxlength="1" class="otp-input">
                        <input type="text" maxlength="1" class="otp-input">
                        <input type="text" maxlength="1" class="otp-input">
                    </div>

                    <input type="hidden" name="otp" id="otpValue">
                </form>
            </div>
            <div class="col-12 otp-text login-text text-center mt-4">
                <p>Didn’t receive the OTP? <a href="#">Resend in 30 sec</a></p>
            </div>
        </form>
    </div>



@endsection

<script>
    const inputs = document.querySelectorAll(".otp-input");
const otpValue = document.getElementById("otpValue");
console.log("amrita");

inputs.forEach((input, index) => {

    input.addEventListener("input", () => {

        if (input.value.length === 1 && index < inputs.length - 1) {
            inputs[index + 1].focus();
        }

        checkOTP();

    });

    input.addEventListener("keydown", (e) => {

        if (e.key === "Backspace" && !input.value && index > 0) {
            inputs[index - 1].focus();
        }

    });

});

function checkOTP() {

    let otp = "";

    inputs.forEach(input => {
        otp += input.value;
    });

    if (otp.length === 6) {

        otpValue.value = otp;

        document.getElementById("otpForm").submit();

    }

}
</script>