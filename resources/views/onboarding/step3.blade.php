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
            <div class="col-6 col-sm-4 step bold active done">
                <div class="step-inner">
                    <div class="step-circle active d-flex justify-content-center align-items-center active done">
                        <img src="{{ asset('img/checkmark.png') }}" class="object-fit-contain" alt="steps section"
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

            <div class="col-6 col-sm-4 step active">
                <div class="step-circle active d-flex justify-content-center align-items-center active">
                    <img src="{{ asset('img/direction.png') }}" class="object-fit-contain" alt="steps section"
                        width="15px" height="11px">
                </div>
                <p>3. Organization Details</p>
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

                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control">
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
                                value="{{ $registrationType }}" required>
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
                                $domain = old('domain_of_expertise', $operationalDetail->domain_of_expertise ?? '');
                            @endphp

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control @error('domain_of_expertise') is-invalid @enderror">
                                    {{ $domain ? $domain : 'Select expertise' }}
                                </div>

                                <ul class="select-list">
                                    <li data-value="school-Education">School Education (Primary & Secondary)</li>
                                    <li data-value="Higher-Education">Higher Education Support</li>
                                    <li data-value="Scholarships-&-Fellowships">Scholarships & Fellowships</li>
                                    <li data-value="Digital">Digital Education</li>
                                    <li data-value="STEM">STEM Education</li>
                                    <li data-value="Special">Special Education (Children with Disabilities)</li>
                                    <li data-value="Vocational">Vocational Training & Skill Development</li>
                                    <li data-value="Employability">Employability & Livelihood Programs</li>
                                    <li data-value="Healthcare">Primary Healthcare</li>
                                    <li data-value="Maternal">Maternal & Child Health</li>
                                    <li data-value="Nutrition">Nutrition & Malnutrition</li>
                                    <li data-value="Mental">Mental Health</li>
                                    <li data-value="Disability">Disability Rehabilitation</li>
                                    <li data-value="Sanitation">Public Health & Sanitation</li>
                                    <li data-value="Preventive">Preventive Healthcare & Awareness</li>
                                    <li data-value="HIV/AIDS">HIV/AIDS & Communicable Diseases</li>
                                    <li data-value="Empowerment">Women Empowerment</li>
                                    <li data-value="Gender-Equality">Gender Equality</li>
                                    <li data-value="Violence">Prevention of Domestic Violence</li>
                                    <li data-value="Development">Girl Child Development</li>
                                    <li data-value="Protection">Child Protection & Child Rights</li>
                                    <li data-value="Livelihoods">Rural Livelihoods</li>
                                    <li data-value="Urban">Urban Livelihoods</li>
                                    <li data-value="Self-Help">Self-Help Groups (SHGs)</li>
                                    <li data-value="Microfinance">Microfinance & Financial Inclusion</li>
                                    <li data-value="Entrepreneurship">Entrepreneurship Development</li>
                                    <li data-value="Environmental">Environmental Conservation</li>
                                    <li data-value="Climate">Climate Action</li>
                                    <li data-value="Afforestation">Afforestation</li>
                                    <li data-value="Water">Water Conservation</li>
                                    <li data-value="Waste-Management">Waste Management</li>
                                    <li data-value="Renewable">Renewable Energy Access</li>
                                    <li data-value="Biodiversity">Biodiversity Protection</li>
                                    <li data-value="Rural">Rural Development Projects</li>
                                    <li data-value="Infrastructure">Infrastructure Development (Community Assets)</li>
                                    <li data-value="Drinking">Drinking Water Projects</li>
                                    <li data-value="Sanitation">Sanitation & Hygiene (WASH)</li>
                                    <li data-value="Rights">Human Rights</li>
                                    <li data-value="Legal">Legal Aid & Access to Justice</li>
                                    <li data-value="Governance">Governance & Civic Participation</li>
                                    <li data-value="Transparency">Transparency & Accountability</li>
                                    <li data-value="Senior">Senior Citizens Welfare</li>
                                    <li data-value="Persons">Persons with Disabilities</li>
                                    <li data-value="Tribal">Tribal Development</li>
                                    <li data-value="Minority">Minority Welfare</li>
                                    <li data-value="Migrant">Migrant Workers Support</li>
                                    <li data-value="Disaster">Disaster Relief & Rehabilitation</li>
                                    <li data-value="Emergency">Emergency Response & Humanitarian Aid</li>
                                </ul>

                                <input type="hidden" name="domain_of_expertise" class="hidden-select"
                                    value="{{ $domain }}" required>
                            </div>

                            @error('domain_of_expertise')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                    @php
                        $state = old('state', $operationalDetail->state ?? '');
                        $selectedStates = $state ? explode(',', $state) : [];
                    @endphp


                    <div class="col-12 col-md-6 {{ $role === 'fund_seeker' ? 'col-xl-6' : 'col-xl-4' }} px-md-2"> <label
                            class="form-label">Operational States<span>*</span></label>

                        @php
                            $state = old('state', $operationalDetail->state ?? '');
                        @endphp

                        <div class="select-wrapper w-100 position-relative checkbox-wrap">

                            <!-- Selected Items -->
                            <div id="selectedStatesBox"
                                class="custom-select form-control d-flex flex-wrap gap-2 align-items-center">
                                <span class="placeholder">Select State</span>
                            </div>
                            <ul class="select-list checkbox-list">
                                <li><input type="checkbox" value="Pan India" id="s0"><label for="s0">Pan
                                        India</label></li>

                                <li><input type="checkbox" value="Andhra Pradesh" id="s1"><label
                                        for="s1">Andhra
                                        Pradesh</label></li>
                                <li><input type="checkbox" value="Arunachal Pradesh" id="s2"><label
                                        for="s2">Arunachal
                                        Pradesh</label></li>
                                <li><input type="checkbox" value="Assam" id="s3"><label
                                        for="s3">Assam</label></li>
                                <li><input type="checkbox" value="Bihar" id="s4"><label
                                        for="s4">Bihar</label></li>
                                <li><input type="checkbox" value="Chhattisgarh" id="s5"><label
                                        for="s5">Chhattisgarh</label>
                                </li>
                                <li><input type="checkbox" value="Goa" id="s6"><label
                                        for="s6">Goa</label></li>
                                <li><input type="checkbox" value="Gujarat" id="s7"><label
                                        for="s7">Gujarat</label></li>
                                <li><input type="checkbox" value="Haryana" id="s8"><label
                                        for="s8">Haryana</label></li>
                                <li><input type="checkbox" value="Himachal Pradesh" id="s9"><label
                                        for="s9">Himachal
                                        Pradesh</label></li>
                                <li><input type="checkbox" value="Jharkhand" id="s10"><label
                                        for="s10">Jharkhand</label>
                                </li>
                                <li><input type="checkbox" value="Karnataka" id="s11"><label
                                        for="s11">Karnataka</label>
                                </li>
                                <li><input type="checkbox" value="Kerala" id="s12"><label
                                        for="s12">Kerala</label></li>
                                <li><input type="checkbox" value="Madhya Pradesh" id="s13"><label
                                        for="s13">Madhya
                                        Pradesh</label></li>
                                <li><input type="checkbox" value="Maharashtra" id="s14"><label
                                        for="s14">Maharashtra</label>
                                </li>
                                <li><input type="checkbox" value="Manipur" id="s15"><label
                                        for="s15">Manipur</label></li>
                                <li><input type="checkbox" value="Meghalaya" id="s16"><label
                                        for="s16">Meghalaya</label>
                                </li>
                                <li><input type="checkbox" value="Mizoram" id="s17"><label
                                        for="s17">Mizoram</label></li>
                                <li><input type="checkbox" value="Nagaland" id="s18"><label
                                        for="s18">Nagaland</label></li>
                                <li><input type="checkbox" value="Odisha" id="s19"><label
                                        for="s19">Odisha</label></li>
                                <li><input type="checkbox" value="Punjab" id="s20"><label
                                        for="s20">Punjab</label></li>
                                <li><input type="checkbox" value="Rajasthan" id="s21"><label
                                        for="s21">Rajasthan</label>
                                </li>
                                <li><input type="checkbox" value="Sikkim" id="s22"><label
                                        for="s22">Sikkim</label></li>
                                <li><input type="checkbox" value="Tamil Nadu" id="s23"><label for="s23">Tamil
                                        Nadu</label></li>
                                <li><input type="checkbox" value="Telangana" id="s24"><label
                                        for="s24">Telangana</label>
                                </li>
                                <li><input type="checkbox" value="Tripura" id="s25"><label
                                        for="s25">Tripura</label></li>
                                <li><input type="checkbox" value="Uttar Pradesh" id="s26"><label
                                        for="s26">Uttar
                                        Pradesh</label></li>
                                <li><input type="checkbox" value="Uttarakhand" id="s27"><label
                                        for="s27">Uttarakhand</label>
                                </li>
                                <li><input type="checkbox" value="West Bengal" id="s28"><label for="s28">West
                                        Bengal</label></li>

                            </ul>

                            <input type="hidden" name="state" id="hiddenStates" required>
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

                                <input type="hidden" name="idea_falls_in" class="hidden-select"
                                    value="{{ $ideaFallsIn }}">
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

                                <input type="hidden" name="current_stage" class="hidden-select"
                                    value="{{ $currentStage }}">
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
                                        <input type="checkbox" name="dpiit_registration" value="1"
                                            {{ !empty($operationalDetail->dpiit_registration) ? 'checked' : '' }}>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-auto toggle-item">
                                <div class="toggle-wrap">
                                    <span class="font-small">MSME Registration</span>
                                    <label class="switch mb-0">
                                        <input type="hidden" name="msme_registration" value="0">
                                        <input type="checkbox" name="msme_registration" value="1"
                                            {{ !empty($operationalDetail->msme_registration) ? 'checked' : '' }}>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-auto toggle-item">
                                <div class="toggle-wrap">
                                    <span class="font-small">GSTIN Registration</span>
                                    <label class="switch mb-0">
                                        <input type="hidden" name="gstin_registration" value="0">
                                        <input type="checkbox" name="gstin_registration" value="1"
                                            {{ !empty($operationalDetail->gstin_registration) ? 'checked' : '' }}>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-auto toggle-item">
                                <div class="toggle-wrap">
                                    <span class="font-small">Patent Available</span>
                                    <label class="switch mb-0">
                                        <input type="hidden" name="patent_available" value="0">
                                        <input type="checkbox" name="patent_available" value="1"
                                            {{ !empty($operationalDetail->patent_available) ? 'checked' : '' }}>
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
                                        <input type="checkbox" name="status_12a" value="1"
                                            {{ $status12a ? 'checked' : '' }}>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-auto toggle-item">
                                <div class="toggle-wrap">
                                    <span class="font-small">80G Registration</span>
                                    <label class="switch mb-0">
                                        <input type="hidden" name="status_80g" value="0">
                                        <input type="checkbox" name="status_80g" value="1"
                                            {{ $status80g ? 'checked' : '' }}>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-auto toggle-item">
                                <div class="toggle-wrap">
                                    <span class="font-small">FCRA Registration</span>
                                    <label class="switch mb-0">
                                        <input type="hidden" name="status_fcra" value="0">
                                        <input type="checkbox" name="status_fcra" value="1"
                                            {{ $statusFcra ? 'checked' : '' }}>
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-auto toggle-item">
                                <div class="toggle-wrap">
                                    <span class="font-small">CSR-1 Registration</span>
                                    <label class="switch mb-0">
                                        <input type="hidden" name="csr_1_registration" value="0">
                                        <input type="checkbox" name="csr_1_registration" value="1"
                                            {{ $csr1 ? 'checked' : '' }}>
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
                            <label class="form-label">Years of Operation<span>*</span></label>

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

                            <textarea name="key_achievements" rows="5" class="form-control" required placeholder="Enter Achievements">{{ $achievements }}</textarea>

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
                            <label class="form-label">Ongoing Year Turnover (till last month) (₹
                                Lakh)<span>*</span></label>

                            <input type="number" name="lifetime_revenue_lakh"
                                class="form-control @error('lifetime_revenue_lakh') is-invalid @enderror"
                                value="{{ $lifetime }}"
                                placeholder="Enter amount, if you have zero turnover just put 0" required>

                            @error('lifetime_revenue_lakh')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ongoing Year -->
                        <div class="col-12 col-md-6 col-lg-4 px-md-2">
                            <label class="form-label">Last Year Turnover (₹ Lakh)<span>*</span></label>

                            <input type="number" name="ongoing_year_revenue_lakh"
                                class="form-control @error('ongoing_year_revenue_lakh') is-invalid @enderror"
                                value="{{ $ongoing }}"
                                placeholder="Enter amount, if you have zero turnover just put 0" required>

                            @error('ongoing_year_revenue_lakh')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Last Year -->
                        <div class="col-12 col-md-6 col-lg-4 px-md-2">
                            <label class="form-label">Last to Last Year Turnover (₹ Lakh)<span>*</span></label>

                            <input type="number" name="last_year_revenue_lakh"
                                class="form-control @error('last_year_revenue_lakh') is-invalid @enderror"
                                value="{{ $lastYear }}"
                                placeholder="Enter amount, If you have zero turnover then put 0" required>

                            @error('last_year_revenue_lakh')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Last to Last Year -->
                        {{-- <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Last to Last Year Turnover (₹ Lakh)<span>*</span></label>

                            <input type="number" name="last_to_last_year_revenue_lakh"
                                class="form-control @error('last_to_last_year_revenue_lakh') is-invalid @enderror"
                                value="{{ $lastToLast }}" placeholder="Enter amount, if you have zero donation just put 0"
                                required>

                            @error('last_to_last_year_revenue_lakh')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div> --}}

                    </div>

                </div>

            </div>


            {{-- third card --}}
            <div class="card p-0 border-0 rounded-3">
                <div class="inner-fields d-flex justify-content-between align-items-center p-3 p-md-4">
                    <div class="">
                        <h2 class="top-heading mb-0">Major Funders</h2>
                    </div>
                    <div class="btn-wrap">
                        <button type="button" class="btn btn-primary add-fund gradient-btn" id="addFunderBtn"
                            data-bs-toggle="modal" data-bs-target="#funderModal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ms-0 me-2" width="11" height="11"
                                viewBox="0 0 11 11" fill="none">
                                <path d="M5.125 0.75V9.5M9.5 5.125H0.75" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg> Add Funders

                    </div>
                </div>
                <div class="table-wrap major-funders-table-wrap">
                    <table class="table major-funders-table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Funder Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Year</th>
                                <th scope="col">Purpose</th>
                                <th scope="col">Amount (₹00.00 Lakh)</th>
                            </tr>
                        </thead>
                        <tbody id="fundersTable"></tbody>
                    </table>
                </div>

            </div>
            <div>

                <div
                    class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 mt-4 steps-btn pe-lg-4 flex-wrap">
                    <div class="btn-wrap">
                        <button type="button" class="btn simple-btn"
                            onclick="window.location.href='{{ route('onboarding.step2') }}'">
                            <img src="/img/back.png" class="me-2" width="15" height="6.25">
                            Back
                        </button>
                    </div>
                    <div class="btn-wrap">
                        <button type="button" class="btn gradient-btn" id="continueBtn">Next <svg
                                xmlns="http://www.w3.org/2000/svg" width="17" height="8" viewBox="0 0 17 8"
                                fill="none">
                                <path d="M12.625 7L15.75 3.875L12.625 0.75M15.75 3.875H0.75" stroke="white"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg></button>
                    </div>
                </div>
        </form>
    </div>

    {{-- Major Funder modal --}}
    <div class="modal fade" id="funderModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h2 class="modal-title mb-0 inner-title">Major Funder Details</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body py-0">
                    <form id="funderForm">
                        <input type="hidden" id="funder_id">

                        <div class="mb-3">
                            <label>Funder Name</label>
                            <input type="text" class="form-control" id="funder_name" placeholder="Enter Funder Name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category<span>*</span></label>

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Select an option</div>

                                <input type="hidden" name="category" id="funder_category">

                                <ul class="select-list" style="display: none;">
                                    <li data-value="government">Government</li>
                                    <li data-value="csr_corporate">CSR - Corporate</li>
                                    <li data-value="csr_psu">CSR - PSU</li>
                                    <li data-value="foreign_institutions">Foreign Institutions</li>
                                    <li data-value="individual_donor">Individual Donor</li>
                                    <li data-value="promoter_money">Promoter Money</li>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Year</label>
                            <input type="number" class="form-control" id="funder_year"
                                placeholder="Enter Year (e.g. 2026)">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Purpose<span>*</span></label>

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Select an option</div>

                                <input type="hidden" name="purpose" id="funder_purpose">

                                <ul class="select-list" style="display: none;">
                                    <li data-value="project">Project</li>
                                    <li data-value="program">Program</li>
                                    <li data-value="org_development">Organization Development</li>
                                    <li data-value="infrastructure">Infrastructure</li>
                                    <li data-value="staff_training">Staff Training</li>
                                    <li data-value="technology">Technology</li>
                                    <li data-value="others">Others</li>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Amount (₹00.00 Lakh)</label>
                            <input type="number" class="form-control" id="funder_amount" placeholder="Enter Amount">
                        </div>
                    </form>
                </div>

                <div
                    class="modal-footer border-0 d-flex justify-content-center justify-content-md-end gap-2 steps-btn pe-lg-4 flex-wrap">
                    <button type="button" class="btn simple-btn m-0">Back</button>
                    <button type="button" class="btn gradient-btn m-0" id="saveFunder">Add</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Consent & Declaration modal --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 consent">
                <div class="modal-header">
                    <h3 class="modal-title mb-0">Consent & Declaration</h3>
                </div>
                <div class="modal-body">
                    <p>By registering and submitting information on Fundink, I hereby declare and agree that:</p>
                    <div class="consent-box">
                        <p>All information provided by our organization - including organization details, PAN, statutory
                            registrations, governance structure, geographical coverage, domain expertise, project track
                            record, and financial records (including institutional, foreign, and individual donations,
                            and total turnover) - is true, accurate, and complete to the best of my knowledge.</p>

                        <p>I authorize Fundink to collect, store, process, analyze, and present this information to
                            verified funders, CSR entities, philanthropies, impact investors, financial institutions,
                            and ecosystem partners for the purpose of fundraising, due diligence, evaluation, and
                            collaboration.</p>

                        <p>I expressly consent to Fundink conducting verification and due diligence checks, including
                            but not limited to:</p>
                        <ul class="sub-list">
                            <li>PAN validation</li>
                            <li>Statutory registration verification</li>
                            <li>Background and compliance checks</li>
                            <li>Credit bureau checks using the organization's PAN, where applicable, for the purpose
                                of financial assessment and risk evaluation</li>
                        </ul>

                        <p>I grant Fundink the right to use our organization's details for:</p>
                        <ul class="sub-list">
                            <li>Fundraising campaigns and curated funding calls</li>
                            <li>Promotional materials, website listings, newsletters, and social media communication</li>
                            <li>Investor/funder presentations and ecosystem reports</li>
                            <li>Showcasing case studies and impact highlights</li>
                        </ul>

                        <p>I consent to receive communication from Fundink regarding funding opportunities, partnership
                            introductions, events, workshops, ecosystem updates, and promotional announcements via
                            email, phone, or other digital channels.</p>

                        <p>I acknowledge that registration on Fundink does not guarantee funding, grants, investment, or
                            partnership confirmation.</p>

                        <p>I confirm that I am an authorized representative of the organization and legally empowered to
                            provide this declaration and consent on behalf of the organization.</p>

                        <p>I understand that Fundink will take reasonable measures to safeguard sensitive information
                            and will share confidential data strictly with relevant stakeholders for legitimate
                            evaluation, risk assessment, and fundraising purposes.</p>
                    </div>
                </div>
                <label class="check-item bg-light p-2 rounded-3 final-check align-items-center">
                    <input type="checkbox" id="consentAgree" required>
                    <p class="mb-0">I have read, understood, and agree to the above Consent & Declaration.</p>
                </label>
                <div
                    class="modal-footer d-flex justify-content-center justify-content-md-end gap-2 gap-md-2 steps-btn flex-wrap border-0">
                    <div class="btn-wrap">
                        <button type="button" class="btn simple-btn" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    <div class="btn-wrap">
                        <button type="button" id="finalSubmit" class="btn gradient-btn" disabled>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Confirm â€œno registrationsâ€ modal (Startup / NPO) --}}
    <div class="modal fade" id="registrationsConfirmModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content border-0 registrations-confirm">
                <div class="modal-body p-4 text-center">
                    <div class="registrations-confirm__icon mx-auto mb-3" aria-hidden="true"><img
                            src="{{ asset('img/question-svg.svg') }}" class="img-fluid"></div>
                    <h3 class="registrations-confirm__title mb-3">Are Your Sure?</h3>
                    <p class="registrations-confirm__desc mb-4" id="registrationsConfirmText"></p>

                    <div class="d-flex flex-column gap-3">
                        <button type="button" class="btn registrations-confirm__secondary"
                            id="registrationsConfirmBack">
                            I have some of these registrations/certification
                        </button>
                        <button type="button" class="btn gradient-btn registrations-confirm__primary"
                            id="registrationsConfirmProceed">
                            <span id="registrationsConfirmProceedText">Confirm, I don't have any of the above
                                registrations/certifications</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .editFunder,
        .deleteFunder {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 10px;
            /* increases clickable area */
            border: none;
            background: transparent;
            cursor: pointer;
        }

        .editFunder i,
        .deleteFunder i {
            pointer-events: none;
            /* ensures clicks go to button, not icon */
        }

        .major-funders-table td:last-child {
            white-space: nowrap;
        }

        .major-funders-table td:last-child .edit,
        .major-funders-table td:last-child .trash {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .registrations-confirm {
            border-radius: 18px;
        }


        .registrations-confirm__title {
            font-size: 36px !important;
            font-weight: 600;
            color: #000 !important;
            font-family: 'Inter';
            letter-spacing: -1.08px;
        }

        .registrations-confirm__desc {
            opacity: 0.55;
            font-size: 14px !important;
            line-height: 1.5;
            max-width: 520px;
            margin-left: auto;
            margin-right: auto;
        }

        .registrations-confirm__secondary {
            border-radius: 30px !important;
            border: 1px solid rgba(43, 43, 43, 0.20) !important;
            padding: 14px 18px !important;
            background: #fff;
            color: #2B2B2B !important;
            font-family: 'Inter';
            font-size: 12px !important;
            font-weight: 600 !important;
        }

        .registrations-confirm__primary {
            color: #FFF !important;
            font-family: 'Inter';
            font-size: 12px !important;
            font-weight: 600 !important;
            padding: 14px 18px !important;
        }

        #registrationsConfirmProceedText {
            color: #fff !important;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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

            function loadFunders() {
                fetch(API.list)
                    .then(handleResponse)
                    .then(res => {
                        fundersTable.innerHTML = '';


                        res.data.forEach((funder, index) => {
                            const category = funder.category || 'â€”';
                            const purpose = funder.purpose || 'â€”';
                            const amount = Number(funder.amount).toLocaleString('en-IN', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });

                            fundersTable.innerHTML += `
<tr
    data-id="${funder.id}"
    data-category="${funder.category}"
    data-purpose="${funder.purpose}"
>
    <td>${index + 1}</td>
    <td>${funder.name}</td>
    <td>${formatLabel(funder.category)}</td>
    <td>${funder.year}</td>
    <td>${formatLabel(funder.purpose)}</td>
    <td>â‚¹ ${Number(funder.amount).toLocaleString()}</td>
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
                    amount: document.getElementById('funder_amount').value,
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

                    funderModal.hide();
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
                        row.children[3].innerText.replace(/,/g, '');

                    // values
                    let category = row.dataset.category || '';
                    let purpose = row.dataset.purpose || '';

                    // hidden inputs
                    document.getElementById('funder_category').value = category;
                    document.getElementById('funder_purpose').value = purpose;

                    // IMPORTANT: update correct UI elements
                    let selects = document.querySelectorAll('#funderModal .custom-select');

                    // 0 = category
                    selects[0].innerText = category ? capitalize(category) : 'Select an option';

                    // 1 = purpose
                    selects[1].innerText = purpose ? capitalize(purpose) : 'Select an option';

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

            const selectedBox = document.getElementById('selectedStatesBox');
            const dropdown = document.querySelector('.checkbox-list');
            const checkboxes = document.querySelectorAll('.checkbox-list input[type="checkbox"]');
            const hiddenInput = document.getElementById('hiddenStates');

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
                cb.addEventListener('change', updateSelected);
            });

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

                    const value = e.target.getAttribute('data-value');

                    checkboxes.forEach(cb => {
                        if (cb.value === value) {
                            cb.checked = false;
                        }
                    });

                    updateSelected();
                }
            });

        });
    </script>
@endsection
