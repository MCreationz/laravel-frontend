{{-- @extends('layouts.dashboard')

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
                            pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" maxlength="10" required
                            style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase();">
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
                            max="{{ date('Y-m-d') }}" required>
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
                        <input type="text" name="name" class="form-control" value="" placeholder="Enter your Name"
                            required>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Designation<span>*</span></label>
                        <input type="text" name="Designation" class="form-control" value=""
                            placeholder="Your Designation" required>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Mobile No<span>*</span></label>
                        <input type="tel" name="mobile_no" class="form-control" value=""
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern="[0-9]{10}" maxlength="10"
                            placeholder="Enter your mobile no." required>
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
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.getElementById("website");

        input.addEventListener("blur", function () {
            let value = this.value.trim();

            if (value !== "" && !/^https?:\/\//i.test(value)) {
                this.value = "https://" + value;
            }
        });
    });
</script>
@endsection --}}


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
            <form id="step1Form" method="POST" action="{{ route('onboarding.step1.store') }}">
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
                                pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" maxlength="10" style="text-transform: uppercase;"
                                oninput="this.value = this.value.toUpperCase();">
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Legal Name<span>*</span></label>
                            <input type="text" name="legal_name" class="form-control"
                                placeholder="Enter legal organization name"
                                value="{{ old('legal_name', optional($profile)->legal_name) }}" required>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Date of Incorporation as per PAN<span>*</span></label>
                            <input type="date" name="date_of_incorporation" class="form-control"
                                value="{{ old('date_of_incorporation', optional($profile)->date_of_incorporation) }}"
                                max="{{ date('Y-m-d') }}" required>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Brand/Operating Name (if different)</label>
                            <input type="text" name="brand_name" class="form-control"
                                placeholder="Enter brand or operating name"
                                value="{{ old('brand_name', optional($profile)->brand_name) }}">
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Website</label>
                            <input type="url" name="website_url" class="form-control" placeholder="https://example.com"
                                value="{{ old('website_url', optional($profile)->website_url) }}" id="website" required>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Organization LinkedIn Profile Link</label>
                            <input type="url" name="linkedin_url" class="form-control"
                                placeholder="https://linkedin.com/company/..."
                                value="{{ old('linkedin_url', optional($profile)->linkedin_url) }}">
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Name<span>*</span></label>
                            <input type="text" name="contact_name" class="form-control" placeholder="Enter your Name"
                                value="{{ old('contact_name', optional($profile)->contact_name) }}" required>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Designation<span>*</span></label>
                            <input type="text" name="designation" class="form-control" placeholder="Your Designation"
                                value="{{ old('designation', optional($profile)->designation) }}" required>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Mobile No<span>*</span></label>
                            <input type="tel" name="mobile_no" class="form-control"
                                value="{{ old('mobile_no', optional($profile)->mobile_no) }}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern="[0-9]{10}" maxlength="10"
                                placeholder="Enter your mobile no." required>
                            <div class="error-message text-danger" style="display:none;"></div>
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
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById('step1Form');
            const inputs = form.querySelectorAll('input[required], input[pattern]');

            // Live error check on input
            inputs.forEach(input => {
                const errorDiv = input.nextElementSibling;
                input.addEventListener('input', () => {
                    validateInput(input, errorDiv);
                });
                input.addEventListener('blur', () => {
                    validateInput(input, errorDiv);
                });
            });

            // Form submit check
            form.addEventListener('submit', function (e) {
                let valid = true;
                inputs.forEach(input => {
                    const errorDiv = input.nextElementSibling;
                    if (!validateInput(input, errorDiv)) {
                        valid = false;
                    }
                });
                if (!valid) {
                    e.preventDefault();
                }
            });

            function validateInput(input, errorDiv) {
                let valid = true;
                let msg = '';
                if (input.hasAttribute('required') && !input.value.trim()) {
                    valid = false;
                    msg = 'This field is required';
                } else if (input.hasAttribute('pattern')) {
                    const pattern = new RegExp(input.getAttribute('pattern'));
                    if (!pattern.test(input.value)) {
                        valid = false;
                        msg = 'Invalid format';
                    }
                } else if (input.type === 'url' && input.value) {
                    try {
                        new URL(input.value);
                    } catch (e) {
                        valid = false;
                        msg = 'Enter a valid URL';
                    }
                } else if (input.type === 'date' && input.value) {
                    const max = input.getAttribute('max');
                    if (max && input.value > max) {
                        valid = false;
                        msg = 'Date cannot be in the future';
                    }
                }
                if (!valid) {
                    errorDiv.style.display = 'block';
                    errorDiv.textContent = msg;
                } else {
                    errorDiv.style.display = 'none';
                    errorDiv.textContent = '';
                }
                return valid;
            }

            // Auto prefix https:// for website field
            const websiteInput = document.getElementById("website");
            websiteInput.addEventListener("blur", function () {
                let value = this.value.trim();
                if (value !== "" && !/^https?:\/\//i.test(value)) {
                    this.value = "https://" + value;
                }
            });
        });
    </script>
@endsection