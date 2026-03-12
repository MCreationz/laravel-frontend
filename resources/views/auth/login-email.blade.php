@extends('auth.auth_layout')

@section('title','Login with OTP')

@section('content')

<form method="POST" action="{{ route('login.otp.send') }}">
    @csrf

    <label>Email</label>

    <input type="email" name="email" required>

    <button type="submit">Send OTP</button>

</form>

@endsection