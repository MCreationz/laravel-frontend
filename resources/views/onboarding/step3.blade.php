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
                    <p>2. Office / Portal Address</p>
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
                <p>3. Not-for Profit/For Profit</p>
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
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Are you a:<span>*</span></label>

                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control @error('organization_type') is-invalid @enderror">
                                {{ old('organization_type') ? ucfirst(str_replace('_', ' ', old('organization_type'))) : 'Select an option' }}
                            </div>

                            <ul class="select-list">
                                <li data-value="society">Society</li>
                                <li data-value="trust">Trust</li>
                                <li data-value="section_8_company">Section 8 Company</li>
                            </ul>

                            <input type="hidden" name="organization_type" class="hidden-select"
                                value="{{ old('organization_type') }}">
                        </div>

                        @error('role')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">State<span>*</span></label>
                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control">Select State</div>
                            <ul class="select-list">
                                <li data-value="Delhi">Delhi</li>
                                <li data-value="Mumbai">Mumbai</li>
                                <li data-value="Bengaluru">Bengaluru</li>
                                <li data-value="Hyderabad">Hyderabad</li>
                                <li data-value="Chennai">Chennai</li>
                                <li data-value="Kolkata">Kolkata</li>
                                <li data-value="Pune">Pune</li>
                                <li data-value="Ahmedabad">Ahmedabad</li>
                                <li data-value="Jaipur">Jaipur</li>
                                <li data-value="Chandigarh">Chandigarh</li>
                            </ul>
                             <input type="hidden" name="state" class="hidden-select"
                                value="{{ old('state') }}">
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                {{-- --}}
                <div class="inner-fields mt-4" id="section_non_profit">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Non-profit Organization</h2>
                    </div>
                    <div class="row mb-4 pb-1 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 col-xl-5 px-md-2">
                            <label class="form-label">Registration Type<span>*</span></label>

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control @error('role') is-invalid @enderror">
                                    {{ old('role') ? ucfirst(str_replace('_', ' ', old('role'))) : 'Select' }}
                                </div>

                                <ul class="select-list">
                                    <li data-value="non_profit">Non Profit</li>
                                    <li data-value="profit">For Profit</li>
                                </ul>

                                <input type="hidden" name="registration_type" class="hidden-select">

                            </div>

                            @error('role')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 col-xl-5 px-md-2">
                            <label class="form-label">Domain of Expertise<span>*</span></label>
                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Select</div>
                                <ul class="select-list">
                                    <li data-value="Delhi">Delhi</li>
                                    <li data-value="Mumbai">Mumbai</li>
                                    <li data-value="Bengaluru">Bengaluru</li>
                                    <li data-value="Hyderabad">Hyderabad</li>
                                    <li data-value="Chennai">Chennai</li>
                                    <li data-value="Kolkata">Kolkata</li>
                                    <li data-value="Pune">Pune</li>
                                    <li data-value="Ahmedabad">Ahmedabad</li>
                                    <li data-value="Jaipur">Jaipur</li>
                                    <li data-value="Chandigarh">Chandigarh</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row toggle-container mb-3">
                        <div class="col-auto toggle-item">
                            <span>12A Status</span>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="col-auto toggle-item">
                            <span>80G Status</span>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="col-auto toggle-item">
                            <span>FCRA Status</span>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="col-auto toggle-item">
                            <span>CSR-1 Registration</span>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="inner-fields mt-4" id="section_profit" style="display: none;">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">For-Profit Organization</h2>
                    </div>

                    <div class="row mb-4 pb-1 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-4 col-xl-4 px-md-2">
                            <label class="form-label">Registration Type<span>*</span></label>
                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Select</div>
                                <ul class="select-list">
                                    <li data-value="private_limited">Private Limited</li>
                                    <li data-value="proprietorship">Proprietorship</li>
                                    <li data-value="partnership">Partnership</li>
                                </ul>
                                <input type="hidden" name="registration_type" class="hidden-select">
                            </div>
                        </div>

                        <div class="col-12 col-md-4 col-xl-4 px-md-2">
                            <label class="form-label">Current Stage<span>*</span></label>
                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Select</div>
                                <ul class="select-list">
                                    <li data-value="ideation">Ideation</li>
                                    <li data-value="mvp">MVP</li>
                                    <li data-value="scaling">Scaling</li>
                                </ul>
                                <input type="hidden" name="current_stage" class="hidden-select">
                            </div>
                        </div>

                        <div class="col-12 col-md-4 col-xl-4 px-md-2">
                            <label class="form-label">You idea/product fall in:<span>*</span></label>
                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Select</div>
                                <ul class="select-list">
                                    <li data-value="tech">Technology</li>
                                    <li data-value="healthcare">Healthcare</li>
                                    <li data-value="edutech">EduTech</li>
                                </ul>
                                <input type="hidden" name="product_category" class="hidden-select">
                            </div>
                        </div>
                    </div>

                    <div class="row toggle-container mb-3">
                        <div class="col-auto toggle-item d-flex align-items-center gap-2">
                            <span>DPIIT Recognition</span>
                            <label class="switch">
                                <input type="checkbox" name="dpiit_recognition" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="col-auto toggle-item d-flex align-items-center gap-2">
                            <span>MSME Registered</span>
                            <label class="switch">
                                <input type="checkbox" name="msme_registered" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="col-auto toggle-item d-flex align-items-center gap-2">
                            <span>GSTIN Registration</span>
                            <label class="switch">
                                <input type="checkbox" name="gstin_registration" checked>
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
                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Years of Operation<span>*</span></label>
                            <input type="date" name="year_of_operation" class="form-control" placeholder="Enter in months "
                                required>
                        </div>
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Total Beneficiaries Served<span>*</span></label>
                            <input type="number" name="Total_Beneficiaries" class="form-control"
                                placeholder="Only numbers shall be taken as input..." required>
                        </div>
                        <div class="col-12 px-md-2">
                            <div class="textarea-label d-flex justify-content-between gap-1">
                                <label class="form-label ">Key Achievements<span>*</span> </label>
                                <p class="font-small">Word Limit: 100</p>
                            </div>

                            <textarea maxlength="500" rows="5" cols="50" class="form-control"
                                placeholder="Enter Achievements"></textarea>
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                {{-- --}}
                <div class="inner-fields mt-4 small-label">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Financial Record</h2>
                    </div>
                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Lifetime Turnover since Incorporation (₹ Lakh)<span>*</span></label>
                            <input type="number" name="Incorporation" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Ongoing Year Turnover (till last month) (₹
                                Lakh)<span>*</span></label>
                            <input type="number" name="Year_Turnover" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Last Year Turnover (₹ Lakh)<span>*</span></label>
                            <input type="number" name="Total_Beneficiaries" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Last to Last Year Turnover (₹ Lakh)<span>*</span></label>
                            <input type="number" name="Last_Year_Turnover" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                    </div>
                </div>

            </div>
            {{-- second card --}}
            <div class="card p-3 mb-3 p-md-4 border-0 rounded-3" id="non_profit_donation">
                <div class="inner-fields mt-md-4 small-label">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Donation summary</h2>
                    </div>
                    <div class="row mb-md-2 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Government Grants Received<span>*</span></label>
                            <input type="number" name="Government" class="form-control" placeholder="Enter Amount" required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Foreign Donation Received (Institutional only)<span>*</span></label>
                            <input type="number" name="Foreign" class="form-control" placeholder="Enter Amount" required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Promoters Money Donated<span>*</span></label>
                            <input type="number" name="Promoters" class="form-control" placeholder="Enter Amount" required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Individual Donation<span>*</span></label>
                            <input type="number" name="Individual" class="form-control" placeholder="Enter Amount" required>
                        </div>
                    </div>
                </div>
                <div class="row two-col-text justify-content-md-between align-items-center mt-4 mb-2">
                    <div class="col-12 col-md-6 text-start">
                        <p class="mb-0">Total Funding Received Till Date (₹ Lakh)</p>
                    </div>
                    <div class="col-12 col-md-6 text-start text-md-end">
                        <p>0000.00 Lakh</p>
                    </div>
                </div>
            </div>

            <div class="card p-3 mb-3 p-md-4 border-0 rounded-3" id="profit_donation">
                <div class="inner-fields mt-md-4 small-label">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Donation Summary</h2>
                    </div>

                    <div class="row mb-md-2 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Grants Received<span>*</span></label>
                            <input type="number" name="grants_received" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Equity Based<span>*</span></label>
                            <input type="number" name="equity_based" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Bootstrapped + Friends & Family<span>*</span></label>
                            <input type="number" name="bootstrapped_friends_family" class="form-control"
                                placeholder="Enter Amount" required>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Debt<span>*</span></label>
                            <input type="number" name="debt_funding" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                    </div>
                </div>

                <div class="row two-col-text justify-content-md-between align-items-center mt-4 mb-2">
                    <div class="col-12 col-md-6 text-start">
                        <p class="mb-0 fw-bold">Total Funding Received Till Date (₹ Lakh)</p>
                    </div>
                    <div class="col-12 col-md-6 text-start text-md-end">
                        <p class="mb-0 fw-bold">0000.00 Lakh</p>
                    </div>
                </div>
            </div>

            {{-- third card --}}
            <div class="card p-0 border-0 rounded-3">
                <div class="inner-fields d-flex justify-content-between align-items-center p-3 p-md-4">
                    <div class="">
                        <h2 class="inner-title mb-0">Major Institutional Funders</h2>
                    </div>
                    <div class="btn-wrap">
