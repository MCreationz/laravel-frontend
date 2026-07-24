@extends('layouts.dashboard')

@section('content')
<div class="step-section position-relative mb-3">
    <div class="bg-image position-absolute top-0 start-0 w-100 h-100">
        <img src="{{ asset('img/dasboard-bg.png') }}" class="img-fluid" alt="steps section" width="100%" height="100%">
    </div>
    <div
        class="step-wrapper d-flex flex-wrap justify-content-center justify-content-sm-between align-items-center py-3 py-md-4 py-xl-5 px-2 row-gap-2">
        <div class="col-6 col-sm-4 step bold active position-relative done">
            <div class="step-inner">
                <div class="step-circle active d-flex justify-content-center align-items-center done">
                    <img src="{{ asset('img/checkmark.png') }}" class="object-fit-contain" alt="steps section"
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
        <div class="col-6 col-sm-4 step bold active">
            <div class="step-inner">
                <div class="step-circle active d-flex justify-content-center align-items-center active">
                    <img src="{{ asset('img/direction.png') }}" class="object-fit-contain" alt="steps section"
                        width="15px" height="11px">
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
<div class="card-body p-0">
    <form class="step2Form" method="POST" action="{{ route('onboarding.step2.store') }}">
        @csrf
        <div style="border-radius:8px;" class="card p-3 p-md-4 border-0 mb-3">
            <div class="mb-4">
                <h1 class="top-heading mb-0">Head Office Address</h1>
            </div>
            <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                {{-- <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Town<span>*</span></label>
                        <input type="text" name="office_town" class="form-control" placeholder="Enter town" required
                            value="{{ old('office_town', $address?->office_town) }}">
            </div> --}}

            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">Address Line 1<span>*</span></label>
                <input type="text" name="office_address_line_1" class="form-control" placeholder="Enter Address"
                    required value="{{ old('office_address_line_1', $address?->office_address_line_1) }}">
            </div>

            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">Address Line 2</label>
                <input type="text" name="office_address_line_2" class="form-control" placeholder="Enter Address"
                    value="{{ old('office_address_line_2', $address?->office_address_line_2) }}">
            </div>
            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">City<span>*</span></label>
                <input type="text" name="office_city" class="form-control" placeholder="Enter Your City"
                    value="{{ old('office_city', $address?->office_city) }}">
            </div>

            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">Pin Code<span>*</span></label>
                <input type="text" name="office_pin_code" class="form-control" placeholder="110001" required
                    value="{{ old('office_pin_code', $address?->office_pin_code) }}">
            </div>
            <div class="col-12 col-md-6 col-xl-4 px-md-2 position-relative">

                <label class="form-label">State<span>*</span></label>

                <input type="text" name="office_state" id="office_state" class="form-control"
                    placeholder="Enter State" autocomplete="off"
                    value="{{ old('office_state', $address?->office_state) }}">

                <div id="office_state_suggestions" class="list-group position-absolute w-100 shadow bg-white"
                    style="z-index:1000; max-height:200px; overflow-y:auto;">
                </div>

            </div>

            <div class="col-12 col-md-6 col-xl-4 px-md-2">

                <label class="form-label">District<span>*</span></label>

                <select name="office_district" id="office_district" class="form-control">
                    <option value="">Select District</option>
                </select>

            </div>


        </div>
</div>

<div style="border-radius:8px 8px 0px 0px;" class="card p-3 p-md-4 border-0">
    <div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="col top-heading mb-0">Registered Office Address</h2>
            <div class="col-auto form-check only-checkbox">
                <input class="form-check-input" type="checkbox" name="is_portal_same_as_office"
                    id="sameAsOffice" value="1" {{ old('is_portal_same_as_office', $address?->is_portal_same_as_office) ? 'checked' : '' }}>
                <label class="form-check-label" for="sameAsOffice">
                    Same as Head Office Address
                </label>
            </div>
        </div>

        <div id="portal-address-fields" class="row flex-wrap row-gap-4">



            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">Address Line 1<span>*</span></label>
                <input type="text" name="portal_address_line_1" class="form-control" placeholder="Enter Address"
                    value="{{ old('portal_address_line_1', $address?->portal_address_line_1) }}">
            </div>

            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">Address Line 2</label>
                <input type="text" name="portal_address_line_2" class="form-control" placeholder="Enter Address"
                    value="{{ old('portal_address_line_2', $address?->portal_address_line_2) }}">
            </div>
            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">City<span>*</span></label>
                <input type="text" name="portal_city" class="form-control" placeholder="Enter Your City"
                    value="{{ old('portal_city', $address?->portal_city) }}">
            </div>




            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">Pin Code<span>*</span></label>
                <input type="text" name="portal_pin_code" class="form-control" placeholder="110001"
                    value="{{ old('portal_pin_code', $address?->portal_pin_code) }}">
            </div>

            <div class="col-12 col-md-6 col-xl-4 px-md-2 position-relative">

                <label class="form-label">State<span>*</span></label>

                <input type="text" name="portal_state" id="portal_state" class="form-control"
                    placeholder="Enter State" autocomplete="off"
                    value="{{ old('portal_state', $address?->portal_state) }}">

                <div id="portal_state_suggestions" class="list-group position-absolute w-100 shadow bg-white"
                    style="z-index:1000; max-height:200px; overflow-y:auto;">
                </div>

            </div>

            <div class="col-12 col-md-6 col-xl-4 px-md-2">

                <label class="form-label">District<span>*</span></label>

                <select name="portal_district" id="portal_district" class="form-control">
                    <option value="">Select District</option>
                </select>

            </div>
        </div>
    </div>
