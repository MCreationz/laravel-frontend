@extends('auth.auth_layout')

@section('title', 'Register')
@section('heading', 'Create Account')

@section('content')

    <div class="form-heading mb-4 pb-lg-2">
        <h1 class="">Register Your Organization</h1>
        <p class="font-small">Register your organization by filling the details below.</p>
    </div>
    <form class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">
        <div class="fields-wrap">
            <div class="col-12">
                <div class="row mb-md-3 mb-2">
                    <div class="col-6 pe-md-2 pe-1">
                        <div>
                            <label class="form-label">Organization Name</label>
                            <input type="text" class="form-control" placeholder="Enter Organization Name">
                        </div>
                    </div>
                    <div class="col-6 ps-md-2 ps-1">
                        <div>
                            <label class="form-label">Work Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email">
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-12 mb-md-3 mb-2">
                <label for="car-select" class="form-label">Are you a:</label>
                <div class="select-wrapper w-100 position-relative">
                    <select name="select" id="Select-option" class="form-control">
                        <option value="Select an option">Select an option</option>
                        <option value="Funder">Funder</option>
                        <option value="Fund-Seeker">Fund-Seeker</option>
                    </select>
                </div>
            </div>
            <div class="col-12 mb-md-3 mb-2">
                <label for="car-select" class="form-label">How did you hear about Fundink?</label>
                <div class="select-wrapper w-100 position-relative">
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
            </div>
            <div class="col-12 mb-md-3 mb-2">
                <label class="form-label">Create Password</label>
                <input type="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="col-12 mb-md-3 mb-2">
                <label class="form-label">Re-enter Password</label>
                <input type="password" class="form-control" placeholder="Confirm Password">
            </div>
        </div>
        <div class="account-wrap">
            <div class="col-12 btn-wrap mt-4 mt-md-5 pt-xl-4">
                <button type="submit" class="btn btn-primary w-100 rounded-pill border-">Register</button>
            </div>
            <div class="col-12 login-text text-center mt-3 mt-md-5 pt-xl-3">
                <p>Already have an account? <a href="#">Log in</a></p>
            </div>
        </div>

    </form>



@endsection
