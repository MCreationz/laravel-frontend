@extends('layouts.dashboard')

@section('content')
    <div class="step-section position-relative mb-3">
        <div class="bg-image position-absolute top-0 start-0 w-100 h-100">
            <img src="{{ asset('img/dasboard-bg.png') }}" class="img-fluid" alt="steps section" width="100%" height="100%">
        </div>
        <div
            class="step-wrapper d-flex flex-wrap justify-content-center justify-content-sm-between align-items-center py-3 py-md-4 py-xl-5 px-2 row-gap-2">
            <div class="col-6 col-sm-4 step bold active position-relative">
                <div class="step-inner">
                    <div class="step-circle active d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/direction.png') }}" class="object-fit-contain" alt="steps section"
                            width="15px" height="11px">
                    </div>
                    <p>1. Basic Details</p>
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
                    <div class="step-circle d-flex justify-content-center align-items-center">
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
                <p>3. Organization Details</p>
            </div>

        </div>
    </div>


    <div class="">


        

        <div class="card-body p-0">
            <form id="step1Form" method="POST" action="{{ route('onboarding.step1.store') }}">
                @csrf
                <div style="border-radius:8px 8px 0px 0px;" class="card p-3 p-md-4 border-0">
                    <div class="mb-4">
                        <h1 class="top-heading mb-0">Organization Details</h1>
                    </div>
                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Organization PAN<span>*</span></label>
                            <input type="text" id="pan_number" name="pan_number" class="form-control pan-card"
                                placeholder="Enter PAN number"
                                value="{{ old('pan_number', optional($profile)->pan_number) }}"
                                pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" maxlength="10" style="text-transform: uppercase;"
                                oninput="this.value = this.value.toUpperCase();">
                            {{-- <div id="pan-loader" class="position-absolute top-50 end-0 translate-middle-y me-3 d-none">
                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div> --}}
                            <div class="error-message text-danger" style="display:none;"></div>

                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Legal Name<span>*</span></label>
                            <input type="text" name="legal_name" class="form-control" placeholder="Enter legal name"
                                id="legal_name" value="{{ old('legal_name', optional($profile)->legal_name) }}" required readonly>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        {{-- <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Date of Incorporation as per PAN<span>*</span></label>
                            <div class="date-input-wrap has-value">
                                <input type="date" name="date_of_incorporation" id="date_of_incorporation"
                                    class="form-control date-input-field"
                                    value="{{ old('date_of_incorporation', optional($profile)->date_of_incorporation) }}"
                                    max="{{ date('Y-m-d') }}" required id="date_of_incorporation" placeholder="dd/mm/yyyy">
                                <span class="date-input-placeholder" aria-hidden="true">dd/mm/yyyy</span>
                                <button type="button" class="date-input-icon-btn" tabindex="-1" aria-label="Open calendar">
                                    <svg class="date-input-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <g opacity="0.6">
                                            <path d="M8 2V5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16 2V5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path opacity="0.4" d="M3.5 9.09009H20.5" stroke="#292D32" stroke-width="1.5"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path opacity="0.4" d="M11.9945 13.7H12.0035" stroke="#292D32"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path opacity="0.4" d="M8.29138 13.7H8.30036" stroke="#292D32"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path opacity="0.4" d="M8.29688 16.7H8.30586" stroke="#292D32"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div> --}}




                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
    <label class="form-label">Date of Incorporation as per PAN<span>*</span></label>

    <input
        type="date"
        name="date_of_incorporation"
        id="date_of_incorporation"
        class="form-control"
        value="{{ old('date_of_incorporation', optional($profile)->date_of_incorporation ? \Carbon\Carbon::parse($profile->date_of_incorporation)->format('Y-m-d') : '') }}"
        max="{{ date('Y-m-d') }}"
        readonly>

    <div class="error-message text-danger" style="display:none;"></div>
</div>
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Brand/Operating Name</label>
                            <input type="text" name="brand_name" class="form-control" placeholder="Enter your brand name"
                                value="{{ old('brand_name', optional($profile)->brand_name) }}">
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Website</label>
                            <input type="url" name="website_url" class="form-control" placeholder="https:// "
                                value="{{ old('website_url', optional($profile)->website_url) }}" id="website" required>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Organization LinkedIn Profile Link</label>
                            <input type="url" name="linkedin_url" class="form-control"
                                placeholder="Enter LinkedIn profile link"
                                value="{{ old('linkedin_url', optional($profile)->linkedin_url) }}">
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Name of PoC<span>*</span></label>
                            <input type="text" name="contact_name" class="form-control"
                                placeholder="Enter Point of Contact name"
                                value="{{ old('contact_name', optional($profile)->contact_name) }}" required>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Designation<span>*</span></label>
                            <input type="text" name="designation" class="form-control" placeholder="Enter PoC designation"
                                value="{{ old('designation', optional($profile)->designation) }}" required>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Mobile No<span>*</span></label>
                            <input type="tel" name="mobile_no" class="form-control"
                                value="{{ old('mobile_no', optional($profile)->mobile_no) }}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern="[0-9]{10}" maxlength="10"
                                placeholder="9876543210" required>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>
                    </div>
                </div>

                <div style="border-radius:0px 0px 8px 8px;"
                    class="d-flex mt-4 justify-content-center justify-content-md-end gap-2 gap-md-3 steps-btn mt-4  flex-wrap">
                    <div class="btn-wrap">
                        <button type="submit" class="btn gradient-btn">Next <svg xmlns="http://www.w3.org/2000/svg"
                                width="17" height="8" viewBox="0 0 17 8" fill="none">
                                <path d="M12.625 7L15.75 3.875L12.625 0.75M15.75 3.875H0.75" stroke="white"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg></button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById('step1Form');
            const inputs = form.querySelectorAll('input[required], input[pattern]');

            const dateWrap = form.querySelector('.date-input-wrap');
            const dateInput = document.getElementById('date_of_incorporation');
            const dateIconBtn = dateWrap?.querySelector('.date-input-icon-btn');

            function updateDatePlaceholder() {
                if (!dateWrap || !dateInput) return;

                if (document.activeElement === dateInput || dateInput.value) {   // ✅ also checks value
                    dateWrap.classList.add('has-value');
                } else {
                    dateWrap.classList.remove('has-value');
                }
            }

            if (dateInput && dateWrap) {
                updateDatePlaceholder();

                dateInput.addEventListener('focus', updateDatePlaceholder);
                dateInput.addEventListener('blur', updateDatePlaceholder);

                dateInput.addEventListener('change', function () {
                    updateDatePlaceholder();
                });

                dateIconBtn?.addEventListener('click', function () {
                    if (typeof dateInput.showPicker === 'function') {
                        dateInput.showPicker();
                    } else {
                        dateInput.focus();
                    }
                });
            }

            // Live error check on input
            inputs.forEach(input => {
                const errorDiv = input.closest('.col-12, .col-md-6, .col-xl-4')
                    ?.querySelector('.error-message');
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
                    const errorDiv = input.closest('.col-12, .col-md-6, .col-xl-4')
                        ?.querySelector('.error-message');
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
                    let url = input.value.trim();

                    // Add https:// if protocol is missing
                    if (!/^https?:\/\//i.test(url)) {
                        url = 'https://' + url;
                    }

                    try {
                        const parsed = new URL(url);

                        // Require a valid domain
                        const hostname = parsed.hostname;

                        // Must contain a dot and end with a valid TLD
                        if (
                            !hostname.includes('.') ||
                            hostname.startsWith('.') ||
                            hostname.endsWith('.') ||
                            !/^[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+$/.test(hostname)
                        ) {
                            throw new Error();
                        }

                    } catch (e) {
                        valid = false;
                        msg = 'Enter a valid URL';
                    }
                }
                else if (input.type === 'date' && input.value) {
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


<script>
$(document).ready(function () {

    let panVerified = false;
    let verificationInProgress = false;

    $('#pan_number').on('input', function () {

        const pan = $(this).val().toUpperCase().trim();
        $(this).val(pan);

        // Reset when PAN changes
        panVerified = false;

        $('#legal_name').val('');
        $('#date_of_incorporation').val('');

        if (pan.length !== 10) {
            verificationInProgress = false;
            $('#pan-loader').addClass('d-none');
            return;
        }

        const panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]$/;

        if (!panRegex.test(pan)) {
            verificationInProgress = false;
            return;
        }

        if (verificationInProgress || panVerified) {
            return;
        }

        const confirmed = confirm(
            "Please confirm that this is your organization's PAN and not a personal PAN."
        );

        if (!confirmed) {
            $('#pan_number').focus();
            return;
        }

        verificationInProgress = true;

        $('#pan-loader').removeClass('d-none');
        $('#pan_number').prop('readonly', true);

        $.ajax({
            url: "{{ route('onboarding.verify-pan') }}",
            type: "POST",
            data: {
                pan_number: pan,
                _token: "{{ csrf_token() }}"
            },

            success: function (response) {

                panVerified = true;

                toastr.success(response.message || 'PAN verified successfully.');

                $('#legal_name').val(response.data.organization_name || '');

                if (response.data.incorporation_date) {

                    const parts = response.data.incorporation_date.split('-');

                    if (parts.length === 3) {
                        const formattedDate = `${parts[2]}-${parts[1]}-${parts[0]}`;
                        $('#date_of_incorporation').val(formattedDate);
                    }
                }

            },

            error: function (xhr) {

                panVerified = false;

                $('#legal_name').val('');
                $('#date_of_incorporation').val('');

                let message = 'Unable to verify PAN. Please try again.';

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }

                toastr.error(message);

                $('#pan_number').focus();
            },

            complete: function () {

                verificationInProgress = false;

                $('#pan-loader').addClass('d-none');
                $('#pan_number').prop('readonly', false);
            }
        });

    });

});
</script>

@endsection