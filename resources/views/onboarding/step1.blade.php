@extends('layouts.dashboard')

@section('content')
    <div class="step-section position-relative mb-3">
        <div class="bg-image position-absolute top-0 start-0 w-100 h-100">
            <img src="{{ asset('img/dasboard-bg.png') }}" class="img-fluid" alt="steps section" width="100%" height="100%">
        </div>
        <div
            class="step-wrapper d-flex flex-wrap justify-content-center justify-content-sm-between align-items-center py-3 py-md-4 py-xl-5 px-2 row-gap-2">
            <div class="col-6 col-sm-4 step bold position-relative">
                <div class="step-inner">
                    <div class="step-circle active d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/direction.png') }}" class="object-fit-contain" alt="steps section"
                            width="15px" height="11px">
                    </div>
                    <p>1. Organization Details</p>
                </div>
                <div class="progress-dots position-absolute">
                    <span class="dot one"></span>
                    <span class="dot two"></span>
                    <span class="dot three"></span>
                    <span class="dot four"></span>
                    <span class="dot five"></span>
                    <span class="dot five"></span>
                    <span class="dot six"></span>
                    <span class="dot seven"></span>
                    <span class="dot nine"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
            <div class="col-6 col-sm-4 step bold">
                <div class="step-inner">
                    <div class="step-circle next d-flex justify-content-center align-items-center">
                        <span></span>
                    </div>
                    <p>2. Address</p>
                </div>

                <div class="progress-dots position-absolute">
                    <span class="dot one"></span>
                    <span class="dot two"></span>
                    <span class="dot three"></span>
                    <span class="dot four"></span>
                    <span class="dot five"></span>
                    <span class="dot five"></span>
                    <span class="dot six"></span>
                    <span class="dot seven"></span>
                    <span class="dot nine"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>

            <div class="col-6 col-sm-4 step">
                <div class="step-circle d-flex justify-content-center align-items-center">
                    <span></span>
                </div>
                <p>3. Organization Type</p>
            </div>

        </div>
    </div>


    <div class="">

        <div class="card-body p-0">
            <form method="POST" action="{{ route('onboarding.step1.store') }}">
                @csrf

                <div class="card p-3 p-md-4 border-0 rounded-3">
                    <div class="mb-4">
                        <h1 class="top-heading mb-0">Organization Details</h1>
                    </div>

                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Enter Organization PAN<span>*</span></label>
                            <input type="text" name="pan_number" class="form-control pan-card" placeholder="ABCDE1234F"
                                value="{{ old('pan_number', optional($profile)->pan_number) }}"
                                pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" maxlength="10" required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Legal Name<span>*</span></label>
                            <input type="text" name="legal_name" class="form-control"
                                placeholder="Enter legal organization name"
                                value="{{ old('legal_name', optional($profile)->legal_name) }}" required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Date of Incorporation as per PAN<span>*</span></label>
                            <input type="date" name="date_of_incorporation" class="form-control"
                                value="{{ old('date_of_incorporation', optional($profile)->date_of_incorporation) }}"
                                required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Brand/Operating Name (if different)</label>
                            <input type="text" name="brand_name" class="form-control"
                                placeholder="Enter brand or operating name"
                                value="{{ old('brand_name', optional($profile)->brand_name) }}">
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Website<span>*</span></label>
                            <input type="url" name="website_url" class="form-control" placeholder="https://example.com"
                                value="{{ old('website_url', optional($profile)->website_url) }}" id="website"
                                name="website" required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Organization LinkedIn Profile Link</label>
                            <input type="url" name="linkedin_url" class="form-control"
                                placeholder="https://linkedin.com/company/..."
                                value="{{ old('linkedin_url', optional($profile)->linkedin_url) }}">
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Name<span>*</span></label>
                            <input type="text" name="name" class="form-control" value="" placeholder="Enter your Name" required>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Designation<span>*</span></label>
                            <input type="text" name="Designation" class="form-control" value="" placeholder="Your Designation" required>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Mobile No<span>*</span></label>
                            <input type="tel" name="Designation" class="form-control" value=""  oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern="[0-9]{10}" maxlength="10" placeholder="Enter your mobile no." required>
                        </div>
                    </div>
                </div>

                <div
                    class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 mt-4 steps-btn pe-lg-4 flex-wrap">
                    <div class="btn-wrap">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const input = document.getElementById("website");

            input.addEventListener("blur", function() {
                let value = this.value.trim();

                if (value !== "" && !/^https?:\/\//i.test(value)) {
                    this.value = "https://" + value;
                }
            });
        });
    </script>
@endsection