</div>
<div style="border-radius:0px 0px 8px 8px;"
    class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 steps-btn pe-lg-4 flex-wrap">
    <div class="btn-wrap">
        <button type="button" class="btn simple-btn"
            onclick="window.location.href='{{ route('onboarding.step1') }}'">
            <img src="/img/back.png" class="me-2" width="15" height="6.25">
            Back
        </button>
    </div>
    <div class="btn-wrap">
        <button type="submit" class="btn gradient-btn">Next <svg xmlns="http://www.w3.org/2000/svg" width="17"
                height="8" viewBox="0 0 17 8" fill="none">
                <path d="M12.625 7L15.75 3.875L12.625 0.75M15.75 3.875H0.75" stroke="white" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg></button>
    </div>
</div>

</form>
</div>

<script>
    document.getElementById('sameAsOffice').addEventListener('change', function() {

        const fields = [
            ['office_house_floor_no', 'portal_house_floor_no'],
            ['office_address_line_1', 'portal_address_line_1'],
            ['office_address_line_2', 'portal_address_line_2'],
            ['office_town', 'portal_town'],
            ['office_city', 'portal_city'],
            ['office_district', 'portal_district'],
            ['office_state', 'portal_state'],
            ['office_pin_code', 'portal_pin_code']
        ];

        if (this.checked) {

            fields.forEach(([office, portal]) => {

                const officeInput = document.querySelector(`[name="${office}"]`);
                const portalInput = document.querySelector(`[name="${portal}"]`);

                if (!officeInput || !portalInput) return;

                // copy value
                portalInput.value = officeInput.value;

                // update custom dropdown UI if exists
                const portalSelect = portalInput.parentElement.querySelector('.custom-select');
                if (portalSelect) {
                    portalSelect.textContent = officeInput.value || 'Select an option';
                }

            });

        }

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', async function() {

        // =========================
        // Fetch JSON
        // =========================

        const response = await fetch('/states.json');
        const statesData = await response.json();

        // =========================
        // Office Elements
        // =========================

        const officeStateInput =
            document.getElementById('office_state');

        const officeDistrictDropdown =
            document.getElementById('office_district');

        const officeSuggestionsBox =
            document.getElementById('office_state_suggestions');

        // =========================
        // Portal Elements
        // =========================

        const portalStateInput =
            document.getElementById('portal_state');

        const portalDistrictDropdown =
            document.getElementById('portal_district');

        const portalSuggestionsBox =
            document.getElementById('portal_state_suggestions');

        // =====================================================
        // OFFICE STATE AUTOCOMPLETE
        // =====================================================

        officeStateInput.addEventListener('input', function() {

            const value = this.value.toLowerCase();

            officeSuggestionsBox.innerHTML = '';

            officeDistrictDropdown.innerHTML =
                '<option value="">Select District</option>';

            if (!value) return;

            const filteredStates = statesData.filter(item =>
                item.state.toLowerCase().includes(value)
            );

            filteredStates.forEach(item => {

                const button = document.createElement('button');

                button.type = 'button';

                button.className =
                    'list-group-item list-group-item-action';

                button.textContent = item.state;

                button.addEventListener('click', function() {

                    officeStateInput.value = item.state;

                    officeSuggestionsBox.innerHTML = '';

                    populateDistricts(
                        item.state,
                        officeDistrictDropdown
                    );

                });

                officeSuggestionsBox.appendChild(button);

            });

        });

        // =====================================================
        // PORTAL STATE AUTOCOMPLETE
        // =====================================================

        portalStateInput.addEventListener('input', function() {

            const value = this.value.toLowerCase();

            portalSuggestionsBox.innerHTML = '';

            portalDistrictDropdown.innerHTML =
                '<option value="">Select District</option>';

            if (!value) return;

            const filteredStates = statesData.filter(item =>
                item.state.toLowerCase().includes(value)
            );

            filteredStates.forEach(item => {

                const button = document.createElement('button');

                button.type = 'button';

                button.className =
                    'list-group-item list-group-item-action';

                button.textContent = item.state;

                button.addEventListener('click', function() {

                    portalStateInput.value = item.state;

                    portalSuggestionsBox.innerHTML = '';

                    populateDistricts(
                        item.state,
                        portalDistrictDropdown
                    );

                });

                portalSuggestionsBox.appendChild(button);

            });

        });

        // =====================================================
        // POPULATE DISTRICTS
        // =====================================================

        function populateDistricts(
            stateName,
            dropdown,
            selectedDistrict = ''
        ) {

            dropdown.innerHTML =
                '<option value="">Select District</option>';

            const stateData = statesData.find(
                item => item.state === stateName
            );

            if (!stateData) return;

            stateData.districts.forEach(district => {

                const selected =
                    district === selectedDistrict ?
                    'selected' :
                    '';

                dropdown.innerHTML += `
                                <option value="${district}" ${selected}>
                                    ${district}
                                </option>
                            `;

            });

        }

        // =====================================================
        // PAGE LOAD EXISTING VALUES
        // =====================================================

        const officeSavedDistrict =
            `{{ old('office_district', $address?->office_district) }}`;

        const portalSavedDistrict =
            `{{ old('portal_district', $address?->portal_district) }}`;

        if (officeStateInput.value) {

            populateDistricts(
                officeStateInput.value,
                officeDistrictDropdown,
                officeSavedDistrict
            );

        }

        if (portalStateInput.value) {

            populateDistricts(
                portalStateInput.value,
                portalDistrictDropdown,
                portalSavedDistrict
            );

        }

        // =====================================================
        // HIDE SUGGESTIONS ON OUTSIDE CLICK
        // =====================================================

        document.addEventListener('click', function(e) {

            if (
                !officeStateInput.contains(e.target) &&
                !officeSuggestionsBox.contains(e.target)
            ) {
                officeSuggestionsBox.innerHTML = '';
            }

            if (
                !portalStateInput.contains(e.target) &&
                !portalSuggestionsBox.contains(e.target)
            ) {
                portalSuggestionsBox.innerHTML = '';
            }

        });

        function normalizeDistrict(state, district) {

            if (state === "Punjab") {

                const districtMap = {
                    "S. A. S Nagar": "Sahibzada Ajit Singh Nagar",
                    "SAS Nagar": "Sahibzada Ajit Singh Nagar",
                    "S.A.S Nagar": "Sahibzada Ajit Singh Nagar",
                    "SBS Nagar": "Shahid Bhagat Singh Nagar",
                    "S. B. S Nagar": "Shahid Bhagat Singh Nagar",
                    "Nawanshahr": "Shahid Bhagat Singh Nagar",
                    "Ropar": "Rupnagar"
                };

                return districtMap[district] || district;
            }

            return district;
        }
        // =====================================================
        // SAME AS OFFICE
        // =====================================================

        document.getElementById('sameAsOffice')
            .addEventListener('change', function() {

                if (this.checked) {

                    // Copy fields
                    document.querySelector('[name="portal_address_line_1"]').value =
                        document.querySelector('[name="office_address_line_1"]').value;

                    document.querySelector('[name="portal_address_line_2"]').value =
                        document.querySelector('[name="office_address_line_2"]').value;

                    document.querySelector('[name="portal_city"]').value =
                        document.querySelector('[name="office_city"]').value;

                    document.querySelector('[name="portal_pin_code"]').value =
                        document.querySelector('[name="office_pin_code"]').value;

                    // Copy state
                    portalStateInput.value =
                        officeStateInput.value;

                    // Populate districts
                    populateDistricts(
                        officeStateInput.value,
                        portalDistrictDropdown,
                        officeDistrictDropdown.value
                    );

                }

            });
        $('input[name="office_pin_code"]').on('input', function() {

            let pincode = $(this).val().replace(/\D/g, '');

            if (pincode.length !== 6) {
                return;
            }

            $.getJSON(
                "{{ route('pincode.details', ':pincode') }}".replace(':pincode', pincode),
                function(res) {

                    if (res.status === "success" && res.data && res.data.length > 0) {

                        let office = res.data[0];

                        // Fill state
                        officeStateInput.value = office.statename;

                        // Hide suggestions if open
                        officeSuggestionsBox.innerHTML = '';

                        const district = normalizeDistrict(
                            office.statename,
                            office.district
                        );


                        // Populate districts and select the one from API
                        populateDistricts(
                            office.statename,
                            officeDistrictDropdown,
                            district
                        );

                    } else {
                        $('#office_state').val('');
                        $('#office_district').html('<option value="">Select District</option>');
                    }
                }
            );
        });


        let lastPortalPincode = '';

        $('input[name="portal_pin_code"]').on('input', function() {

            let pincode = $(this).val().replace(/\D/g, '');

            if (pincode.length !== 6 || pincode === lastPortalPincode) {
                return;
            }

            lastPortalPincode = pincode;

            $.getJSON(
                "{{ route('pincode.details', ':pincode') }}".replace(':pincode', pincode),
                function(res) {

                    if (res.status === "success" && res.data.length) {

                        let office = res.data[0];

                        // Fill state
                        portalStateInput.value = office.statename;

                        // Hide suggestions
                        portalSuggestionsBox.innerHTML = '';
                        const district = normalizeDistrict(
                            office.statename,
                            office.district
                        );

                        console.log(district);

                        // Populate districts and select the returned district
                        populateDistricts(
                            office.statename,
                            portalDistrictDropdown,
                            district
                        );

                    } else {

                        portalStateInput.value = '';

                        portalDistrictDropdown.innerHTML =
                            '<option value="">Select District</option>';
                    }
                }
            );



        });
    });
</script>


@endsection