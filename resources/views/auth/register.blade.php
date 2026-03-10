@extends('auth.auth_layout')

@section('title', 'Register')
@section('heading', 'Create Account')

@section('content')

<form>

    <div class="mb-3">
        <label class="form-label">Full N</label>
        <input type="text" class="form-control" placeholder="Enter your name">
    </div>

    <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" class="form-control" placeholder="Enter your email">
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Enter password">
    </div>

    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" placeholder="Confirm password">
    </div>

    <button type="submit" class="btn btn-primary w-100">
        Register
    </button>

    <div class="text-center mt-3">
        Already have an account? <a href="#">Login</a>
    </div>

</form>

@endsection