<button type="button" class="btn btn-primary add-fund" id="addFunderBtn">
    Add Funders
</button>                    </div>
                </div>
                <div class="table-wrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S No.</th>
                                <th scope="col">Funder Name</th>
                                <th scope="col">Year</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody id="fundersTable">
                            <tr>
                                <td>1.</td>
                                <td>Mukesh Sharma</td>
                                <td>2026</td>
                                <td>2,00,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div
                class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 mt-4 steps-btn pe-lg-4 flex-wrap">
                <div class="btn-wrap">
                    <button type="button" class="btn simple-btn">Cancel</button>
                </div>
                <div class="btn-wrap">
                    <button type="button" id="continueBtn" class="btn btn-primary">Continue</button>
                </div>
            </div>

        </form>
    </div>



    <div class="modal fade" id="funderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Funder</h5>
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
                <button class="btn btn-primary" id="saveFunder">Save</button>
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
                        <button type="submit" form="onboardingForm" id="finalSubmit" class="btn btn-primary" disabled>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var myModal = document.getElementById('staticBackdrop')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            if (myInput) {
                myInput.focus()
            }
        })
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Find the NON PROFIT registration dropdown
            const roleWrapper = document.querySelector('#section_non_profit input[name="registration_type"]').closest('.select-wrapper');

            const roleInput = roleWrapper.querySelector('input[name="registration_type"]');
            const selectItems = roleWrapper.querySelectorAll('.select-list li');
            const customSelectDisplay = roleWrapper.querySelector('.custom-select');

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
                    customSelectDisplay.textContent = text;
                }
            }

            selectItems.forEach(item => {
                item.addEventListener('click', function (e) {

                    e.stopPropagation();

                    const value = this.dataset.value;
                    const text = this.textContent;

                    roleInput.value = value;

                    updateUI(value, text);
                });
            });

            updateUI(roleInput.value || 'non_profit');

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const form = document.querySelector("form");
            const continueBtn = document.getElementById("continueBtn");
            const modalElement = document.getElementById("staticBackdrop");
            const modal = new bootstrap.Modal(modalElement);

            const consentCheckboxes = document.querySelectorAll(".consent-checkbox");
            const submitBtn = document.getElementById("finalSubmit");

            // Continue button validation
            continueBtn.addEventListener("click", function () {

                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                modal.show();
            });

            // Enable submit only if all checkboxes checked
            consentCheckboxes.forEach(cb => {
                cb.addEventListener("change", function () {

                    const allChecked = [...consentCheckboxes].every(c => c.checked);

                    submitBtn.disabled = !allChecked;

                });
            });

        });
    </script>




