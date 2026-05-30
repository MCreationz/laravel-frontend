@extends('client-admin.layouts.app')

@section('title', 'Funds')

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
                    <p>Fund Detail Overview</p>
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
                    <p>Funding Snapshot</p>
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
                <p>Questionnaire</p>
            </div>

        </div>
    </div>
    <div class="">
        <div class="card-body p-0">
            <form id="step1Form" method="POST">
                @csrf
                <div style="border-radius:8px 8px 0px 0px;" class="card border-0">
                    <div class="p-3 p-md-4">
                        <div class="mb-4">
                            <h1 class="top-heading mb-0">Eligibility</h1>
                        </div>
                        <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                            <div class="col-12-4 px-md-2">
                                <label class="form-label">Eligible States<span>*</span></label>
                                <div class="select-wrapper w-100 position-relative checkbox-wrap">
                                    <!-- Selected Items -->
                                    <div id="selectedStatesBox"
                                        class="custom-select form-control d-flex flex-wrap gap-2 align-items-center">
                                        <span class="placeholder">Select States</span>
                                    </div>
                                    <ul class="select-list checkbox-list">
                                        <li><input type="checkbox" value="Pan India" id="s0"><label
                                                for="s0">Pan
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
                                        <li><input type="checkbox" value="Tamil Nadu" id="s23"><label
                                                for="s23">Tamil
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
                                        <li><input type="checkbox" value="West Bengal" id="s28"><label
                                                for="s28">West
                                                Bengal</label></li>

                                    </ul>

                                    <input type="hidden" name="state" id="hiddenStates" required>
                                </div>

                                @error('state')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 px-md-2">
                                <label class="form-label">Eligibility Instruction<span>*</span></label>
                                <textarea placeholder="Enter Eligibility Instruction" class="form-control" style="min-height: 99px"></textarea>
                            </div>
                        </div>
                        <div class="toggle-container d-flex mb-3 justify-content-start gap-2">
                            <div class="col-auto toggle-item">
                                <div class="toggle-wrap">
                                    <span class="font-small">NPO</span>
                                    <label class="switch mb-0">
                                        <input type="hidden" name="dpiit_registration" value="0">
                                        <input type="checkbox" name="dpiit_registration" value="1">

                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto toggle-item">
                                <div class="toggle-wrap">
                                    <span class="font-small">Startup</span>
                                    <label class="switch mb-0">
                                        <input type="hidden" name="dpiit_registration" value="0">
                                        <input type="checkbox" name="dpiit_registration" value="1">

                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{--  --}}
                        <div class="mt-4 mb-4">
                            <h2 class="top-heading mb-0">Funds Snapshot</h2>
                        </div>
                        <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                            <div class="col-12 col-md-6 px-md-2">
                                <label class="form-label">Fund Outlay (₹ Crore)<span>*</span></label>
                                <input type="text" name="" class="form-control"
                                    placeholder="Enter Fund Outlay (₹ Crore)" value="">
                                <div class="error-message text-danger" style="display:none;"></div>
                            </div>
                            <div class="col-12 col-md-6 px-md-2">
                                <label class="form-label">Fund Type<span>*</span></label>
                                <input type="text" name="" class="form-control" placeholder="Enter Fund Type"
                                    value="" required>
                                <div class="error-message text-danger" style="display:none;"></div>
                            </div>
                            <div class="col-12 px-md-2">
                                <label class="form-label">Single Entity Cap (₹ Crore)<span>*</span></label>
                                <input type="text" name="" class="form-control"
                                    placeholder="Enter Single Entity Cap (₹ Crore)" value="" required>
                                <div class="error-message text-danger" style="display:none;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="inner-fields d-flex justify-content-between align-items-center px-3 px-md-4 mb-3">
                            <div class="">
                                <h2 class="top-heading mb-0">Upload Documents:</h2>
                            </div>
                            <div class="btn-wrap">
                                <button type="button" class="btn btn-primary add-fund gradient-btn" id="addFunderBtn"
                                    data-bs-toggle="modal" data-bs-target="#funderModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ms-0 me-2" width="11"
                                        height="11" viewBox="0 0 11 11" fill="none">
                                        <path d="M5.125 0.75V9.5M9.5 5.125H0.75" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> Add Funders

                            </div>
                        </div>
                        <div class="table-wrap major-funders-table-wrap">
                            <table class="table major-funders-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Document Name</th>
                                        <th>Document Instructions</th>
                                        <th>Document Type</th>
                                        <th>Document Size (MB)</th>
                                    </tr>
                                </thead>
                                <tbody id="fundersTable">
                                    <tr>
                                        <td>12A Certificate</td>
                                        <td>Upload upto 25MB</td>
                                        <td>PDF</td>
                                        <td>25 MB</td>
                                    </tr>
                                    <tr>
                                        <td>80G Certificate</td>
                                        <td>Upload upto 155MB</td>
                                        <td>JPG/PNG</td>
                                        <td>155 MB</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="">
                        <div class="inner-fields d-flex justify-content-between align-items-center px-3 px-md-4 mb-3">
                            <div class="">
                                <h2 class="top-heading mb-0">Funding Domain</h2>
                            </div>
                            <div class="btn-wrap">
                                <button type="button" class="btn btn-primary add-fund gradient-btn" id="addFunderBtn"
                                    data-bs-toggle="modal" data-bs-target="#funderModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ms-0 me-2" width="11"
                                        height="11" viewBox="0 0 11 11" fill="none">
                                        <path d="M5.125 0.75V9.5M9.5 5.125H0.75" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> Add Funders

                            </div>
                        </div>
                        <div class="table-wrap major-funders-table-wrap">
                            <table class="table major-funders-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Theme Name</th>
                                        <th>Sub Theme</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody id="fundersTable">
                                    <tr>
                                        <td>Business Loan</td>
                                        <td>Loan Interests</td>
                                        <td>Lorem ipsum dolor sit amet consectetur. Gravida malesuada sed...</td>
                                    </tr>
                                    <tr>
                                        <td>Financial Advices</td>
                                        <td>Finance Advisory</td>
                                        <td>Potter ipsum wand elf parchment wingardium. Dagger diddykins.</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div style="border-radius:0px 0px 8px 8px;"
                        class="d-flex justify-content-center justify-content-md-end gap-2 mt-4 steps-btn pe-lg-4 flex-wrap">
                        <button type="button" class="btn btn-secondary"
                            onclick="window.location.href='http://127.0.0.1:8000/onboarding/step-2'">

                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">Next
                            </svg></button>
                    </div>

            </form>
        </div>
    </div>

    <div class="modal fade" id="clientAdminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header border-0 pb-0">
                    <div>
                        <!-- MODAL TITLE -->
                        <h2 class="modal-title mb-2 inner-title" id="clientAdminModalTitle">
                            Add Client Admin
                        </h2>
                        <p class="text-muted small mb-0">
                            CSR Foundation or VC Firm Account
                        </p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <!-- Body -->
                <div class="modal-body p-0">
                    <form id="clientAdminForm" action="{{ route('superadmin.client-admins.store') }}" method="POST">
                        @csrf
                        <div class="p-3">
                            <input type="hidden" name="client_admin_id" id="client_admin_id">
                            <!-- Organization -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Organization Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="organization_name"
                                        name="organization_name" placeholder="Enter here" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Organization Type
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="select-wrapper w-100 position-relative">

                                        <div
                                            class="custom-select form-control py-2 d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Select an option</span>
                                        </div>

                                        <input type="hidden" name="organization_type" id="organization_type" required>

                                        <ul class="select-list" style="display: none;">
                                            <li data-value="csr_foundation">CSR Foundation</li>
                                            <li data-value="vc_firm">VC Firm</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Primary Contact Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="primary_contact_name"
                                        name="primary_contact_name" placeholder="Enter here" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Email Address
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="email" class="form-control py-2" id="email" name="email"
                                        placeholder="Enter email address" required>
                                </div>
                            </div>
                            <!-- Phone + Password -->
                            <div class="row g-3 mb-3">

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Phone Number
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="phone_number"
                                        name="phone_number" placeholder="Enter here" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Password
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="password" class="form-control py-2" id="password" name="password"
                                        placeholder="Enter password" required>
                                </div>

                            </div>
                            <!-- State + Status -->
                            <div class="row g-3 mb-3">
                                <!-- State -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        State
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="select-wrapper w-100 position-relative">

                                        <div
                                            class="custom-select form-control py-2 d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Select State</span>
                                        </div>

                                        <input type="hidden" name="state" id="state" required>

                                        <ul class="select-list"
                                            style="display: none; max-height: 250px; overflow-y: auto;">

                                            <li data-value="Andhra Pradesh">Andhra Pradesh</li>
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

                                            <li data-value="Andaman and Nicobar Islands">
                                                Andaman and Nicobar Islands
                                            </li>

                                            <li data-value="Chandigarh">
                                                Chandigarh
                                            </li>

                                            <li data-value="Dadra and Nagar Haveli and Daman and Diu">
                                                Dadra and Nagar Haveli and Daman and Diu
                                            </li>

                                            <li data-value="Delhi">
                                                Delhi
                                            </li>

                                            <li data-value="Jammu and Kashmir">
                                                Jammu and Kashmir
                                            </li>

                                            <li data-value="Ladakh">
                                                Ladakh
                                            </li>

                                            <li data-value="Lakshadweep">
                                                Lakshadweep
                                            </li>

                                            <li data-value="Puducherry">
                                                Puducherry
                                            </li>

                                        </ul>

                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Status
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="select-wrapper w-100 position-relative">

                                        <div
                                            class="custom-select form-control py-2 d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Select Status</span>
                                        </div>

                                        <input type="hidden" name="status" id="status" required>

                                        <ul class="select-list" style="display: none;">
                                            <li data-value="verified">Verified</li>
                                            <li data-value="non_verified">Non-Verified</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div style="border-radius:0px 0px 8px 8px;"
                            class="modal-footer border-0 d-flex justify-content-center justify-content-md-end gap-2 steps-btn pe-lg-4 flex-wrap">
                            <button type="button" class="btn simple-btn m-0" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="clientAdminSubmitBtn" class="btn gradient-btn m-0">Save
                                Client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const form = document.getElementById("clientAdminForm");

            const modalTitle = document.getElementById("clientAdminModalTitle");

            const submitBtn = document.getElementById("clientAdminSubmitBtn");

            const clientAdminId = document.getElementById("client_admin_id");

            /*
            |--------------------------------------------------------------------------
            | Edit Button Click
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll(".edit-client-admin").forEach(button => {

                button.addEventListener("click", function() {

                    const id = this.dataset.id;

                    /*
                    |--------------------------------------------------------------------------
                    | Change Form Action
                    |--------------------------------------------------------------------------
                    */

                    form.action = this.dataset.updateUrl.replace(':id', id);

                    /*
                    |--------------------------------------------------------------------------
                    | Add PUT Method
                    |--------------------------------------------------------------------------
                    */

                    let methodInput = form.querySelector('input[name="_method"]');

                    if (!methodInput) {

                        methodInput = document.createElement("input");

                        methodInput.type = "hidden";
                        methodInput.name = "_method";

                        form.appendChild(methodInput);
                    }

                    methodInput.value = "PUT";

                    /*
                    |--------------------------------------------------------------------------
                    | Change Modal Content
                    |--------------------------------------------------------------------------
                    */

                    modalTitle.innerText = "Edit Client Admin";

                    submitBtn.innerText = "Update Client";

                    /*
                    |--------------------------------------------------------------------------
                    | Fill Fields
                    |--------------------------------------------------------------------------
                    */

                    clientAdminId.value = id;

                    document.getElementById("organization_name").value =
                        this.dataset.organization_name;

                    document.getElementById("primary_contact_name").value =
                        this.dataset.primary_contact_name;

                    document.getElementById("email").value =
                        this.dataset.email;

                    document.getElementById("phone_number").value =
                        this.dataset.phone_number;

                    document.getElementById("state").value =
                        this.dataset.state;

                    document.getElementById("status").value =
                        this.dataset.status;

                    document.getElementById("organization_type").value =
                        this.dataset.organization_type;

                    /*
                    |--------------------------------------------------------------------------
                    | Update Custom Select Texts
                    |--------------------------------------------------------------------------
                    */

                    updateCustomSelectText("organization_type", this.dataset.organization_type);
                    updateCustomSelectText("state", this.dataset.state);
                    updateCustomSelectText("status", this.dataset.status);

                    /*
                    |--------------------------------------------------------------------------
                    | Password Optional On Edit
                    |--------------------------------------------------------------------------
                    */

                    document.getElementById("password").required = false;
                });

            });

            /*
            |--------------------------------------------------------------------------
            | Reset Modal On Close
            |--------------------------------------------------------------------------
            */

            const modal = document.getElementById("clientAdminModal");

            modal.addEventListener("hidden.bs.modal", function() {

                form.reset();

                form.action = "{{ route('superadmin.client-admins.store') }}";

                modalTitle.innerText = "Add Client Admin";

                submitBtn.innerText = "Save Client";

                clientAdminId.value = "";

                /*
                |--------------------------------------------------------------------------
                | Remove PUT Method
                |--------------------------------------------------------------------------
                */

                const methodInput = form.querySelector('input[name="_method"]');

                if (methodInput) {
                    methodInput.remove();
                }

                /*
                |--------------------------------------------------------------------------
                | Reset Password Required
                |--------------------------------------------------------------------------
                */

                document.getElementById("password").required = true;

                /*
                |--------------------------------------------------------------------------
                | Reset Custom Select Labels
                |--------------------------------------------------------------------------
                */

                document.querySelectorAll(".custom-select span:first-child")
                    .forEach(span => {

                        if (span.closest(".select-wrapper")
                            .querySelector("#organization_type")) {

                            span.innerText = "Select an option";
                        }

                        if (span.closest(".select-wrapper")
                            .querySelector("#state")) {

                            span.innerText = "Select State";
                        }

                        if (span.closest(".select-wrapper")
                            .querySelector("#status")) {

                            span.innerText = "Select Status";
                        }

                    });

            });

            /*
            |--------------------------------------------------------------------------
            | Helper Function
            |--------------------------------------------------------------------------
            */

            function updateCustomSelectText(inputId, value) {

                const input = document.getElementById(inputId);

                const wrapper = input.closest(".select-wrapper");

                const textSpan = wrapper.querySelector(".custom-select span");

                const selectedOption = wrapper.querySelector(
                    `.select-list li[data-value="${value}"]`
                );

                if (selectedOption) {
                    textSpan.innerText = selectedOption.innerText;
                }
            }

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
