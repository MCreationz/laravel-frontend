@extends('layouts.dashboard')

@section('page_title', 'Profile')

@section('header_extra')
    <span class="header-org-chip">
        @if(auth('organization')->check() && auth('organization')->user()->role === 'funder')
            Non - Profit Organisation
        @else
            Startup
        @endif
    </span>
@endsection

@section('content')

<div class="container-fluid">

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Organization Information</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Legal Name</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $profile?->legal_name }}"
                               disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">PAN Number</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $profile?->pan_number }}"
                               disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Brand Name</label>
                        <input type="text"
                               class="form-control"
                               name="brand_name"
                               value="{{ old('brand_name', $profile?->brand_name) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date of Incorporation</label>
                        <input type="text"
                               class="form-control"
                               value="{{ $profile?->date_of_incorporation }}"
                               disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Website</label>
                        <input type="url"
                               class="form-control"
                               name="website_url"
                               value="{{ old('website_url', $profile?->website_url) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">LinkedIn</label>
                        <input type="url"
                               class="form-control"
                               name="linkedin_url"
                               value="{{ old('linkedin_url', $profile?->linkedin_url) }}">
                    </div>

                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Contact Information</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">Contact Person</label>
                        <input type="text"
                               class="form-control"
                               name="contact_name"
                               value="{{ old('contact_name', $profile?->contact_name) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Designation</label>
                        <input type="text"
                               class="form-control"
                               name="designation"
                               value="{{ old('designation', $profile?->designation) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Mobile Number</label>
                        <input type="text"
                               class="form-control"
                               name="mobile_no"
                               value="{{ old('mobile_no', $profile?->mobile_no) }}">
                    </div>

                </div>
            </div>
        </div>

     <div style="border-radius:8px;" class="card p-3 p-md-4 border-0 mb-4">
    <div class="mb-4">
        <h5 class="mb-0">Head Office Address</h5>
    </div>

    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">Address Line 1</label>
            <input type="text"
                   name="office_address_line_1"
                   class="form-control"
                   value="{{ old('office_address_line_1', $address?->office_address_line_1) }}">
        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">Address Line 2</label>
            <input type="text"
                   name="office_address_line_2"
                   class="form-control"
                   value="{{ old('office_address_line_2', $address?->office_address_line_2) }}">
        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">City</label>
            <input type="text"
                   name="office_city"
                   class="form-control"
                   value="{{ old('office_city', $address?->office_city) }}">
        </div>

        <hr class="mb-0">

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">Pin Code</label>
            <input type="text"
                   name="office_pin_code"
                   class="form-control"
                   value="{{ old('office_pin_code', $address?->office_pin_code) }}">
        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2 position-relative">

            <label class="form-label">State</label>

            <input type="text"
                   name="office_state"
                   id="office_state"
                   class="form-control"
                   autocomplete="off"
                   value="{{ old('office_state', $address?->office_state) }}">

            <div id="office_state_suggestions"
                 class="list-group position-absolute w-100 shadow bg-white"
                 style="z-index:1000; max-height:200px; overflow-y:auto;">
            </div>

        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2">

            <label class="form-label">District</label>

            <select name="office_district"
                    id="office_district"
                    class="form-control">
                <option value="">Select District</option>
            </select>

        </div>

    </div>
</div>

<div style="border-radius:8px;" class="card p-3 p-md-4 border-0 mb-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Registered Office Address</h5>

        <div class="form-check only-checkbox">
            <input class="form-check-input"
                   type="checkbox"
                   name="is_portal_same_as_office"
                   id="sameAsOffice"
                   value="1"
                   {{ old('is_portal_same_as_office', $address?->is_portal_same_as_office) ? 'checked' : '' }}>

            <label class="form-check-label" for="sameAsOffice">
                Same as Head Office Address
            </label>
        </div>
    </div>

    <div id="portal-address-fields" class="row flex-wrap row-gap-4">

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">Address Line 1</label>
            <input type="text"
                   name="portal_address_line_1"
                   class="form-control"
                   value="{{ old('portal_address_line_1', $address?->portal_address_line_1) }}">
        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">Address Line 2</label>
            <input type="text"
                   name="portal_address_line_2"
                   class="form-control"
                   value="{{ old('portal_address_line_2', $address?->portal_address_line_2) }}">
        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">City</label>
            <input type="text"
                   name="portal_city"
                   class="form-control"
                   value="{{ old('portal_city', $address?->portal_city) }}">
        </div>

        <hr class="mb-0">

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">Pin Code</label>
            <input type="text"
                   name="portal_pin_code"
                   class="form-control"
                   value="{{ old('portal_pin_code', $address?->portal_pin_code) }}">
        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2 position-relative">

            <label class="form-label">State</label>

            <input type="text"
                   name="portal_state"
                   id="portal_state"
                   class="form-control"
                   autocomplete="off"
                   value="{{ old('portal_state', $address?->portal_state) }}">

            <div id="portal_state_suggestions"
                 class="list-group position-absolute w-100 shadow bg-white"
                 style="z-index:1000; max-height:200px; overflow-y:auto;">
            </div>

        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2">

            <label class="form-label">District</label>

            <select name="portal_district"
                    id="portal_district"
                    class="form-control">
                <option value="">Select District</option>
            </select>

        </div>

    </div>
</div>

        {{-- <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Operational Details</h5>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Domain of Expertise</label>
                        <textarea class="form-control"
                                  rows="3"
                                  name="domain_of_expertise">{{ old('domain_of_expertise', $operationalDetail?->domain_of_expertise) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Key Achievements</label>
                        <textarea class="form-control"
                                  rows="3"
                                  name="key_achievements">{{ old('key_achievements', $operationalDetail?->key_achievements) }}</textarea>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Total Beneficiaries</label>
                        <input type="number"
                               class="form-control"
                               name="total_beneficiaries"
                               value="{{ old('total_beneficiaries', $operationalDetail?->total_beneficiaries) }}">
                    </div>

                </div>
            </div>
        </div> --}}

        <div class="text-end">
            <button type="submit" class="btn btn-primary px-4">
                Save Changes
            </button>
        </div>

    </form>

</div>
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

        });
    </script>
@endsection