@endsection

@section('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {
console.log('loaded')
let funderModal = new bootstrap.Modal(document.getElementById('funderModal'))

let fundersTable = document.getElementById('fundersTable')
let API = {
    list: "{{ route('funders.index') }}",
    store: "{{ route('funders.store') }}",
    update: "/funders/",
    delete: "/funders/"
}

let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

/* =========================
   Load Funders
========================= */

function loadFunders(){

    fetch(API.list)
    .then(res => res.json())
    .then(res => {

        fundersTable.innerHTML = ''

        res.data.forEach((funder,index)=>{

            fundersTable.innerHTML += `
            <tr data-id="${funder.id}">
                <td>${index+1}</td>
                <td>${funder.name}</td>
                <td>${funder.year}</td>
                <td>${Number(funder.amount).toLocaleString()}</td>
                <td>
                    <button class="btn btn-sm btn-warning editFunder">Edit</button>
                    <button class="btn btn-sm btn-danger deleteFunder">Delete</button>
                </td>
            </tr>`
        })
    })

}

/* =========================
   Open Add Modal
========================= */

document.getElementById('addFunderBtn').addEventListener('click',()=>{

    document.getElementById('funderForm').reset()
    document.getElementById('funder_id').value=''

    funderModal.show()

})


/* =========================
   Save Funder (Add / Update)
========================= */

document.getElementById('saveFunder').addEventListener('click',()=>{

    let id = document.getElementById('funder_id').value

    let data = {
        name: document.getElementById('funder_name').value,
        year: document.getElementById('funder_year').value,
        amount: document.getElementById('funder_amount').value
    }

    let url = id ? API.update+id : API.store
    let method = id ? 'PUT' : 'POST'

    fetch(url,{
        method:method,
        headers:{
            "Content-Type":"application/json",
            "X-CSRF-TOKEN":csrf
        },
        body:JSON.stringify(data)
    })
    .then(res=>res.json())
    .then(res=>{

        funderModal.hide()
        loadFunders()

    })

})


/* =========================
   Edit Funder
========================= */

document.addEventListener('click',(e)=>{

    if(e.target.classList.contains('editFunder')){

        let row = e.target.closest('tr')

        document.getElementById('funder_id').value = row.dataset.id
        document.getElementById('funder_name').value = row.children[1].innerText
        document.getElementById('funder_year').value = row.children[2].innerText
        document.getElementById('funder_amount').value = row.children[3].innerText.replace(/,/g,'')

        funderModal.show()

    }

})


/* =========================
   Delete Funder
========================= */

document.addEventListener('click',(e)=>{

    if(e.target.classList.contains('deleteFunder')){

        let row = e.target.closest('tr')
        let id = row.dataset.id

        if(!confirm("Delete this funder?")) return

        fetch(API.delete+id,{
            method:'DELETE',
            headers:{
                "X-CSRF-TOKEN":csrf
            }
        })
        .then(res=>res.json())
        .then(res=>{
            loadFunders()
        })

    }

})


/* =========================
   Initial Load
========================= */

loadFunders()
});
</script>

@endsection
