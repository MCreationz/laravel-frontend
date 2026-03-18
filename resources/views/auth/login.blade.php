@extends('auth.auth_layout')

@section('title', 'Login')
@section('heading', 'Login Your Account')

@section('content')

<div class="form-heading mb-4 pb-lg-2">
    <h1>Welcome to Fundink</h1>
    <p class="font-small">Enter email & password to login</p>
</div>

<form method="POST" action="{{ route('login.password') }}" 
      class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">

    @csrf

    <div class="fields-wrap">

        <div class="col-12 mb-md-3 mb-2">
            <label class="form-label">Your Email address</label>

            <input 
                type="email" 
                name="email"
                class="form-control" 
                placeholder="Email address"
                required
            >
        </div>
<div class="col-12 position-relative">
    <label class="form-label">Enter Password</label>

    <input 
        type="password" 
        name="password"
        id="password"
        class="form-control"
        placeholder="Password"
        required
    >

    <button type="button" 
            class="btn show-password btn-outline-secondary position-absolute bottom-0 end-0 translate-middle-y me-2 p-0"
            onclick="togglePassword()">
        <i id="eyeIcon" class="bi bi-eye"></i>
    </button>
</div>



        <p class="forget-pass text-end mt-2 mt-md-4">
            <a href="#">Forget Password</a>
        </p>

    </div>

    <div class="account-wrap">

        <div class="col-12 btn-wrap mt-5">
            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>
        </div>

        <p class="text-center my-2 my-md-3">or</p>

        <div class="col-12 btn-wrap secondary-btn">

            <a href="{{ route('login.otp.email') }}" class="btn btn-secondary w-100">
                Login with OTP
            </a>

        </div>

        <div class="col-12 login-text text-center mt-3 mt-md-5 pt-xl-4">
            <p>
                Don’t have an account?
                <a href="{{ route('register') }}">Register</a>
            </p>
        </div>

    </div>

</form>
<script>
function togglePassword() {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.classList.remove('bi-eye');
        eyeIcon.classList.add('bi-eye-slash');
    } else {
        passwordField.type = "password";
        eyeIcon.classList.remove('bi-eye-slash');
        eyeIcon.classList.add('bi-eye');
    }
}
</script>
@endsection