@extends('layouts.dashboard')

@section('content')
    <div class="card-body p-0">
        <form method="POST" action="{{ route('onboarding.step2.store') }}">
            @csrf
            <div class="card p-3 p-md-4 border-0 mb-3 rounded-3">
                <div class="mb-4">
                    <h1 class="top-heading mb-0">Organization type</h1>
                </div>
                <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Are you a:<span>*</span></label>

                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control @error('role') is-invalid @enderror">
                                {{ old('role') ? ucfirst(str_replace('_', ' ', old('role'))) : 'Select an option' }}
                            </div>

                            <ul class="select-list">
                                <li data-value="funder">Non-profit Organization</li>
                                <li data-value="funder">Non-profit Organization</li>
                                <li data-value="funder">Non-profit Organization</li>
                            </ul>

                            <input type="hidden" name="role" class="hidden-select" value="{{ old('role') }}">
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
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                {{--  --}}
                <div class="inner-fields mt-4">
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
                                    <li data-value="funder">Non-profit Organization</li>
                                    <li data-value="funder">Non-profit Organization</li>
                                    <li data-value="funder">Non-profit Organization</li>
                                </ul>

                                <input type="hidden" name="role" class="hidden-select" value="{{ old('role') }}">
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
                <hr class="mb-0">
                {{--  --}}
                <div class="inner-fields mt-4">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Track Record</h2>
                    </div>
                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Years of Operation<span>*</span></label>
                            <input type="date" name="year_of_operation" class="form-control"
                                placeholder="Enter in months " required>
                        </div>
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Total Beneficiaries Served<span>*</span></label>
                            <input type="text" name="Total_Beneficiaries" class="form-control"
                                placeholder="Only numbers shall be taken as input..." required>
                        </div>
                        <div class="col-12 px-md-2">
                            <div class="textarea-label d-flex justify-content-between gap-1">
                                <label class="form-label ">Key Achievements<span>*</span> </label>
                                <p class="font-small">Word Limit: 100</p>
                            </div>

                            <textarea maxlength="500" rows="5" cols="50" class="form-control" placeholder="Enter Achievements"></textarea>
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                {{--  --}}
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
                            <input type="number" name="Total_Beneficiaries" class="form-control"
                                placeholder="Enter Amount" required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Last to Last Year Turnover (₹ Lakh)<span>*</span></label>
                            <input type="number" name="Last_Year_Turnover" class="form-control"
                                placeholder="Enter Amount" required>
                        </div>
                    </div>
                </div>

            </div>
            {{-- second card --}}
            <div class="card p-3 mb-3 p-md-4 border-0 rounded-3">
                <div class="inner-fields mt-md-4 small-label">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Donation summary</h2>
                    </div>
                    <div class="row mb-md-2 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Government Grants Received<span>*</span></label>
                            <input type="number" name="Government" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Foreign Donation Received (Institutional only)<span>*</span></label>
                            <input type="number" name="Foreign" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Promoters Money Donated<span>*</span></label>
                            <input type="number" name="Promoters" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Individual Donation<span>*</span></label>
                            <input type="number" name="Individual" class="form-control" placeholder="Enter Amount"
                                required>
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

            {{-- third card --}}
            <div class="card p-0 border-0 rounded-3">
                <div class="inner-fields d-flex justify-content-between align-items-center p-3 p-md-4">
                    <div class="">
                        <h2 class="inner-title mb-0">Major Institutional Funders</h2>
                    </div>
                    <div class="btn-wrap">
                        <button type="submit" class="btn btn-primary add-fund">Add Funders</button>
                    </div>
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
                        <tbody>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">Continue</button>
                </div>
            </div>

        </form>
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
                            <input type="checkbox">
                            <p>All information provided by our organization — including organization details, PAN, statutory
                                registrations, governance structure, geographical coverage, domain expertise, project track
                                record, and financial records (including institutional, foreign, and individual donations,
                                and total turnover) — is true, accurate, and complete to the best of my knowledge.</p>
                        </label>

                        <label class="check-item">
                            <input type="checkbox">
                            <p>I authorize Fundink to collect, store, process, analyze, and present this information to
                                verified funders, CSR entities, philanthropies, impact investors, financial institutions,
                                and ecosystem partners for the purpose of fundraising, due diligence, evaluation, and
                                collaboration.</p>
                        </label>

                        <div class="check-item">
                            <input type="checkbox">
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
                            <input type="checkbox">
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
                            <input type="checkbox">
                            <p>I consent to receive communication from Fundink regarding funding opportunities, partnership
                                introductions, events, workshops, ecosystem updates, and promotional announcements via
                                email, phone, or other digital channels.</p>
                        </label>

                        <label class="check-item">
                            <input type="checkbox">
                            <p>I acknowledge that registration on Fundink does not guarantee funding, grants, investment, or
                                partnership confirmation.</p>
                        </label>

                        <label class="check-item">
                            <input type="checkbox">
                            <p>I confirm that I am an authorized representative of the organization and legally empowered to
                                provide this declaration and consent on behalf of the organization.</p>
                        </label>

                        <label class="check-item">
                            <input type="checkbox">
                            <p>I understand that Fundink will take reasonable measures to safeguard sensitive information
                                and will share confidential data strictly with relevant stakeholders for legitimate
                                evaluation, risk assessment, and fundraising purposes.</p>
                        </label>
                        <label class="check-item bg-light p-2 rounded-3 final-check align-items-center">
                            <input type="checkbox">
                            <p>I have read, understood, and agree to the above Consent & Declaration.</p>
                        </label>
                    </div>
                </div>
                <div
                    class="modal-footer d-flex justify-content-center justify-content-md-end gap-2 gap-md-2 pt-0 p-4 steps-btn flex-wrap border-0">
                    <div class="btn-wrap">
                        <button type="button" class="btn simple-btn">Cancel</button>
                    </div>
                    <div class="btn-wrap">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var myModal = document.getElementById('staticBackdrop')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            if (myInput) {
                myInput.focus()
            }
        })
    </script>
@endsection
