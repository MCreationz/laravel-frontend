@extends('layouts.dashboard')

@section('page_title', 'Profile')

@section('header_extra')
<span class="header-org-chip">
    @if (auth('organization')->check() && auth('organization')->user()->role === 'funder')
    Non - Profit Organisation
    @else
    Startup
    @endif
</span>
@endsection

@section('content')
<form id="onboardingForm" method="POST" action="{{ route('profile.update') }}">
    @csrf

    <div class="card p-3 p-md-4 border-0 mb-3">
        <h1 class="top-heading mb-4">Organization Information</h1>
        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Legal Name</label>
                <input type="text" class="form-control" value="{{ $profile?->legal_name }}" disabled>
            </div>

            <div class="col-md-6">
                <label class="form-label">PAN Number</label>
                <input type="text" class="form-control" value="{{ $profile?->pan_number }}" disabled>
            </div>

            <div class="col-md-6">
                <label class="form-label">Brand Name</label>
                <input type="text" class="form-control" name="brand_name"
                    value="{{ old('brand_name', $profile?->brand_name) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Date of Incorporation</label>
                <input type="text" class="form-control" value="{{ $profile?->date_of_incorporation }}" disabled>
            </div>

            <div class="col-md-6">
                <label class="form-label">Website</label>
                <input type="url" class="form-control" name="website_url"
                    value="{{ old('website_url', $profile?->website_url) }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">LinkedIn</label>
                <input type="url" class="form-control" name="linkedin_url"
                    value="{{ old('linkedin_url', $profile?->linkedin_url) }}">
            </div>
        </div>
    </div>

    <div class="card p-3 p-md-4 border-0 mb-3">
        <h2 class="top-heading mb-4">Contact Information</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Contact Person</label>
                <input type="text" class="form-control" name="contact_name"
                    value="{{ old('contact_name', $profile?->contact_name) }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Designation</label>
                <input type="text" class="form-control" name="designation"
                    value="{{ old('designation', $profile?->designation) }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Mobile Number</label>
                <input type="text" class="form-control" name="mobile_no"
                    value="{{ old('mobile_no', $profile?->mobile_no) }}">
            </div>
        </div>
    </div>

    <div class="card p-3 p-md-4 border-0 mb-3">
        <h5 class="top-heading mb-4">Head Office Address</h5>
        <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">Address Line 1</label>
                <input type="text" name="office_address_line_1" class="form-control"
                    value="{{ old('office_address_line_1', $address?->office_address_line_1) }}" disabled>
            </div>

            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">Address Line 2</label>
                <input type="text" name="office_address_line_2" class="form-control"
                    value="{{ old('office_address_line_2', $address?->office_address_line_2) }}" disabled>
            </div>

            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">City</label>
                <input type="text" name="office_city" class="form-control"
                    value="{{ old('office_city', $address?->office_city) }}" disabled>
            </div>

            <hr class="mb-0">

            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                <label class="form-label">Pin Code</label>
                <input type="text" name="office_pin_code" class="form-control"
                    value="{{ old('office_pin_code', $address?->office_pin_code) }}" disabled>
            </div>

            <div class="col-12 col-md-6 col-xl-4 px-md-2 position-relative">

                <label class="form-label">State</label>

                <input type="text" name="office_state" id="office_state" class="form-control" autocomplete="off"
                    value="{{ old('office_state', $address?->office_state) }}" disabled>

                <div id="office_state_suggestions" class="list-group position-absolute w-100 shadow bg-white"
                    style="z-index:1000; max-height:200px; overflow-y:auto;">
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4 px-md-2">

                <label class="form-label">District</label>

                <select name="office_district" id="office_district" class="form-control" disabled>
                    <option value="">Select District</option>
                </select>
            </div>
        </div>
    </div>

    <div class="card p-3 p-md-4 border-0 mb-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="top-heading mb-0">Registered Office Address</h2>

            {{-- <div class="form-check only-checkbox">
                    <input class="form-check-input" type="checkbox" name="is_portal_same_as_office" id="sameAsOffice"
                        value="1" {{ old('is_portal_same_as_office', $address?->is_portal_same_as_office) ? 'checked' : ''
                    }} disabled>

            <label class="form-check-label" for="sameAsOffice">
                Same as Head Office Address
            </label>
        </div> --}}
    </div>

    <div id="portal-address-fields" class="row flex-wrap row-gap-4">

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">Address Line 1</label>
            <input type="text" name="portal_address_line_1" class="form-control"
                value="{{ old('portal_address_line_1', $address?->portal_address_line_1) }}" disabled>
        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">Address Line 2</label>
            <input type="text" name="portal_address_line_2" class="form-control"
                value="{{ old('portal_address_line_2', $address?->portal_address_line_2) }}" disabled>
        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">City</label>
            <input type="text" name="portal_city" class="form-control"
                value="{{ old('portal_city', $address?->portal_city) }}" disabled>
        </div>

        <hr class="mb-0">

        <div class="col-12 col-md-6 col-xl-4 px-md-2">
            <label class="form-label">Pin Code</label>
            <input type="text" name="portal_pin_code" class="form-control"
                value="{{ old('portal_pin_code', $address?->portal_pin_code) }}" disabled>
        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2 position-relative">

            <label class="form-label">State</label>

            <input type="text" name="portal_state" id="portal_state" class="form-control" autocomplete="off"
                value="{{ old('portal_state', $address?->portal_state) }}" disabled>

            <div id="portal_state_suggestions" class="list-group position-absolute w-100 shadow bg-white"
                style="z-index:1000; max-height:200px; overflow-y:auto;">
            </div>

        </div>

        <div class="col-12 col-md-6 col-xl-4 px-md-2">

            <label class="form-label">District</label>

            <select name="portal_district" id="portal_district" class="form-control" disabled>
                <option value="">Select District</option>
            </select>

        </div>

    </div>
    </div>



    <div class="card-body p-0">

        <form id="onboardingForm" method="POST" action="{{ route('onboarding.step3.store') }}"> @csrf
            <div style="border-radius:0px;" class="card p-3 p-md-4 border-0 mb-3 rounded-3">
                <div class="mb-4">
                    @php
                    $role = auth('organization')->user()?->role;
                    @endphp

                    <h1 class="top-heading mb-2">
                        {{ $role === 'fund_seeker' ? 'Startup Credentials' : 'NPO Credentials' }}
                    </h1>
                    <p>Tell us about your organisation's legal structure and financial track record</p>
                </div>
                <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    <!-- State -->
                    <!-- Registration Type -->
                    <div class="col-12 col-md-6 {{ $role === 'fund_seeker' ? 'col-xl-6' : 'col-xl-4' }} px-md-2"> <label
                            class="form-label">Organization Legal Type<span>*</span></label>

                        @php
                        $registrationType = old('registration_type', $operationalDetail->registration_type ?? '');

                        if ($role === 'fund_seeker') {
                        $labels = [
                        'private_limited' => 'Private Limited',
                        'llp' => 'LLP',
                        'opc' => 'OPC',
                        ];
                        } else {
                        $labels = [
                        'society' => 'Society',
                        'trust' => 'Trust',
                        'section_8_company' => 'Section 8 Company',
                        ];
                        }
                        @endphp

                        <div class="select-wrapper w-100 position-relative" style="pointer-events: none;">
                            <div class="custom-select form-control bg-light">
                                {{ $registrationType ? $labels[$registrationType] ?? 'Select' : 'Select entity type' }}
                            </div>

                            <ul class="select-list">
                                @if ($role === 'fund_seeker')
                                <li data-value="private_limited">Private Limited</li>
                                <li data-value="llp">LLP</li>
                                <li data-value="opc">OPC</li>
                                @else
                                <li data-value="society">Society</li>
                                <li data-value="trust">Trust</li>
                                <li data-value="section_8_company">Section 8 Company</li>
                                @endif
                            </ul>

                            <input type="hidden" name="registration_type" class="hidden-select"
                                value="{{ $registrationType }}">
                        </div>

                        @error('registration_type')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($role !== 'fund_seeker')
                    <!-- Domain of Expertise -->
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Domain of Expertise<span>*</span></label>

                        @php
                        $selectedDomains = old('domain_of_expertise', $operationalDetail->domain_of_expertise ?? '');

                        if (is_string($selectedDomains)) {
                        $selectedDomains = explode(',', $selectedDomains);
                        }

                        $selectedDomains = array_map('trim', $selectedDomains);
                        @endphp
                        <div class="select-wrapper w-100 position-relative checkbox-wrap">

                            <div id="selectedDomainsBox"
                                class="custom-select form-control d-flex flex-wrap gap-2 align-items-center @error('domain_of_expertise') is-invalid @enderror">
                                <span class="placeholder">Select expertise</span>
                            </div>

                            <ul class="select-list checkbox-list" id="domainCheckboxList">

                                <li>
                                    <input type="checkbox" value="School Education (Primary & Secondary)" id="d1" {{ in_array('School Education (Primary & Secondary)', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d1">School Education (Primary & Secondary)</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Higher Education Support" id="d2" {{ in_array('Higher Education Support', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d2">Higher Education Support</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Scholarships & Fellowships" id="d3" {{ in_array('Scholarships & Fellowships', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d3">Scholarships & Fellowships</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Digital Education" id="d4" {{ in_array('Digital Education', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d4">Digital Education</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="STEM Education" id="d5" {{ in_array('STEM Education', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d5">STEM Education</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Special Education (Children with Disabilities)"
                                        id="d6" {{ in_array('Special Education (Children with Disabilities)', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d6">Special Education (Children with Disabilities)</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Vocational Training & Skill Development" id="d7" {{ in_array('Vocational Training & Skill Development', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d7">Vocational Training & Skill Development</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Employability & Livelihood Programs" id="d8" {{ in_array('Employability & Livelihood Programs', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d8">Employability & Livelihood Programs</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Primary Healthcare" id="d9" {{ in_array('Primary Healthcare', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d9">Primary Healthcare</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Maternal & Child Health" id="d10" {{ in_array('Maternal & Child Health', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d10">Maternal & Child Health</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Nutrition & Malnutrition" id="d11" {{ in_array('Nutrition & Malnutrition', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d11">Nutrition & Malnutrition</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Mental Health" id="d12" {{ in_array('Mental Health', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d12">Mental Health</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Disability Rehabilitation" id="d13" {{ in_array('Disability Rehabilitation', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d13">Disability Rehabilitation</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Public Health & Sanitation" id="d14" {{ in_array('Public Health & Sanitation', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d14">Public Health & Sanitation</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Preventive Healthcare & Awareness" id="d15" {{ in_array('Preventive Healthcare & Awareness', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d15">Preventive Healthcare & Awareness</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="HIV/AIDS & Communicable Diseases" id="d16" {{ in_array('HIV/AIDS & Communicable Diseases', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d16">HIV/AIDS & Communicable Diseases</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Women Empowerment" id="d17" {{ in_array('Women Empowerment', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d17">Women Empowerment</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Gender Equality" id="d18" {{ in_array('Gender Equality', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d18">Gender Equality</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Prevention of Domestic Violence" id="d19" {{ in_array('Prevention of Domestic Violence', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d19">Prevention of Domestic Violence</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Girl Child Development" id="d20" {{ in_array('Girl Child Development', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d20">Girl Child Development</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Child Protection & Child Rights" id="d21" {{ in_array('Child Protection & Child Rights', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d21">Child Protection & Child Rights</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Rural Livelihoods" id="d22" {{ in_array('Rural Livelihoods', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d22">Rural Livelihoods</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Urban Livelihoods" id="d23" {{ in_array('Urban Livelihoods', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d23">Urban Livelihoods</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Self-Help Groups (SHGs)" id="d24" {{ in_array('Self-Help Groups (SHGs)', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d24">Self-Help Groups (SHGs)</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Microfinance & Financial Inclusion" id="d25" {{ in_array('Microfinance & Financial Inclusion', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d25">Microfinance & Financial Inclusion</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Entrepreneurship Development" id="d26" {{ in_array('Entrepreneurship Development', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d26">Entrepreneurship Development</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Environmental Conservation" id="d27" {{ in_array('Environmental Conservation', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d27">Environmental Conservation</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Climate Action" id="d28" {{ in_array('Climate Action', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d28">Climate Action</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Afforestation" id="d29" {{ in_array('Afforestation', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d29">Afforestation</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Water Conservation" id="d30" {{ in_array('Water Conservation', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d30">Water Conservation</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Waste Management" id="d31" {{ in_array('Waste Management', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d31">Waste Management</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Renewable Energy Access" id="d32" {{ in_array('Renewable Energy Access', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d32">Renewable Energy Access</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Biodiversity Protection" id="d33" {{ in_array('Biodiversity Protection', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d33">Biodiversity Protection</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Rural Development Projects" id="d34" {{ in_array('Rural Development Projects', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d34">Rural Development Projects</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Infrastructure Development (Community Assets)"
                                        id="d35" {{ in_array('Infrastructure Development (Community Assets)', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d35">Infrastructure Development (Community Assets)</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Drinking Water Projects" id="d36" {{ in_array('Drinking Water Projects', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d36">Drinking Water Projects</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Sanitation & Hygiene (WASH)" id="d37" {{ in_array('Sanitation & Hygiene (WASH)', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d37">Sanitation & Hygiene (WASH)</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Human Rights" id="d38" {{ in_array('Human Rights', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d38">Human Rights</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Legal Aid & Access to Justice" id="d39" {{ in_array('Legal Aid & Access to Justice', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d39">Legal Aid & Access to Justice</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Governance & Civic Participation" id="d40" {{ in_array('Governance & Civic Participation', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d40">Governance & Civic Participation</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Transparency & Accountability" id="d41" {{ in_array('Transparency & Accountability', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d41">Transparency & Accountability</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Senior Citizens Welfare" id="d42" {{ in_array('Senior Citizens Welfare', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d42">Senior Citizens Welfare</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Persons with Disabilities" id="d43" {{ in_array('Persons with Disabilities', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d43">Persons with Disabilities</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Tribal Development" id="d44" {{ in_array('Tribal Development', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d44">Tribal Development</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Minority Welfare" id="d45" {{ in_array('Minority Welfare', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d45">Minority Welfare</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Migrant Workers Support" id="d46" {{ in_array('Migrant Workers Support', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d46">Migrant Workers Support</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Disaster Relief & Rehabilitation" id="d47" {{ in_array('Disaster Relief & Rehabilitation', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d47">Disaster Relief & Rehabilitation</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Emergency Response & Humanitarian Aid" id="d48" {{ in_array('Emergency Response & Humanitarian Aid', $selectedDomains) ? 'checked' : '' }}>
                                    <label for="d48">Emergency Response & Humanitarian Aid</label>
                                </li>

                            </ul>

                            <input type="hidden" name="domain_of_expertise" id="hiddenDomains"
                                value="{{ implode(',', $selectedDomains) }}" required>

                        </div>

                        @error('domain_of_expertise')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif
                    @php
                    $selectedStates = old('state', $operationalDetail->state ?? '');

                    if (is_string($selectedStates)) {
                    $selectedStates = explode(',', $selectedStates);
                    }

                    $selectedStates = array_map('trim', $selectedStates);
                    @endphp


                    @php
                    $selectedStates = old('state', $operationalDetail->state ?? '');

                    if (is_string($selectedStates)) {
                    $selectedStates = explode(',', $selectedStates);
                    }

                    $selectedStates = array_map('trim', $selectedStates);
                    @endphp

                    <div class="col-12 col-md-6 {{ $role === 'fund_seeker' ? 'col-xl-6' : 'col-xl-4' }} px-md-2">
                        <label class="form-label">
                            Operational States<span>*</span>
                        </label>

                        <div class="select-wrapper w-100 position-relative checkbox-wrap">

                            <div id="selectedStatesBox"
                                class="custom-select form-control d-flex flex-wrap gap-2 align-items-center">
                                <span class="placeholder">Select State</span>
                            </div>

                            <ul class="select-list checkbox-list" id="stateCheckboxList">

                                <li>
                                    <input type="checkbox" value="Pan India" id="s0" {{ in_array('Pan India', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s0">Pan India</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Andhra Pradesh" id="s1" {{ in_array('Andhra Pradesh', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s1">Andhra Pradesh</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Arunachal Pradesh" id="s2" {{ in_array('Arunachal Pradesh', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s2">Arunachal Pradesh</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Assam" id="s3" {{ in_array('Assam', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s3">Assam</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Bihar" id="s4" {{ in_array('Bihar', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s4">Bihar</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Chhattisgarh" id="s5" {{ in_array('Chhattisgarh', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s5">Chhattisgarh</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Goa" id="s6" {{ in_array('Goa', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s6">Goa</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Gujarat" id="s7" {{ in_array('Gujarat', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s7">Gujarat</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Haryana" id="s8" {{ in_array('Haryana', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s8">Haryana</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Himachal Pradesh" id="s9" {{ in_array('Himachal Pradesh', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s9">Himachal Pradesh</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Jharkhand" id="s10" {{ in_array('Jharkhand', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s10">Jharkhand</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Karnataka" id="s11" {{ in_array('Karnataka', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s11">Karnataka</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Kerala" id="s12" {{ in_array('Kerala', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s12">Kerala</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Madhya Pradesh" id="s13" {{ in_array('Madhya Pradesh', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s13">Madhya Pradesh</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Maharashtra" id="s14" {{ in_array('Maharashtra', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s14">Maharashtra</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Manipur" id="s15" {{ in_array('Manipur', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s15">Manipur</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Meghalaya" id="s16" {{ in_array('Meghalaya', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s16">Meghalaya</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Mizoram" id="s17" {{ in_array('Mizoram', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s17">Mizoram</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Nagaland" id="s18" {{ in_array('Nagaland', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s18">Nagaland</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Odisha" id="s19" {{ in_array('Odisha', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s19">Odisha</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Punjab" id="s20" {{ in_array('Punjab', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s20">Punjab</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Rajasthan" id="s21" {{ in_array('Rajasthan', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s21">Rajasthan</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Sikkim" id="s22" {{ in_array('Sikkim', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s22">Sikkim</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Tamil Nadu" id="s23" {{ in_array('Tamil Nadu', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s23">Tamil Nadu</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Telangana" id="s24" {{ in_array('Telangana', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s24">Telangana</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Tripura" id="s25" {{ in_array('Tripura', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s25">Tripura</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Uttar Pradesh" id="s26" {{ in_array('Uttar Pradesh', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s26">Uttar Pradesh</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Uttarakhand" id="s27" {{ in_array('Uttarakhand', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s27">Uttarakhand</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="West Bengal" id="s28" {{ in_array('West Bengal', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s28">West Bengal</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Andaman and Nicobar Islands" id="s29" {{ in_array('Andaman and Nicobar Islands', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s29">Andaman and Nicobar Islands</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Chandigarh" id="s30" {{ in_array('Chandigarh', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s30">Chandigarh</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Dadra and Nagar Haveli and Daman and Diu" id="s31" {{ in_array('Dadra and Nagar Haveli and Daman and Diu', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s31">Dadra and Nagar Haveli and Daman and Diu</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Delhi" id="s32" {{ in_array('Delhi', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s32">Delhi</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Jammu and Kashmir" id="s33" {{ in_array('Jammu and Kashmir', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s33">Jammu and Kashmir</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Ladakh" id="s34" {{ in_array('Ladakh', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s34">Ladakh</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Lakshadweep" id="s35" {{ in_array('Lakshadweep', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s35">Lakshadweep</label>
                                </li>

                                <li>
                                    <input type="checkbox" value="Puducherry" id="s36" {{ in_array('Puducherry', $selectedStates) ? 'checked' : '' }}>
                                    <label for="s36">Puducherry</label>
                                </li>

                            </ul>

                            <input type="hidden" name="state" id="hiddenStates"
                                value="{{ implode(',', $selectedStates) }}" required>
                        </div>

                        @error('state')
                        <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                @php
                $ideaFallsIn = old('idea_falls_in', $operationalDetail->idea_falls_in ?? '');
                $currentStage = old('current_stage', $operationalDetail->current_stage ?? '');
                @endphp


                @if ($role === 'fund_seeker')
                <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">You idea/product fall in<span>*</span></label>

                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control d-flex flex-wrap gap-2 align-items-center">
                                {{ $ideaFallsIn ?: 'Select sector' }}
                            </div>

                            <ul class="select-list">
                                <li data-value="FinTech">FinTech</li>
                                <li data-value="EdTech">EdTech</li>
                                <li data-value="HealthTech">HealthTech</li>
                                <li data-value="AgriTech">AgriTech</li>
                                <li data-value="SaaS">SaaS (Software as a Service)</li>
                                <li data-value="ai">AI & Machine Learning</li>
                                <li data-value="DeepTech">DeepTech</li>
                                <li data-value="Blockchain">Blockchain & Web3</li>
                                <li data-value="Cybersecurity">Cybersecurity</li>
                                <li data-value="CloudDevOps">Cloud & DevOps</li>
                                <li data-value="E-commerce">E-commerce</li>
                                <li data-value="d2c">D2C (Direct-to-Consumer) Brands</li>
                                <li data-value="RetailTech">RetailTech</li>
                                <li data-value="FoodTech">FoodTech</li>
                                <li data-value="Q-Commerce">Q-Commerce</li>
                                <li data-value="Consumer">Consumer Internet</li>
                                <li data-value="FashionTech">FashionTech</li>
                                <li data-value="Beauty">Beauty & Personal Care</li>
                                <li data-value="CleanTech">CleanTech</li>
                                <li data-value="ClimateTech">ClimateTech</li>
                                <li data-value="Renewable">Renewable Energy</li>
                                <li data-value="EV-Mobility">EV & Mobility</li>
                                <li data-value="Logistics">Logistics & Supply Chain</li>
                                <li data-value="ManufacturingTech">ManufacturingTech</li>
                                <li data-value="SpaceTech">SpaceTech</li>
                                <li data-value="DefenceTech">DefenceTech</li>
                                <li data-value="PropTech">PropTech (Real Estate Tech)</li>
                                <li data-value="InsurTech">InsurTech</li>
                                <li data-value="WealthTech">WealthTech</li>
                                <li data-value="RegTech">RegTech</li>
                                <li data-value="HRTech">HRTech</li>
                                <li data-value="LegalTech">LegalTech</li>
                                <li data-value="GovTech">GovTech</li>
                                <li data-value="EnterpriseTech">EnterpriseTech</li>
                                <li data-value="Social-Impact">Social Impact</li>
                                <li data-value="CircularEconomy">Circular Economy</li>
                                <li data-value="Waste-Management">Waste Management</li>
                                <li data-value="WaterTech">WaterTech</li>
                                <li data-value="RuralTech">RuralTech</li>
                                <li data-value="Skill-Development">Skill Development</li>
                                <li data-value="Gaming-Esports">Gaming & Esports</li>
                                <li data-value="Media-ContentTech">Media & ContentTech</li>
                                <li data-value="Creator-Economy">Creator Economy</li>
                                <li data-value="TravelTech">TravelTech</li>
                                <li data-value="SportsTech">SportsTech</li>
                                <li data-value="AR-VR-Metaverse">AR/VR & Metaverse</li>
                                <li data-value="Robotics-Automation">Robotics & Automation</li>
                                <li data-value="Biotechnology">Biotechnology</li>
                            </ul>

                            <input type="hidden" name="idea_falls_in" class="hidden-select" value="{{ $ideaFallsIn }}">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">Current Stage<span>*</span></label>

                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control d-flex flex-wrap gap-2 align-items-center">
                                {{ $currentStage ?: 'Select stage' }}
                            </div>

                            <ul class="select-list">
                                <li data-value="Idea">Idea</li>
                                <li data-value="Early-Revenue">Early Revenue</li>
                                <li data-value="Growth">Growth</li>
                                <li data-value="Scale-up">Scale-up</li>
                            </ul>

                            <input type="hidden" name="current_stage" class="hidden-select" value="{{ $currentStage }}">
                        </div>
                    </div>
                </div>
                @endif



                <div class="inner-fields mt-4" id="section_non_profit">
                    <!-- Toggles -->
                    @php
                    $status12a = old('status_12a', $operationalDetail->status_12a ?? 0);
                    $status80g = old('status_80g', $operationalDetail->status_80g ?? 0);
                    $statusFcra = old('status_fcra', $operationalDetail->status_fcra ?? 0);
                    $csr1 = old('csr_1_registration', $operationalDetail->csr_1_registration ?? 0);
                    @endphp
                </div>


                <div class="inner-fields">
                    <div class="mb-4">
                        <h2 class="inner-title">Applicable Registration & Certification</h2>
                    </div>

                    <div class="row toggle-container mb-3 justify-content-start gap-0 row-gap-3">

                        @if ($role === 'fund_seeker')
                        <div class="col-12 col-sm-6 col-md-auto toggle-item">
                            <div class="toggle-wrap">
                                <span class="font-small">DPIIT Registration</span>
                                <label class="switch mb-0">
                                    <input type="hidden" name="dpiit_registration" value="0">
                                    <input type="checkbox" name="dpiit_registration" value="1" {{ !empty($operationalDetail->dpiit_registration) ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-auto toggle-item">
                            <div class="toggle-wrap">
                                <span class="font-small">MSME Registration</span>
                                <label class="switch mb-0">
                                    <input type="hidden" name="msme_registration" value="0">
                                    <input type="checkbox" name="msme_registration" value="1" {{ !empty($operationalDetail->msme_registration) ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-auto toggle-item">
                            <div class="toggle-wrap">
                                <span class="font-small">GSTIN Registration</span>
                                <label class="switch mb-0">
                                    <input type="hidden" name="gstin_registration" value="0">
                                    <input type="checkbox" name="gstin_registration" value="1" {{ !empty($operationalDetail->gstin_registration) ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-auto toggle-item">
                            <div class="toggle-wrap">
                                <span class="font-small">Patent Available</span>
                                <label class="switch mb-0">
                                    <input type="hidden" name="patent_available" value="0">
                                    <input type="checkbox" name="patent_available" value="1" {{ !empty($operationalDetail->patent_available) ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                        @else
                        <div class="col-12 col-sm-6 col-md-auto toggle-item">
                            <div class="toggle-wrap">
                                <span class="font-small">12A Registration</span>
                                <label class="switch mb-0">
                                    <input type="hidden" name="status_12a" value="0">
                                    <input type="checkbox" name="status_12a" value="1" {{ $status12a ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-auto toggle-item">
                            <div class="toggle-wrap">
                                <span class="font-small">80G Registration</span>
                                <label class="switch mb-0">
                                    <input type="hidden" name="status_80g" value="0">
                                    <input type="checkbox" name="status_80g" value="1" {{ $status80g ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-auto toggle-item">
                            <div class="toggle-wrap">
                                <span class="font-small">FCRA Registration</span>
                                <label class="switch mb-0">
                                    <input type="hidden" name="status_fcra" value="0">
                                    <input type="checkbox" name="status_fcra" value="1" {{ $statusFcra ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-auto toggle-item">
                            <div class="toggle-wrap">
                                <span class="font-small">CSR-1 Registration</span>
                                <label class="switch mb-0">
                                    <input type="hidden" name="csr_1_registration" value="0">
                                    <input type="checkbox" name="csr_1_registration" value="1" {{ $csr1 ? 'checked' : '' }}>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>


                <hr class="mb-0">
                {{-- --}}
                <div class="inner-fields mt-4">

                    <div class="mb-4">
                        <h2 class="top-heading mb-0">Track Record</h2>
                    </div>

                    @php
                    $years = old('years_of_operation_months', $operationalDetail->years_of_operation_months ?? '');
                    $beneficiaries = old('total_beneficiaries', $operationalDetail->total_beneficiaries ?? '');
                    $achievements = old('key_achievements', $operationalDetail->key_achievements ?? '');
                    @endphp

                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

                        <!-- Years of Operation -->
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Months of Operation<span>*</span></label>

                            <input type="number" name="years_of_operation_months"
                                class="form-control @error('years_of_operation_months') is-invalid @enderror"
                                value="{{ $years }}" placeholder="Enter in years" required>

                            @error('years_of_operation_months')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Total Beneficiaries -->
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">
                                {{ auth('organization')->user()?->role === 'fund_seeker' ? 'Total Paid Customers' : 'Total Beneficiaries Served' }}
                                <span>*</span>
                            </label>
                            <input type="number" name="total_beneficiaries"
                                class="form-control @error('total_beneficiaries') is-invalid @enderror"
                                value="{{ $beneficiaries }}" placeholder="Only numbers shall be taken as input..."
                                required>

                            @error('total_beneficiaries')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Key Achievements -->
                        <div class="col-12 px-md-2">
                            <div class="textarea-label d-flex justify-content-between gap-1">
                                <label class="form-label">Key Achievements<span>*</span></label>
                                <p class="font-small">
                                    Word Limit: 100
                                </p>
                            </div>

                            <textarea name="key_achievements" rows="5" class="form-control" required
                                placeholder="Enter Achievements">{{ $achievements }}</textarea>

                            @error('key_achievements')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                </div>


            </div>
            <div class="card p-3 p-md-4 border-0 mb-3 rounded-3">
                <div class="inner-fields mt-4 small-label">

                    <div class="mb-4">
                        <h2 class="top-heading mb-0">Financial Record</h2>
                    </div>

                    @php
                    $lifetime = old('lifetime_revenue_lakh', $operationalDetail->lifetime_revenue_lakh ?? '');
                    $ongoing = old(
                    'ongoing_year_revenue_lakh',
                    $operationalDetail->ongoing_year_revenue_lakh ?? '',
                    );
                    $lastYear = old('last_year_revenue_lakh', $operationalDetail->last_year_revenue_lakh ?? '');
                    $lastToLast = old(
                    'last_to_last_year_revenue_lakh',
                    $operationalDetail->last_to_last_year_revenue_lakh ?? '',
                    );
                    @endphp

                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

                        <!-- Lifetime Revenue -->
                        <div class="col-12 col-md-6 col-lg-4 px-md-2">
                            <label class="form-label">Ongoing Year Turnover (till last month) (₹)<span>*</span></label>

                            <input type="text" inputmode="numeric" name="lifetime_revenue_lakh"
                                class="form-control @error('lifetime_revenue_lakh') is-invalid @enderror"
                                value="{{ $lifetime }}" placeholder="Enter amount, if you have zero turnover just put 0"
                                required>

                            @error('lifetime_revenue_lakh')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ongoing Year -->
                        <div class="col-12 col-md-6 col-lg-4 px-md-2">
                            <label class="form-label">Last Year Turnover (₹)<span>*</span></label>

                            <input type="text" inputmode="numeric" name="ongoing_year_revenue_lakh"
                                class="form-control @error('ongoing_year_revenue_lakh') is-invalid @enderror"
                                value="{{ $ongoing }}" placeholder="Enter amount, if you have zero turnover just put 0"
                                required>

                            @error('ongoing_year_revenue_lakh')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Last Year -->
                        <div class="col-12 col-md-6 col-lg-4 px-md-2">
                            <label class="form-label">Last to Last Year Turnover (₹)<span>*</span></label>

                            <input type="text" inputmode="numeric" name="last_year_revenue_lakh"
                                class="form-control @error('last_year_revenue_lakh') is-invalid @enderror"
                                value="{{ $lastYear }}" placeholder="Enter amount, If you have zero turnover then put 0"
                                required>

                            @error('last_year_revenue_lakh')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                </div>

            </div>


            {{-- third card --}}

            <div>

        </form>
    </div>
</form>


<div class="text-end">
    <button type="submit" class="btn btn-primary px-4">
        Save Changes
    </button>
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

{{-- <script>
        document.addEventListener("DOMContentLoaded", function () {

            const selectedBox = document.getElementById('selectedStatesBox');
            const dropdown = document.querySelector('.checkbox-list');
            const checkboxes = document.querySelectorAll('.checkbox-list input[type="checkbox"]');
            const hiddenInput = document.getElementById('hiddenStates');
            const panIndiaCheckbox = document.getElementById('s0');

            function handlePanIndiaSelection() {
                if (panIndiaCheckbox.checked) {
                    checkboxes.forEach(cb => {
                        if (cb !== panIndiaCheckbox) {
                            cb.checked = false;
                            cb.disabled = true;
                            cb.parentElement.style.pointerEvents = 'none';
                            cb.parentElement.style.opacity = '0.5';
                        }
                    });
                } else {
                    checkboxes.forEach(cb => {
                        if (cb !== panIndiaCheckbox) {
                            cb.disabled = false;
                            cb.parentElement.style.pointerEvents = '';
                            cb.parentElement.style.opacity = '';
                        }
                    });
                }
            }
            // ðŸ”½ open/close dropdown
            selectedBox.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-tag')) return;
                e.stopPropagation();
                dropdown.classList.toggle('show');
            });

            // âŒ close outside
            document.addEventListener('click', function () {
                dropdown.classList.remove('show');
            });

            // ðŸš« prevent inside click close
            dropdown.addEventListener('click', function (e) {
                e.stopPropagation();
            });

            // âœ… checkbox select
            checkboxes.forEach(cb => {
                cb.addEventListener('change', function () {

                    if (this === panIndiaCheckbox) {
                        handlePanIndiaSelection();
                    } else if (this.checked) {
                        panIndiaCheckbox.checked = false;
                        handlePanIndiaSelection();
                    }

                    updateSelected();
                });
            });
            handlePanIndiaSelection();

            updateSelected();

            // ðŸ” update UI
            function updateSelected() {

                let selected = [];
                selectedBox.innerHTML = '';

                checkboxes.forEach(cb => {

                    if (cb.checked) {

                        selected.push(cb.value);

                        const tag = document.createElement('div');
                        tag.className = 'state-tag';

                        tag.innerHTML = `
                                                                                                    <span>${cb.value}</span>
                                                                                                    <span class="remove-tag" data-value="${cb.value}">&times;</span>
                                                                                                `;

                        selectedBox.appendChild(tag);
                    }
                });

                // placeholder
                if (selected.length === 0) {
                    selectedBox.innerHTML = '<span class="placeholder">Select State</span>';
                }

                hiddenInput.value = selected.join(',');
            }

            // âŒ CROSS CLICK FIX (MAIN LOGIC)
            selectedBox.addEventListener('click', function (e) {

                if (e.target.classList.contains('remove-tag')) {

                    e.stopPropagation();

                    const value = e.target.dataset.value;

                    const checkbox = [...checkboxes].find(cb => cb.value === value);

                    if (checkbox) {
                        checkbox.checked = false;
                        checkbox.dispatchEvent(new Event('change'));
                    }
                }

            });

        });
    </script> --}}



<script>
    document.addEventListener('DOMContentLoaded', function() {

        function calculateTotal(sectionId, displayId, inputId) {
            const section = document.getElementById(sectionId);
            if (!section) return;

            const inputs = section.querySelectorAll('.funding-input');
            const display = document.getElementById(displayId);
            const hiddenInput = document.getElementById(inputId);

            function updateTotal() {
                let total = 0;

                inputs.forEach(input => {
                    let value = parseFloat(input.value);
                    if (!isNaN(value)) {
                        total += value;
                    }
                });

                // Update UI
                if (display) {
                    display.innerText = total.toLocaleString(undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) + ' Lakh';
                }

                // Update hidden input
                if (hiddenInput) {
                    hiddenInput.value = total;
                }
            }

            // Bind events
            inputs.forEach(input => {
                input.addEventListener('input', updateTotal);
            });

            // Initial calculation (important for edit case)
            updateTotal();
        }

        // NON PROFIT
        calculateTotal(
            'non_profit_donation',
            'totalFundingDisplay',
            'totalFundingInput'
        );

        // PROFIT
        calculateTotal(
            'profit_donation',
            'profitTotalDisplay',
            'profitTotalInput'
        );

    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        let textarea = document.querySelector('textarea[name="key_achievements"]');
        let counter = document.getElementById('wordCount');

        let maxWords = 100;
        let maxChars = 800; // ðŸ”¥ control total length properly

        function handleLimits() {
            let value = textarea.value;

            // ðŸ”¹ Character limit
            if (value.length > maxChars) {
                textarea.value = value.substring(0, maxChars);
                toastr.warning("Maximum character limit reached");
            }

            // ðŸ”¹ Word limit
            let words = textarea.value.trim().split(/\s+/).filter(w => w.length > 0);

            if (words.length > maxWords) {
                textarea.value = words.slice(0, maxWords).join(' ');
                toastr.warning("Maximum 100 words allowed");
            }

            counter.textContent = words.length;
        }

        textarea.addEventListener('input', handleLimits);

        // run on load
        handleLimits();

    });
</script>


<script>
    var myModal = document.getElementById('staticBackdrop')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        if (myInput) {
            myInput.focus()
        }
    })
</script>

<script>
    let yearSelect = document.getElementById('funder_year');
    let currentYear = new Date().getFullYear();

    for (let i = currentYear; i >= currentYear - 50; i--) {
        let option = `<option value="${i}">${i}</option>`;
        yearSelect.innerHTML += option;
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        //console.warn("loaded form script")


        // ORGANIZATION TYPE (main controller)
        const orgWrapper = document.querySelector('input[name="organization_type"]').closest('.select-wrapper');
        const orgInput = orgWrapper.querySelector('input[name="organization_type"]');
        const orgItems = orgWrapper.querySelectorAll('.select-list li');
        const orgDisplay = orgWrapper.querySelector('.custom-select');

        const sections = {
            non_profit: [
                document.getElementById('section_non_profit'),
                document.getElementById('non_profit_donation')
            ],
            profit: [
                document.getElementById('section_profit'),
                document.getElementById('profit_donation')
            ]
        };

        function updateUI(value, text = null) {

            const active = value === 'profit' ? 'profit' : 'non_profit';
            const inactive = active === 'profit' ? 'non_profit' : 'profit';

            // SHOW active
            sections[active].forEach(el => {
                if (!el) return;
                el.style.display = 'block';
                el.querySelectorAll('input,select,textarea').forEach(i => i.disabled = false);
            });

            // HIDE inactive + RESET VALUES
            sections[inactive].forEach(el => {
                if (!el) return;
                el.style.display = 'none';

                el.querySelectorAll('input,select,textarea').forEach(i => {
                    i.disabled = true;

                    // ðŸ”¥ reset value
                    if (i.type === 'hidden' || i.type === 'text' || i.tagName === 'SELECT') {
                        i.value = '';
                    }

                    if (i.type === 'checkbox') {
                        i.checked = false;
                    }
                });

                // reset custom select UI text
                el.querySelectorAll('.custom-select').forEach(cs => {
                    cs.textContent = 'Select';
                });
            });

            // ðŸ”¥ set default for active section
            let activeSection = sections[active][0];
            if (activeSection) {
                let firstOption = activeSection.querySelector('.select-list li');

                if (firstOption) {
                    let hiddenInput = activeSection.querySelector('input[type="hidden"]');
                    let display = activeSection.querySelector('.custom-select');

                    hiddenInput.value = firstOption.dataset.value;
                    display.textContent = firstOption.textContent;
                }
            }

            if (text) {
                orgDisplay.textContent = text;
            }
        }

        orgItems.forEach(item => {
            item.addEventListener('click', function(e) {

                e.stopPropagation();

                const value = this.dataset.value;
                const text = this.textContent;

                orgInput.value = value;

                updateUI(value, text);
            });
        });

        // default state
        updateUI(orgInput.value || 'non_profit');

    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log("loaded form script")
        const form = document.getElementById("onboardingForm");
        const continueBtn = document.getElementById("continueBtn");
        const modalElement = document.getElementById("staticBackdrop");

        // Use a safe check so the script doesn't crash if the element is missing
        if (modalElement) {
            const modal = new bootstrap.Modal(modalElement);
            const submitBtn = document.getElementById("finalSubmit");
            const consentCheckbox = document.getElementById("consentAgree");

            const registrationsConfirmEl = document.getElementById("registrationsConfirmModal");
            const registrationsConfirmText = document.getElementById("registrationsConfirmText");
            const registrationsConfirmProceedText = document.getElementById("registrationsConfirmProceedText");
            const registrationsConfirmBack = document.getElementById("registrationsConfirmBack");
            const registrationsConfirmProceed = document.getElementById("registrationsConfirmProceed");
            const registrationsConfirmModal = registrationsConfirmEl ? new bootstrap.Modal(
                registrationsConfirmEl) : null;

            const userRole = @json($role);
            let skipConsentReset = false;

            // Continue button validation
            // Continue button validation
            if (continueBtn) {
                continueBtn.addEventListener("click", function() {

                    let isValid = true;
                    let firstInvalidField = null;

                    // validate all required fields
                    form.querySelectorAll("[required]").forEach(field => {

                        const value = field.value?.trim();

                        if (!value) {

                            isValid = false;

                            field.classList.add("is-invalid");

                            const wrapper = field.closest(".select-wrapper");

                            // for custom select UI
                            if (wrapper) {

                                const customSelect = wrapper.querySelector(".custom-select");

                                if (customSelect) {
                                    customSelect.classList.add("is-invalid");

                                    // store first invalid visible field
                                    if (!firstInvalidField) {
                                        firstInvalidField = customSelect;
                                    }
                                }

                            } else {

                                // normal inputs / textarea
                                if (!firstInvalidField) {
                                    firstInvalidField = field;
                                }
                            }

                        } else {

                            field.classList.remove("is-invalid");

                            const wrapper = field.closest(".select-wrapper");

                            if (wrapper) {

                                const customSelect = wrapper.querySelector(".custom-select");

                                if (customSelect) {
                                    customSelect.classList.remove("is-invalid");
                                }
                            }
                        }
                    });

                    // scroll to first invalid field
                    if (!isValid && firstInvalidField) {

                        firstInvalidField.scrollIntoView({
                            behavior: "smooth",
                            block: "center"
                        });

                        setTimeout(() => {
                            firstInvalidField.focus?.();
                        }, 400);

                        return;
                    }

                    // fallback native validation
                    if (!form.checkValidity()) {
                        form.reportValidity();
                        return;
                    }

                    modal.show();
                });
            }
            if (consentCheckbox && submitBtn) {
                consentCheckbox.addEventListener("change", function() {
                    submitBtn.disabled = !consentCheckbox.checked;
                });

                modalElement.addEventListener("hidden.bs.modal", function() {
                    if (skipConsentReset) {
                        skipConsentReset = false;
                        return;
                    }
                    consentCheckbox.checked = false;
                    submitBtn.disabled = true;
                });
            }

            function hasAnyStartupRegistrationChecked() {
                const dpiit = document.querySelector('input[name="dpiit_registration"][value="1"]');
                const msme = document.querySelector('input[name="msme_registration"][value="1"]');
                const gstin = document.querySelector('input[name="gstin_registration"][value="1"]');
                const patent = document.querySelector('input[name="patent_available"][value="1"]');
                return Boolean(dpiit?.checked || msme?.checked || gstin?.checked || patent?.checked);
            }

            function hasAnyNpoRegistrationChecked() {
                const a12 = document.querySelector('input[name="status_12a"][value="1"]');
                const g80 = document.querySelector('input[name="status_80g"][value="1"]');
                const fcra = document.querySelector('input[name="status_fcra"][value="1"]');
                const csr1 = document.querySelector('input[name="csr_1_registration"][value="1"]');
                return Boolean(a12?.checked || g80?.checked || fcra?.checked || csr1?.checked);
            }

            function shouldShowRegistrationsConfirm() {
                if (userRole === 'fund_seeker') return !hasAnyStartupRegistrationChecked();
                return !hasAnyNpoRegistrationChecked();
            }

            function setRegistrationsConfirmCopy() {
                if (!registrationsConfirmText || !registrationsConfirmProceedText) return;

                if (userRole === 'fund_seeker') {
                    registrationsConfirmText.textContent =
                        "Are you sure your organization doesn't have DPIIT Certificate / MSME Registration / GSTIN Registration / Patent Certificate? Adding these registration/certification increases chances of selection.";
                } else {
                    registrationsConfirmText.textContent =
                        "Are you sure your organization doesn't have 12A, 80G, FCRA, CSR-1 registration/certification? Adding these registration/certification increases chances of selection.";
                }

                registrationsConfirmProceedText.textContent =
                    "Confirm, I don't have any of the above registrations/certifications";
            }

            // Intercept submit click: show confirmation popup if user selected none
            if (submitBtn && form && registrationsConfirmModal) {
                submitBtn.addEventListener("click", function(e) {
                    e.preventDefault();

                    if (consentCheckbox && !consentCheckbox.checked) return;

                    if (!shouldShowRegistrationsConfirm()) {
                        form.submit();
                        return;
                    }

                    setRegistrationsConfirmCopy();

                    const showConfirmAfterConsent = function() {
                        modalElement.removeEventListener('hidden.bs.modal',
                            showConfirmAfterConsent);
                        registrationsConfirmModal.show();
                    };

                    skipConsentReset = true;
                    modalElement.addEventListener('hidden.bs.modal', showConfirmAfterConsent);
                    modal.hide();
                });
            }

            if (registrationsConfirmBack && registrationsConfirmModal && modal) {
                registrationsConfirmBack.addEventListener("click", function() {
                    registrationsConfirmModal.hide();
                    modal.show();
                });
            }

            if (registrationsConfirmProceed && registrationsConfirmModal && form) {
                registrationsConfirmProceed.addEventListener("click", function() {
                    registrationsConfirmModal.hide();
                    form.submit();
                });
            }
        } // <--- You were likely missing this closing brace for the 'if'
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {

        let funderModal = new bootstrap.Modal(document.getElementById('funderModal'));
        let fundersTable = document.getElementById('fundersTable');

        let API = {
            list: "{{ route('funders.index') }}",
            store: "{{ route('funders.store') }}",
            update: "/funders/",
            delete: "/funders/"
        };

        let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        /* =========================
           COMMON FETCH HANDLER
        ========================= */
        async function handleResponse(res) {
            let data = await res.json();

            if (!res.ok) {
                throw data;
            }

            return data;
        }

        /* =========================
           LOAD
        ========================= */
        function formatLabel(value) {
            if (!value) return '-';

            return value
                .replace(/[_-]/g, ' ')
                .replace(/\b\w/g, char => char.toUpperCase());
        }
        const categoryMap = {
            government: "Government",
            csr_corporate: "CSR - Corporate",
            csr_psu: "CSR - PSU",
            foreign_institutions: "Foreign Institutions",
            individual_donor: "Individual Donor",
            promoter_money: "Promoter Money"
        };

        const purposeMap = {
            project: "Project",
            program: "Program",
            org_development: "Organization Development",
            infrastructure: "Infrastructure",
            staff_training: "Staff Training",
            technology: "Technology",
            others: "Others"
        };

        function loadFunders() {
            fetch(API.list)
                .then(handleResponse)
                .then(res => {
                    fundersTable.innerHTML = '';

                    res.data.forEach((funder, index) => {
                        fundersTable.innerHTML += `
                            <tr
                                data-id="${funder.id}"
                                data-category="${funder.category}"
                                data-purpose="${funder.purpose}"
                            >
                                <td>${index + 1}</td>
                                <td>${funder.name}</td>
                                <td>${categoryMap[funder.category] || '—'}</td>
                                <td>${funder.year}</td>
                                <td>${purposeMap[funder.purpose] || '—'}</td>
                                <td>${Number(funder.amount).toLocaleString('en-IN')}</td>
                                <td>
                                    <button type="button" class="edit editFunder">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button type="button" class="trash deleteFunder">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </td>
                            </tr>`;
                    });
                })
                .catch(() => {
                    toastr.error("Failed to load funders");
                });
        }

        /* =========================
           ADD
        ========================= */
        function addFunder(data) {
            return fetch(API.store, {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrf
                },
                body: JSON.stringify(data)
            }).then(handleResponse);
        }

        /* =========================
           UPDATE
        ========================= */
        function updateFunder(id, data) {
            return fetch(API.update + id, {
                method: 'PUT',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrf
                },
                body: JSON.stringify(data)
            }).then(handleResponse);
        }

        /* =========================
           DELETE
        ========================= */
        function deleteFunder(id) {
            return fetch(API.delete + id, {
                method: 'DELETE',
                headers: {
                    "X-CSRF-TOKEN": csrf
                }
            }).then(handleResponse);
        }

        /* =========================
           OPEN MODAL (ADD)
        ========================= */
        document.getElementById('addFunderBtn').addEventListener('click', () => {
            document.getElementById('funderForm').reset();
            document.getElementById('funder_id').value = '';
        });

        /* =========================
           SAVE (ADD / UPDATE)
        ========================= */
        document.getElementById('saveFunder').addEventListener('click', async (e) => {
            e.preventDefault();

            let id = document.getElementById('funder_id').value;

            let data = {
                name: document.getElementById('funder_name').value,
                year: document.getElementById('funder_year').value,
                amount: document.getElementById('funder_amount').value.replace(/,/g, ''),
                category: document.getElementById('funder_category')?.value || '',
                purpose: document.getElementById('funder_purpose')?.value || ''
            };

            try {
                if (id) {
                    await updateFunder(id, data);
                    toastr.success("Funder updated successfully");
                } else {
                    await addFunder(data);
                    toastr.success("Funder added successfully");
                }

                const modalEl = document.getElementById('funderModal');

                const instance = bootstrap.Modal.getOrCreateInstance(modalEl);
                instance.hide();

                // setTimeout(() => {
                //     document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());

                //     document.body.classList.remove('modal-open');
                //     document.body.style.overflow = '';
                //     document.body.style.paddingRight = '';

                //     document.documentElement.style.overflow = '';
                // }, 300);

                loadFunders();

            } catch (err) {
                console.error("Error saving funder:", err);

                if (err.errors) {
                    Object.values(err.errors).forEach(fieldErrors => {
                        fieldErrors.forEach(msg => toastr.error(msg));
                    });
                } else if (err.message) {
                    toastr.error(err.message);
                } else {
                    toastr.error("Something went wrong");
                }
            }
        });

        /* =========================
           EDIT CLICK
        ========================= */


        document.addEventListener('click', (e) => {
            if (e.target.closest('.editFunder')) {

                let row = e.target.closest('tr');

                document.getElementById('funder_id').value = row.dataset.id;
                document.getElementById('funder_name').value = row.children[1].innerText.trim();
                document.getElementById('funder_year').value = row.children[3].innerText.trim();
                document.getElementById('funder_amount').value =
                    row.children[5].innerText.replace(/,/g, '');

                // Saved values
                const category = row.dataset.category || '';
                const purpose = row.dataset.purpose || '';

                // Hidden inputs
                document.getElementById('funder_category').value = category;
                document.getElementById('funder_purpose').value = purpose;

                // Update dropdown text
                const selects = document.querySelectorAll('#funderModal .custom-select');

                selects[0].innerText = categoryMap[category] || 'Select an option';
                selects[1].innerText = purposeMap[purpose] || 'Select an option';

                funderModal.show();
            }
        });


        function capitalize(str) {
            return str.replace(/_/g, ' ')
                .replace(/\b\w/g, l => l.toUpperCase());
        }

        /* =========================
           DELETE CLICK
        ========================= */
        document.addEventListener('click', async (e) => {
            if (e.target.closest('.deleteFunder')) {

                let row = e.target.closest('tr');
                let id = row.dataset.id;

                if (!confirm("Delete this funder?")) return;

                try {
                    await deleteFunder(id);
                    toastr.success("Funder deleted successfully");
                    loadFunders();
                } catch (err) {
                    toastr.error("Delete failed");
                }
            }
        });

        /* =========================
           INIT
        ========================= */
        loadFunders();
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.select-wrapper').forEach(wrapper => {

            const hiddenInput = wrapper.querySelector('.hidden-select');
            const customSelect = wrapper.querySelector('.custom-select');
            const items = wrapper.querySelectorAll('.select-list li');

            // âœ… FIX: Set correct label on page load
            if (hiddenInput.value) {
                const selectedItem = wrapper.querySelector(
                    `.select-list li[data-value="${hiddenInput.value}"]`);
                if (selectedItem) {
                    customSelect.innerText = selectedItem.innerText;
                }
            }

            // Click handler
            items.forEach(item => {
                item.addEventListener('click', function() {
                    hiddenInput.value = this.dataset.value;
                    customSelect.innerText = this.innerText;
                });
            });

        });

    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {

        const selectedBox = document.getElementById('selectedDomainsBox');
        const dropdown = document.getElementById('domainCheckboxList');
        const checkboxes = dropdown.querySelectorAll('input[type="checkbox"]');
        const hiddenInput = document.getElementById('hiddenDomains');

        selectedBox.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-tag')) return;
            e.stopPropagation();
            dropdown.classList.toggle('show');
        });

        document.addEventListener('click', function() {
            dropdown.classList.remove('show');
        });

        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateSelectedDomain);
        });

        function updateSelectedDomain() {

            let selected = [];
            selectedBox.innerHTML = '';

            checkboxes.forEach(cb => {

                if (cb.checked) {

                    selected.push(cb.value);

                    const tag = document.createElement('div');
                    tag.className = 'state-tag';

                    tag.innerHTML = `
                                    <span>${cb.value}</span>
                                    <span class="remove-tag" data-value="${cb.value}">&times;</span>
                                `;

                    selectedBox.appendChild(tag);
                }
            });

            if (selected.length === 0) {
                selectedBox.innerHTML =
                    '<span class="placeholder">Select expertise</span>';
            }

            hiddenInput.value = selected.join(',');
        }

        selectedBox.addEventListener('click', function(e) {

            if (e.target.classList.contains('remove-tag')) {

                e.stopPropagation();

                const checkbox = [...checkboxes].find(cb => cb.value === e.target.dataset.value);

                if (checkbox) {
                    checkbox.checked = false;
                    checkbox.dispatchEvent(new Event('change'));
                }
            }
        });

        updateSelectedDomain();

    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        const selectedBox = document.getElementById('selectedStatesBox');
        const dropdown = document.getElementById('stateCheckboxList');
        const checkboxes = dropdown.querySelectorAll('input[type="checkbox"]');
        const hiddenInput = document.getElementById('hiddenStates');
        const panIndiaCheckbox = document.getElementById('s0');

        function handlePanIndiaSelection() {
            if (panIndiaCheckbox.checked) {
                checkboxes.forEach(cb => {
                    if (cb !== panIndiaCheckbox) {
                        cb.checked = false;
                        cb.disabled = true;
                        cb.parentElement.style.pointerEvents = 'none';
                        cb.parentElement.style.opacity = '0.5';
                    }
                });
            } else {
                checkboxes.forEach(cb => {
                    if (cb !== panIndiaCheckbox) {
                        cb.disabled = false;
                        cb.parentElement.style.pointerEvents = '';
                        cb.parentElement.style.opacity = '';
                    }
                });
            }
        }
        // ðŸ”½ open/close dropdown
        selectedBox.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-tag')) return;
            e.stopPropagation();
            dropdown.classList.toggle('show');
        });

        // âŒ close outside
        document.addEventListener('click', function() {
            dropdown.classList.remove('show');
        });

        // ðŸš« prevent inside click close
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // âœ… checkbox select
        checkboxes.forEach(cb => {
            cb.addEventListener('change', function() {

                if (this === panIndiaCheckbox) {
                    handlePanIndiaSelection();
                } else if (this.checked) {
                    panIndiaCheckbox.checked = false;
                    handlePanIndiaSelection();
                }

                updateSelected();
            });
        });
        handlePanIndiaSelection();

        updateSelected();

        // ðŸ” update UI
        function updateSelected() {

            let selected = [];
            selectedBox.innerHTML = '';

            checkboxes.forEach(cb => {

                if (cb.checked) {

                    selected.push(cb.value);

                    const tag = document.createElement('div');
                    tag.className = 'state-tag';

                    tag.innerHTML = `
                                                                                                                    <span>${cb.value}</span>
                                                                                                                    <span class="remove-tag" data-value="${cb.value}">&times;</span>
                                                                                                                `;

                    selectedBox.appendChild(tag);
                }
            });

            // placeholder
            if (selected.length === 0) {
                selectedBox.innerHTML = '<span class="placeholder">Select State</span>';
            }

            hiddenInput.value = selected.join(',');
        }

        // âŒ CROSS CLICK FIX (MAIN LOGIC)
        selectedBox.addEventListener('click', function(e) {

            if (e.target.classList.contains('remove-tag')) {

                e.stopPropagation();

                const value = e.target.dataset.value;

                const checkbox = [...checkboxes].find(cb => cb.value === value);

                if (checkbox) {
                    checkbox.checked = false;
                    checkbox.dispatchEvent(new Event('change'));
                }
            }

        });


    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('input[type="text"][inputmode="numeric"]').forEach(input => {

            // Format existing value
            if (input.value) {
                input.value = Number(input.value.replace(/,/g, '')).toLocaleString('en-IN');
            }

            input.addEventListener('input', function() {

                // Keep only digits
                let value = this.value.replace(/[^\d]/g, '');

                if (!value) {
                    this.value = '';
                    return;
                }

                this.value = Number(value).toLocaleString('en-IN');
            });

            // Remove commas before form submit
            input.form?.addEventListener('submit', () => {
                input.value = input.value.replace(/,/g, '');
            });

        });

    });
</script>


@endsection