@extends('auth.auth_layout')

@section('title', 'Register')
@section('heading', 'Create Account')

@section('content')

    <div class="form-wrap">
        <div class="form-heading">
            <h1 class="">Register Your Organization</h1>
            <p class="font-small">Register your organization by filling the details below.</p>
        </div>
        <form class="register-form">
            <div class="row mb-3">
                <div class="col-6 pe-md-2">
                    <div>
                        <label class="form-label">Organization Name</label>
                        <input type="text" class="form-control" placeholder="Enter Organization Name">
                    </div>
                </div>
                <div class="col-6 ps-md-2">
                    <div>
                        <label class="form-label">Work Email</label>
                        <input type="email" class="form-control" placeholder="Enter Email">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="car-select">Are you a:</label>
                <select name="select" id="Select-option" class="form-control">
                    <option value="Select an option">Select an option</option>
                    <option value="Funder">Funder</option>
                    <option value="Fund-Seeker">Fund-Seeker</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="car-select">How did you hear about Fundink?</label>
                <select name="select" id="Select-option" class="form-control">
                    <option value="Select an option">Select an option</option>
                    <option value="Referrals">Referrals</option>
                    <option value="Fundink Website">Fundink Website</option>
                    <option value="Internet">Internet</option>
                    <option value="Networking Event">Networking Event</option>
                    <option value="Fundink Website">Fundink Website</option>
                    <option value="News Article">News Article</option>
                    <option value="Advertising">Advertising</option>
                    <option value="Direct Visit">Direct Visit</option>
                    <option value="LinkedIn">LinkedIn</option>
                    <option value="Other Social Media">Other Social Media</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Create Password</label>
                <input type="password" class="form-control" placeholder="Enter Password">
            </div>

            <div class="mb-3">
                <label class="form-label">Re-enter Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="btn-wrap">
                <button type="submit" class="btn btn-primary w-100 rounded-pill border-">Register</button>
            </div>
            <div class="text-center mt-3">
                Already have an account? <a href="#">Log in</a>
            </div>
        </form>
    </div>



@endsection
