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
                        <span></span>
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
                <div class="step-circle active d-flex justify-content-center align-items-center">

                    <img src="{{ asset('img/direction.png') }}" class="object-fit-contain" alt="steps section"
                        width="15px" height="11px">
                </div>
                <p>3. Organization Type</p>
            </div>

        </div>
    </div>
    <div class="card-body p-0">

        <form id="onboardingForm" method="POST" action="{{ route('onboarding.step3.store') }}"> @csrf
            <div class="card p-3 p-md-4 border-0 mb-3 rounded-3">
                <div class="mb-4">
                    <h1 class="top-heading mb-0">Organization type</h1>
                </div>


                <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

                    <!-- Organization Type -->
                    {{-- <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">What best describe your organization:<span>*</span></label>

                        @php
                            $orgType = old('organization_type', $operationalDetail->organization_type ?? '');
                        @endphp

                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control @error('organization_type') is-invalid @enderror">
                                {{ $orgType ? ucfirst(str_replace('_', ' ', $orgType)) : 'Select an option' }}
                            </div>

                            <ul class="select-list">
                                <li data-value="non_profit">Non Profit</li>
                                <li data-value="profit">For Profit</li>
                            </ul>

                            <input type="hidden" name="organization_type" class="hidden-select" value="{{ $orgType }}">
                        </div>

                        @error('organization_type')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <!-- State -->
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Operational States<span>*</span></label>

                        @php
                            $state = old('state', $operationalDetail->state ?? '');
                        @endphp

                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control @error('state') is-invalid @enderror">
                                {{ $state ? $state : 'Select State' }}
                            </div>

                            <ul class="select-list">
                                <li data-value="Andhra pradesh">Andhra Pradesh</li>
                                <li data-value="Arunachal Pradesh">Arunachal Pradesh</li>
                                <li data-value="Assam">Assam</li>
                                <li data-value="Bihar">Bihar</li>
                                <li data-value="Chhattisgarh">Chhattisgarh</li>
                                <li data-value="Goa">Goa</li>
                                <li data-value="Gujarat">Gujarat</li>
                                <li data-value="Haryana">Haryana</li>
                                <li data-value="Himachal Pradesh">Himachal Pradesh</li>
                                <li data-value="Jharkhand">Jharkhand</li>
                                <li data-value="Karnataka">Karnataka</li>
                                <li data-value="Kerala">Kerala</li>
                                <li data-value="Madhya Pradesh">Madhya Pradesh</li>
                                <li data-value="Maharashtra">Maharashtra</li>
                                <li data-value="Manipur">Manipur</li>
                                <li data-value="Meghalaya">Meghalaya</li>
                                <li data-value="Mizoram">Mizoram</li>
                                <li data-value="Nagaland">Nagaland</li>
                                <li data-value="Odisha">Odisha</li>
                                <li data-value="Punjab">Punjab</li>
                                <li data-value="Rajasthan">Rajasthan</li>
                                <li data-value="Sikkim">Sikkim</li>
                                <li data-value="Tamil Nadu">Tamil Nadu</li>
                                <li data-value="Telangana">Telangana</li>
                                <li data-value="Tripura">Tripura</li>
                                <li data-value="Uttar Pradesh">Uttar Pradesh</li>
                                <li data-value="Uttarakhand">Uttarakhand</li>
                                <li data-value="West Bengal">West Bengal</li>
                            </ul>

                            <input type="hidden" name="state" class="hidden-select" value="{{ $state }}">
                        </div>

                        @error('state')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <hr class="mb-0">
                {{-- --}}
                <div class="inner-fields mt-4" id="section_non_profit">

                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Startup Credentials</h2>
                    </div>

                    <div class="row mb-4 pb-1 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

                        <!-- Registration Type -->
                        <div class="col-12 col-md-6 col-xl-5 px-md-2">
                            <label class="form-label">Registration Type<span>*</span></label>

                            @php
                                $registrationType = old(
                                    'registration_type',
                                    $operationalDetail->registration_type ?? '',
                                );

                                $labels = [
                                    'society' => 'Society',
                                    'trust' => 'Trust',
                                    'section_8_company' => 'Section 8 Company',
                                ];
                            @endphp



                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">
                                    {{ $registrationType ? $labels[$registrationType] ?? 'Select' : 'Select' }}
                                </div>

                                <ul class="select-list">
                                    <li data-value="society">Society</li>
                                    <li data-value="trust">Trust</li>
                                    <li data-value="section_8_company">Section 8 Company</li>
                                </ul>

                                <input type="hidden" name="registration_type" class="hidden-select"
                                    value="{{ $registrationType }}">
                            </div>

                            @error('registration_type')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Domain of Expertise -->
                        <div class="col-12 col-md-6 col-xl-5 px-md-2">
                            <label class="form-label">Domain of Expertise<span>*</span></label>

                            @php
                                $domain = old('domain_of_expertise', $operationalDetail->domain_of_expertise ?? '');
                            @endphp

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control @error('domain_of_expertise') is-invalid @enderror">
                                    {{ $domain ? $domain : 'Select' }}
                                </div>

                                <ul class="select-list">
                                    <li data-value="school-Education">School Education (Primary & Secondary)</li>
                                    <li data-value="Higher-Education">Higher Education Support</li>
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
                                    value="{{ $domain }}">
                            </div>

                            @error('domain_of_expertise')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Toggles -->
                    @php
                        $status12a = old('status_12a', $operationalDetail->status_12a ?? 0);
                        $status80g = old('status_80g', $operationalDetail->status_80g ?? 0);
                        $statusFcra = old('status_fcra', $operationalDetail->status_fcra ?? 0);
                        $csr1 = old('csr_1_registration', $operationalDetail->csr_1_registration ?? 0);
                    @endphp

                </div>
                <hr class="mb-0">
                <div class="inner-fields mt-4">
                    <div class="mb-4">
                        <h2 class="inner-title">Applicable Registration & Certification</h2>
                    </div>
                    <div class="row toggle-container mb-3">
                        <div class="col-auto toggle-item">
                            <span>12A Status</span>
                            <label class="switch">
                                <input type="hidden" name="status_12a" value="0">
                                <input type="checkbox" name="status_12a" value="1"
                                    {{ $status12a ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="col-auto toggle-item">
                            <span>80G Status</span>
                            <label class="switch">
                                <input type="hidden" name="status_80g" value="0">
                                <input type="checkbox" name="status_80g" value="1"
                                    {{ $status80g ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="col-auto toggle-item">
                            <span>FCRA Status</span>
                            <label class="switch">
                                <input type="hidden" name="status_fcra" value="0">
                                <input type="checkbox" name="status_fcra" value="1"
                                    {{ $statusFcra ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="col-auto toggle-item">
                            <span>CSR-1 Registration</span>
                            <label class="switch">
                                <input type="hidden" name="csr_1_registration" value="0">
                                <input type="checkbox" name="csr_1_registration" value="1"
                                    {{ $csr1 ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>

                    </div>
                </div>

                <div class="inner-fields mt-4" id="section_profit" style="display: none;">

                    <div class="mb-4">
                        <h2 class="inner-title mb-0">NPO Credentials</h2>
                    </div>

                    <div class="row mb-4 pb-1 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

                        <!-- Registration Type -->
                        <div class="col-12 col-md-4 col-xl-4 px-md-2">
                            <label class="form-label">Registration Type<span>*</span></label>

                            @php
                                $registrationType = old(
                                    'registration_type',
                                    $operationalDetail->registration_type ?? '',
                                );
                            @endphp

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control @error('registration_type') is-invalid @enderror">
                                    {{ $registrationType ? ucfirst(str_replace('_', ' ', $registrationType)) : 'Select' }}
                                </div>

                                <ul class="select-list">
                                    <li data-value="private_limited">Private Limited</li>
                                    <li data-value="llp">LLP</li>
                                    <li data-value="opc">OPC</li>
                                </ul>

                                <input type="hidden" name="registration_type" class="hidden-select"
                                    value="{{ $registrationType }}">
                            </div>

                            @error('registration_type')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Current Stage -->
                        <div class="col-12 col-md-4 col-xl-4 px-md-2">
                            <label class="form-label">Current Stage<span>*</span></label>

                            @php
                                $stage = old('current_stage', $operationalDetail->current_stage ?? '');
                            @endphp

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control @error('current_stage') is-invalid @enderror">
                                    {{ $stage ? $stage : 'Select' }}
                                </div>

                                <ul class="select-list">
                                    <li data-value="idea">Idea</li>
                                    <li data-value="Early">Early Revenue</li>
                                    <li data-value="Growth">Growth</li>
                                    <li data-value="Scale-up">Scale-up</li>
                                </ul>

                                <input type="hidden" name="current_stage" class="hidden-select"
                                    value="{{ $stage }}">
                            </div>

                            @error('current_stage')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Product Category -->
                        <div class="col-12 col-md-4 col-xl-4 px-md-2">
                            <label class="form-label">Your idea/product falls in:<span>*</span></label>

                            @php
                                $category = old('product_category', $operationalDetail->product_category ?? '');
                            @endphp

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control @error('product_category') is-invalid @enderror">
                                    {{ $category ? $category : 'Select' }}
                                </div>

                                <ul class="select-list">
                                    <li data-value="FinTech">FinTech</li>
                                    <li data-value="EdTech">EdTech</li>
                                    <li data-value="HealthTech">HealthTech</li>
                                    <li data-value="AgriTech">AgriTech</li>
                                    <li data-value="SaaS">SaaS (Software as a Service)</li>
                                    <li data-value="Learning">AI & Machine Learning</li>
                                    <li data-value="DeepTech">DeepTech</li>
                                    <li data-value="Blockchain">Blockchain & Web3</li>
                                    <li data-value="Cybersecurity">Cybersecurity</li>
                                    <li data-value="Cloud">Cloud & DevOps</li>
                                    <li data-value="E-commerce">E-commerce</li>
                                    <li data-value="D2C">D2C (Direct-to-Consumer) Brands</li>
                                    <li data-value="RetailTech">RetailTech</li>
                                    <li data-value="FoodTech">FoodTech</li>
                                    <li data-value="Q-Commerce">Q-Commerce</li>
                                    <li data-value="Internet">Consumer Internet</li>
                                    <li data-value="FashionTech">FashionTech</li>
                                    <li data-value="Beauty">Beauty & Personal Care</li>
                                    <li data-value="CleanTech">CleanTech</li>
                                    <li data-value="ClimateTech">ClimateTech</li>
                                    <li data-value="Renewable">Renewable Energy</li>
                                    <li data-value="Mobility">EV & Mobility</li>
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
                                    <li data-value="Social-Impact">Social Impact</li>
                                    <li data-value="Economy">Circular Economy</li>
                                    <li data-value="Waste-Management">Waste Management</li>
                                    <li data-value="WaterTech">WaterTech</li>
                                    <li data-value="RuralTech">RuralTech</li>
                                    <li data-value="Development">Skill Development</li>
                                    <li data-value="Gaming">Gaming & Esports</li>
                                    <li data-value="Media">Media & ContentTech</li>
                                    <li data-value="TravelTech">TravelTech</li>
                                    <li data-value="SportsTech">SportsTech</li>
                                    <li data-value="Robotics">Robotics & Automation</li>
                                    <li data-value="Biotechnology">Biotechnology</li>
                                </ul>

                                <input type="hidden" name="product_category" class="hidden-select"
                                    value="{{ $category }}">
                            </div>

                            @error('product_category')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Toggles -->
                    @php
                        $dpiit = old('dpiit_recognition', $operationalDetail->dpiit_recognition ?? 0);
                        $msme = old('msme_registered', $operationalDetail->msme_registered ?? 0);
                        $gstin = old('gstin_registration', $operationalDetail->gstin_registration ?? 0);
                    @endphp

                    <div class="row toggle-container mb-3">

                        <div class="col-auto toggle-item d-flex align-items-center gap-2">
                            <span>DPIIT Recognition</span>
                            <label class="switch">
                                <input type="hidden" name="dpiit_recognition" value="0">
                                <input type="checkbox" name="dpiit_recognition" value="1"
                                    {{ $dpiit ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="col-auto toggle-item d-flex align-items-center gap-2">
                            <span>MSME Registered</span>
                            <label class="switch">
                                <input type="hidden" name="msme_registered" value="0">
                                <input type="checkbox" name="msme_registered" value="1"
                                    {{ $msme ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="col-auto toggle-item d-flex align-items-center gap-2">
                            <span>GSTIN Registration</span>
                            <label class="switch">
                                <input type="hidden" name="gstin_registration" value="0">
                                <input type="checkbox" name="gstin_registration" value="1"
                                    {{ $gstin ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>

                    </div>

                </div>
                <hr class="mb-0">
                {{-- --}}
                <div class="inner-fields mt-4">

                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Track Record</h2>
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
                            <label class="form-label">Total Beneficiaries Served<span>*</span></label>

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
                                <p class="font-small">Word Limit: 100</p>
                            </div>

                            <textarea name="key_achievements" maxlength="500" rows="5"
                                class="form-control @error('key_achievements') is-invalid @enderror" placeholder="Enter Achievements">{{ $achievements }}</textarea>

                            @error('key_achievements')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                </div>
                <hr class="mb-0">
                {{-- --}}
                <div class="inner-fields mt-4 small-label">

                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Financial Record</h2>
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
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Last to Last Year Turnover (₹ Lakh)<span>*</span></label>

                            <input type="number" name="lifetime_revenue_lakh"
                                class="form-control @error('lifetime_revenue_lakh') is-invalid @enderror"
                                value="{{ $lifetime }}"
                                placeholder="Enter amount, if you have zero turnover just put 0" required>

                            @error('lifetime_revenue_lakh')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ongoing Year -->
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Ongoing Year Turnover (till last month) (₹
                                Lakh)<span>*</span></label>

                            <input type="number" name="ongoing_year_revenue_lakh"
                                class="form-control @error('ongoing_year_revenue_lakh') is-invalid @enderror"
                                value="{{ $ongoing }}" placeholder="Enter Amount" required>

                            @error('ongoing_year_revenue_lakh')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Last Year -->
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Last Year Turnover (₹00.00 Lakh)<span>*</span></label>

                            <input type="number" name="last_year_revenue_lakh"
                                class="form-control @error('last_year_revenue_lakh') is-invalid @enderror"
                                value="{{ $lastYear }}" placeholder="Enter Amount" required>

                            @error('last_year_revenue_lakh')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Last to Last Year -->
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Last to Last Year Turnover (₹ Lakh)<span>*</span></label>

                            <input type="number" name="last_to_last_year_revenue_lakh"
                                class="form-control @error('last_to_last_year_revenue_lakh') is-invalid @enderror"
                                value="{{ $lastToLast }}"
                                placeholder="Enter amount, if you have zero donation just put 0" required>

                            @error('last_to_last_year_revenue_lakh')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                </div>

            </div>
            {{-- second card --}}
            <div class="card p-3 mb-3 p-md-4 border-0 rounded-3" id="non_profit_donation">

                <div class="inner-fields mt-md-4 small-label">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Donation Summary</h2>
                    </div>

                    @php
                        $govt = old('govt_grants', $operationalDetail->govt_grants ?? 0);
                        $foreign = old(
                            'foreign_donations_institutional',
                            $operationalDetail->foreign_donations_institutional ?? 0,
                        );
                        $promoters = old('promoters_money', $operationalDetail->promoters_money ?? 0);
                        $individual = old('individual_donations', $operationalDetail->individual_donations ?? 0);

                        $total = old('total_funding_lakh', $govt + $foreign + $promoters + $individual);
                    @endphp

                    <div class="row mb-md-2 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

                        <!-- Govt Grants -->
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Government Grants Received<span>*</span></label>

                            <input type="number" name="govt_grants"
                                class="form-control funding-input @error('govt_grants') is-invalid @enderror"
                                value="{{ $govt }}" placeholder="Enter Amount" required>

                            @error('govt_grants')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Foreign -->
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Foreign Donation Received (Institutional only)<span>*</span></label>

                            <input type="number" name="foreign_donations_institutional"
                                class="form-control funding-input @error('foreign_donations_institutional') is-invalid @enderror"
                                value="{{ $foreign }}" placeholder="Enter Amount" required>

                            @error('foreign_donations_institutional')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Promoters -->
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Promoters Money Donated<span>*</span></label>

                            <input type="number" name="promoters_money"
                                class="form-control funding-input @error('promoters_money') is-invalid @enderror"
                                value="{{ $promoters }}" placeholder="Enter Amount" required>

                            @error('promoters_money')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Individual -->
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Individual Donation<span>*</span></label>

                            <input type="number" name="individual_donations"
                                class="form-control funding-input @error('individual_donations') is-invalid @enderror"
                                value="{{ $individual }}" placeholder="Enter Amount" required>

                            @error('individual_donations')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- Total -->
                <div class="row two-col-text mt-4 mb-2">
                    <div class="col-12 text-start text-md-end">
                        <p class="mb-0">Total Funding Received Till Date (₹ Lakh)</p>
                        <p id="totalFundingDisplay">{{ number_format($total, 2) }} Lakh</p>
                    </div>
                </div>

                <!-- Hidden total field -->
                <input type="hidden" name="total_funding_lakh" id="totalFundingInput" value="{{ $total }}">

            </div>

            <div class="card p-3 mb-3 p-md-4 border-0 rounded-3" id="profit_donation">

                <div class="inner-fields mt-md-4 small-label">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Funding Summary</h2>
                    </div>

                    @php
                        $grants = old('grants_received', $operationalDetail->grants_received ?? 0);
                        $equity = old('equity_raised', $operationalDetail->equity_raised ?? 0);
                        $bootstrapped = old(
                            'bootstrapped_friends_family',
                            $operationalDetail->bootstrapped_friends_family ?? 0,
                        );
                        $debt = old('debt', $operationalDetail->debt ?? 0);

                        $total = old('total_funding_lakh', $grants + $equity + $bootstrapped + $debt);
                    @endphp

                    <div class="row mb-md-2 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

                        <!-- Grants -->
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Grants Received<span>*</span></label>

                            <input type="number" name="grants_received"
                                class="form-control funding-input @error('grants_received') is-invalid @enderror"
                                value="{{ $grants }}" placeholder="Enter Amount" required>

                            @error('grants_received')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Equity -->
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Equity Based<span>*</span></label>

                            <input type="number" name="equity_raised"
                                class="form-control funding-input @error('equity_raised') is-invalid @enderror"
                                value="{{ $equity }}" placeholder="Enter Amount" required>

                            @error('equity_raised')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bootstrapped -->
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Bootstrapped + Friends & Family<span>*</span></label>

                            <input type="number" name="bootstrapped_friends_family"
                                class="form-control funding-input @error('bootstrapped_friends_family') is-invalid @enderror"
                                value="{{ $bootstrapped }}" placeholder="Enter Amount" required>

                            @error('bootstrapped_friends_family')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Debt -->
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Debt<span>*</span></label>

                            <input type="number" name="debt"
                                class="form-control funding-input @error('debt') is-invalid @enderror"
                                value="{{ $debt }}" placeholder="Enter Amount" required>

                            @error('debt')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- Total -->
                <div class="row two-col-text justify-content-md-between align-items-center mt-4 mb-2">
                    <div class="col-12 col-md-6 text-start">
                        <p class="mb-0 fw-bold">Total Funding Received Till Date (₹ Lakh)</p>
                    </div>
                    <div class="col-12 col-md-6 text-start text-md-end">
                        <p class="mb-0 fw-bold" id="profitTotalDisplay">{{ number_format($total, 2) }} Lakh</p>
                    </div>
                </div>

                <!-- Hidden total -->
                <input type="hidden" name="total_funding_lakh" id="profitTotalInput" value="{{ $total }}">

            </div>

            {{-- third card --}}
            <div class="card p-0 border-0 rounded-3">
                <div class="inner-fields d-flex justify-content-between align-items-center p-3 p-md-4">
                    <div class="">
                        <h2 class="inner-title mb-0">Major Institutional Funders</h2>
                    </div>
                    <div class="btn-wrap">
                        <button type="button" class="btn btn-primary add-fund" id="addFunderBtn" data-bs-toggle="modal"
                            data-bs-target="#funderModal">
                            Add Funders
                        </button>
                    </div>
                </div>
                <div class="table-wrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SN</th>
                                <th scope="col">Funder Name</th>
                                <th scope="col">Year</th>
                                <th scope="col">Amount (₹00.00 Lakh)</th>
                                <th scope="col" class="">Actions</th>

                            </tr>
                        </thead>
                        <tbody id="fundersTable">

                        </tbody>
                    </table>
                </div>

            </div>
            <div
                class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 mt-4 steps-btn pe-lg-4 flex-wrap">
                <div class="btn-wrap">
                    <button type="button" class="btn simple-btn">Back</button>
                </div>
                <div class="btn-wrap">
                    <button type="button" id="continueBtn" class="btn btn-primary">Continue</button>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="funderModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title mb-0">Add Funder</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="funderForm">
                        <input type="hidden" id="funder_id">
                        <div class="mb-3">
                            <label>Funder Name</label>
                            <input type="text" class="form-control" id="funder_name">
                        </div>
                        <div class="mb-3">
                            <label>Year</label>
                            <input type="number" class="form-control" id="funder_year">
                        </div>
                        <div class="mb-3">
                            <label>Amount</label>
                            <input type="number" class="form-control" id="funder_amount">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveFunder">Save</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h3 class="modal-title mb-0">Consent & Declaration</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-3 p-md-4">
                    <p>By registering and submitting information on Fundink, I hereby declare and agree that:</p>
                    <div class="consent-box">

                        <label class="check-item">
                            <input type="checkbox" class="consent-checkbox">
                            <p>All information provided by our organization — including organization details, PAN, statutory
                                registrations, governance structure, geographical coverage, domain expertise, project track
                                record, and financial records (including institutional, foreign, and individual donations,
                                and total turnover) — is true, accurate, and complete to the best of my knowledge.</p>
                        </label>

                        <label class="check-item">
                            <input type="checkbox" class="consent-checkbox">
                            <p>I authorize Fundink to collect, store, process, analyze, and present this information to
                                verified funders, CSR entities, philanthropies, impact investors, financial institutions,
                                and ecosystem partners for the purpose of fundraising, due diligence, evaluation, and
                                collaboration.</p>
                        </label>

                        <div class="check-item">
                            <input type="checkbox" class="consent-checkbox">
                            <div>I expressly consent to Fundink conducting verification and due diligence checks, including
                                but not limited to:

                                <ul class="sub-list">
                                    <li>PAN validation</li>
                                    <li>Statutory registration verification</li>
                                    <li>Background and compliance checks</li>
                                    <li>Credit bureau checks using the organization’s PAN, where applicable, for the purpose
                                        of financial assessment and risk evaluation</li>
                                </ul>
                            </div>
                        </div>

                        <div class="check-item">
                            <input type="checkbox" class="consent-checkbox">
                            <div>I grant Fundink the right to use our organization’s details for:

                                <ul class="sub-list">
                                    <li>Fundraising campaigns and curated funding calls</li>
                                    <li>Promotional materials, website listings, newsletters, and social media communication
                                    </li>
                                    <li>Investor/funder presentations and ecosystem reports</li>
                                    <li>Showcasing case studies and impact highlights</li>
                                </ul>
                            </div>
                        </div>

                        <label class="check-item">
                            <input type="checkbox" class="consent-checkbox">
                            <p>I consent to receive communication from Fundink regarding funding opportunities, partnership
                                introductions, events, workshops, ecosystem updates, and promotional announcements via
                                email, phone, or other digital channels.</p>
                        </label>

                        <label class="check-item">
                            <input type="checkbox" class="consent-checkbox">
                            <p>I acknowledge that registration on Fundink does not guarantee funding, grants, investment, or
                                partnership confirmation.</p>
                        </label>

                        <label class="check-item">
                            <input type="checkbox" class="consent-checkbox">
                            <p>I confirm that I am an authorized representative of the organization and legally empowered to
                                provide this declaration and consent on behalf of the organization.</p>
                        </label>

                        <label class="check-item">
                            <input type="checkbox" class="consent-checkbox">
                            <p>I understand that Fundink will take reasonable measures to safeguard sensitive information
                                and will share confidential data strictly with relevant stakeholders for legitimate
                                evaluation, risk assessment, and fundraising purposes.</p>
                        </label>
                        <label class="check-item bg-light p-2 rounded-3 final-check align-items-center">
                            <input type="checkbox" class="consent-checkbox">
                            <p>I have read, understood, and agree to the above Consent & Declaration.</p>
                        </label>
                    </div>
                </div>
                <div
                    class="modal-footer d-flex justify-content-center justify-content-md-end gap-2 gap-md-2 pt-0 p-4 steps-btn flex-wrap border-0">
                    <div class="btn-wrap">
                        <button type="button" class="btn simple-btn" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    <div class="btn-wrap">
                        <button type="submit" form="onboardingForm" id="finalSubmit" class="btn btn-primary"
                            disabled>Submit
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
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
        var myModal = document.getElementById('staticBackdrop')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            if (myInput) {
                myInput.focus()
            }
        })
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

                sections[active].forEach(el => {
                    if (!el) return;
                    el.style.display = 'block';
                    el.querySelectorAll('input,select,textarea').forEach(i => i.disabled = false);
                });

                sections[inactive].forEach(el => {
                    if (!el) return;
                    el.style.display = 'none';
                    el.querySelectorAll('input,select,textarea').forEach(i => i.disabled = true);
                });

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
            const form = document.querySelector("form");
            const continueBtn = document.getElementById("continueBtn");
            const modalElement = document.getElementById("staticBackdrop");

            // Use a safe check so the script doesn't crash if the element is missing
            if (modalElement) {
                const modal = new bootstrap.Modal(modalElement);
                const consentCheckboxes = document.querySelectorAll(".consent-checkbox");
                const submitBtn = document.getElementById("finalSubmit");

                // Continue button validation
                if (continueBtn) {
                    continueBtn.addEventListener("click", function() {
                        if (!form.checkValidity()) {
                            form.reportValidity();
                            return;
                        }
                        modal.show();
                    });
                }

                // Enable submit only if all checkboxes checked
                consentCheckboxes.forEach(cb => {
                    cb.addEventListener("change", function() {
                        const allChecked = [...consentCheckboxes].every(c => c.checked);
                        if (submitBtn) {
                            submitBtn.disabled = !allChecked;
                        }
                    });
                });
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
                update: "/funders/", // expects /funders/{id}
                delete: "/funders/" // expects /funders/{id}
            };

            let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            /* =========================
               LOAD
            ========================= */
            function loadFunders() {
                fetch(API.list)
                    .then(res => res.json())
                    .then(res => {
                        fundersTable.innerHTML = '';

                        res.data.forEach((funder, index) => {
                            fundersTable.innerHTML += `
                        <tr data-id="${funder.id}">
                            <td>${index + 1}</td>
                            <td>${funder.name}</td>
                            <td>${funder.year}</td>
                            <td>${Number(funder.amount).toLocaleString()}</td>
                            <td class="">
                                <button  type='button' class="edit editFunder"><i class="bi bi-pencil-square"></i></button>
                                <button type='button' class="trash deleteFunder"><i class="bi bi-trash3"></i></button>
                            </td>
                        </tr>`;
                        });
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
                }).then(res => res.json());
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
                }).then(res => res.json());
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
                }).then(res => res.json());
            }

            /* =========================
               OPEN MODAL (ADD)
            ========================= */
            document.getElementById('addFunderBtn').addEventListener('click', () => {
                document.getElementById('funderForm').reset();
                document.getElementById('funder_id').value = '';
            });

            /* =========================
               SAVE (decides ADD or UPDATE)
            ========================= */
            document.getElementById('saveFunder').addEventListener('click', async (e) => {
                e.preventDefault();

                let id = document.getElementById('funder_id').value;

                let data = {
                    name: document.getElementById('funder_name').value,
                    year: document.getElementById('funder_year').value,
                    amount: document.getElementById('funder_amount').value
                };

                try {
                    if (id) {
                        await updateFunder(id, data);
                    } else {
                        await addFunder(data);
                    }

                    funderModal.hide();
                    loadFunders();

                } catch (err) {
                    console.error("Error saving funder:", err);
                }
            });

            /* =========================
               EDIT CLICK
            ========================= */
            document.addEventListener('click', (e) => {
                if (e.target.classList.contains('editFunder')) {

                    let row = e.target.closest('tr');

                    document.getElementById('funder_id').value = row.dataset.id;
                    document.getElementById('funder_name').value = row.children[1].innerText;
                    document.getElementById('funder_year').value = row.children[2].innerText;
                    document.getElementById('funder_amount').value =
                        row.children[3].innerText.replace(/,/g, '');

                    funderModal.show();
                }
            });

            /* =========================
               DELETE CLICK
            ========================= */
            document.addEventListener('click', async (e) => {
                if (e.target.classList.contains('deleteFunder')) {

                    let row = e.target.closest('tr');
                    let id = row.dataset.id;

                    if (!confirm("Delete this funder?")) return;

                    try {
                        await deleteFunder(id);
                        loadFunders();
                    } catch (err) {
                        console.error("Delete failed:", err);
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

                // ✅ FIX: Set correct label on page load
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
@endsection
