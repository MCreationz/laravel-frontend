@extends('auth.auth_layout')

@section('title', 'Verify OTP')
@section('heading', 'OTP Verification')

@section('content')

    <div class="form-heading mb-5 pb-lg-4">
        <div class="with-back d-flex justify-content-between align-items-center mb-4" >
        <div class="gradient-icon ">
            <img src="{{ asset('img/direction.png') }}" alt="direction icon" width="25.228912353515625"
                height="18.28917694091797" fetchpriority="high">
        </div>
        <a href="/register" class="back-btn">Go Back</a>
        </div>
        <h1 class="">Verify your Email</h1>
        <p class="font-small">We've sent a 6-digit verification code to your email ID. Please enter the verification code to login.</p>
    </div>

    <form id="otpForm" method="POST" action="{{ route('verify.otp.submit') }}"
        class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">

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

            <div>
            @csrf
            @if (session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                   <div><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
  <g clip-path="url(#clip0_4317_1218)">
    <path d="M6.375 5.5C6.375 5.40054 6.33549 5.30516 6.26516 5.23484C6.19484 5.16451 6.09946 5.125 6 5.125C5.90054 5.125 5.80516 5.16451 5.73484 5.23484C5.66451 5.30516 5.625 5.40054 5.625 5.5V8.5C5.625 8.59946 5.66451 8.69484 5.73484 8.76517C5.80516 8.83549 5.90054 8.875 6 8.875C6.09946 8.875 6.19484 8.83549 6.26516 8.76517C6.33549 8.69484 6.375 8.59946 6.375 8.5V5.5Z" fill="#E92A2A"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 0.625C3.0315 0.625 0.625 3.0315 0.625 6C0.625 8.9685 3.0315 11.375 6 11.375C8.9685 11.375 11.375 8.9685 11.375 6C11.375 3.0315 8.9685 0.625 6 0.625ZM1.375 6C1.375 4.77337 1.86228 3.59699 2.72963 2.72963C3.59699 1.86228 4.77337 1.375 6 1.375C7.22663 1.375 8.40301 1.86228 9.27037 2.72963C10.1377 3.59699 10.625 4.77337 10.625 6C10.625 7.22663 10.1377 8.40301 9.27037 9.27037C8.40301 10.1377 7.22663 10.625 6 10.625C4.77337 10.625 3.59699 10.1377 2.72963 9.27037C1.86228 8.40301 1.375 7.22663 1.375 6Z" fill="#E92A2A"/>
    <path d="M6.5 4C6.5 4.13261 6.44732 4.25979 6.35355 4.35355C6.25979 4.44732 6.13261 4.5 6 4.5C5.86739 4.5 5.74021 4.44732 5.64645 4.35355C5.55268 4.25979 5.5 4.13261 5.5 4C5.5 3.86739 5.55268 3.74021 5.64645 3.64645C5.74021 3.55268 5.86739 3.5 6 3.5C6.13261 3.5 6.25979 3.55268 6.35355 3.64645C6.44732 3.74021 6.5 3.86739 6.5 4Z" fill="#E92A2A"/>
  </g>
  <defs>
    <clipPath id="clip0_4317_1218">
      <rect width="12" height="12" fill="white"/>
    </clipPath>
  </defs>
</svg> </div> {{ session('error') }}
                </div>
            @endif
</div>

            <input type="hidden" name="otp" id="otpValue">

            <div class="col-12 otp-text login-text text-center mt-4">
                <p>
                    Didn’t receive the OTP?
                    <a href="#" id="resendOtpBtn">Resend OTP</a>
                </p>
            </div>
        </div>

        <div class="account-wrap">

            <div class="col-12 btn-wrap mt-4 mt-md-5 pt-xl-4">
                <button type="submit" id="verifyBtn" class="btn btn-primary w-100" disabled>
                    Verify
                </button>
            </div>

            <div class="col-12 login-text text-center mt-3 mt-md-5 pt-xl-3">
                <p>Already have an account? <a href="/login">Log in</a></p>
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

                // ✅ Enable only when valid 6-digit OTP
                submitBtn.disabled = !/^\d{6}$/.test(otp);
            }

            form.addEventListener("submit", function(e) {

                let otp = otpValue.value;

                if (!/^\d{6}$/.test(otp)) {
                    e.preventDefault();
                    alert("Please enter all 6 digits of OTP");
                }

            });

            // initialize state
            updateOTP();

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const resendBtn = document.getElementById("resendOtpBtn");

            resendBtn.addEventListener("click", function(e) {

                e.preventDefault();

                fetch("{{ route('resend.otp') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            work_email: "{{ session('email') }}"
                        })
                    })
                    .then(res => res.json())
                    .then(data => {

                        if (data.res === "success") {
                            alert("OTP sent again to your email");
                        } else {
                            alert(data.msg);
                        }

                    });

            });

        });
    </script>

@endsection
