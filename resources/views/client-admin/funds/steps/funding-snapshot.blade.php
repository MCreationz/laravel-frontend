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
                                <button type="button" class="btn btn-primary add-fund gradient-btn" id="addThemeBtn"
                                    data-bs-toggle="modal" data-bs-target="#documentModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ms-0 me-2" width="11"
                                        height="11" viewBox="0 0 11 11" fill="none">
                                        <path d="M5.125 0.75V9.5M9.5 5.125H0.75" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> Add Documents

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
                                <button type="button" class="btn btn-primary add-fund gradient-btn" id="addDocumentsBtn"
                                    data-bs-toggle="modal" data-bs-target="#themeModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ms-0 me-2" width="11"
                                        height="11" viewBox="0 0 11 11" fill="none">
                                        <path d="M5.125 0.75V9.5M9.5 5.125H0.75" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> Add Theme

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

    <div class="modal fade" id="themeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h2 class="modal-title mb-2 inner-title" id="themeModalTitle">
                            Add Theme
                        </h2>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body p-0">
                    <form id="themeForm" action="" method="POST">
                        @csrf
                        <div class="p-3">
                            <input type="hidden" name="theme_id" id="theme_id">

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Theme Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control py-2" id="theme_name" name="theme_name"
                                        placeholder="Enter Theme Name" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Sub Theme
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control py-2" id="theme_code" name="theme_code"
                                        placeholder="Enter Sub Theme" required>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Description
                                    </label>
                                    <textarea type="text" class="form-control py-2" id="theme_description" name="description"
                                        placeholder="Enter Description" style="min-height:138px"></textarea>
                                </div>
                            </div>
                        </div>

                        <div style="border-radius:0px 0px 8px 8px;"
                            class="modal-footer border-0 d-flex justify-content-center justify-content-md-end gap-2 steps-btn pe-lg-4 flex-wrap">
                            <button type="button" class="btn simple-btn m-0" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="themeSubmitBtn" class="btn gradient-btn m-0">Save Theme</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- document add modal --}}
    <div class="modal fade" id="documentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pt-4 pb-3">
                    <div>
                        <h2 class="modal-title mb-2 inner-title" id="documentModalTitle">
                            Add Multiple Documents
                        </h2>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body p-0">
                    <form method="POST" action="{{ url('/client-admin/funds/funding-snapshot') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="docWrapper" class="px-3">
                            <!-- Document Block -->
                            <div class="doc-card mb-3 document">
                                <div
                                    class="d-flex justify-content-between mb-3 align-items-center document-heading px-2">
                                    <p class="doc-title fw-semibold mb-0">Document 1</p>
                                    <button type="button" class="trash-btn bg-transparent border-0 p-2  remove-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15"
                                            viewBox="0 0 13 15" fill="none">
                                            <path
                                                d="M7.91403 5.09124L7.68381 11.0796M4.498 11.0796L4.26778 5.09124M8.58606 2.69123C9.3604 2.75118 10.1323 2.83929 10.9002 2.95538C11.1278 2.98998 11.354 3.02658 11.5802 3.06584M10.9002 2.95538L10.1896 12.1928C10.1606 12.5689 9.99071 12.9201 9.71388 13.1764C9.43706 13.4326 9.07371 13.5749 8.69651 13.5748H3.4853C3.10809 13.5749 2.74475 13.4326 2.46792 13.1764C2.1911 12.9201 2.0212 12.5689 1.9922 12.1928L1.28158 2.95538M1.28158 2.95538C1.05402 2.98932 0.82779 3.02591 0.601562 3.06517M1.28158 2.95538C2.04951 2.83929 2.82141 2.75118 3.59575 2.69123M8.58606 2.69123V2.08175C8.58606 1.2966 7.98057 0.641875 7.19543 0.617256C6.45927 0.593727 5.72254 0.593727 4.98638 0.617256C4.20124 0.641875 3.59575 1.29727 3.59575 2.08175V2.69123M8.58606 2.69123C6.9251 2.56286 5.25671 2.56286 3.59575 2.69123"
                                                stroke="#E74C3C" stroke-width="1.2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="px-3">
                                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                                        <div class="col-12 col-md-6 px-md-2">
                                            <label class="form-label">Document Name<span>*</span></label>
                                            <input type="text" name="fund_name" class="form-control"
                                                placeholder="Enter Document Name" value="Document Name">
                                            <div class="error-message text-danger" style="display:none;"></div>
                                        </div>
                                        <div class="col-12 col-md-6 px-md-2">
                                            <label class="form-label">Instruction<span>*</span></label>
                                            <input type="text" name="fund_owner" class="form-control"
                                                placeholder="Enter Instruction" value="Instruction" required>
                                            <div class="error-message text-danger" style="display:none;"></div>
                                        </div>
                                        <div class="col-12 col-md-6 px-md-2"> <label class="form-label">Organization
                                                Legal Type<span>*</span></label>


                                            <div class="select-wrapper w-100 position-relative">
                                                <div class="custom-select form-control">
                                                    Document Type
                                                </div>

                                                <ul class="select-list" style="display: block;">
                                                    <li data-value="PDF">PDF</li>
                                                    <li data-value="JPG">JPG</li>
                                                    <li data-value="Docx">Docx</li>
                                                    <li data-value="PPT">PPT</li>
                                                    <li data-value="Excel">Excel</li>
                                                </ul>

                                                <input type="hidden" name="registration_type" class="hidden-select"
                                                    value="" required="">
                                            </div>

                                        </div>

                                        <div class="col-12 col-md-6 px-md-2">
                                            <label class="form-label">File Size (MB)<span>*</span></label>
                                            <input type="number" name="about_fund" placeholder="Enter File Size (MB)"
                                                class="form-control">
                                        </div>
                                        <div class="col-12 px-md-2">
                                            <label class="form-label">Upload File<span>*</span></label>
                                            <input type="file" id="fund_banner" name="fund_banner" hidden>
                                            <label for="fund_banner" class="upload-label mb-0">
                                                <div class="upload-content">
                                                    <div class="upload-icon mb-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="26"
                                                            height="26" viewBox="0 0 26 26" fill="none">
                                                            <g opacity="0.2">
                                                                <path d="M9.75 11.916V18.416L11.9167 16.2493"
                                                                    stroke="#292D32" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M9.7526 18.4167L7.58594 16.25" stroke="#292D32"
                                                                    stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M23.8307 10.8327V16.2493C23.8307 21.666 21.6641 23.8327 16.2474 23.8327H9.7474C4.33073 23.8327 2.16406 21.666 2.16406 16.2493V9.74935C2.16406 4.33268 4.33073 2.16602 9.7474 2.16602H15.1641"
                                                                    stroke="#292D32" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path
                                                                    d="M23.8307 10.8327H19.4974C16.2474 10.8327 15.1641 9.74935 15.1641 6.49935V2.16602L23.8307 10.8327Z"
                                                                    stroke="#292D32" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <p class="">Upload PDF/JPG up to 5 MB</p>
                                                    <small id="fund_banner_name" class="d-block mt-2"></small>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="btn-wrap px-3 mb-3">
                    <button type="button" class="btn btn-primary mt-2" onclick="addDoc()">+ Add Another
                        Document</button>
                </div>
                <div style="border-radius:0px 0px 8px 8px;"
                    class="modal-footer border-0 d-flex justify-content-center justify-content-md-end gap-2 steps-btn pe-lg-4 flex-wrap">
                    <button type="button" class="btn simple-btn m-0" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="themeSubmitBtn" class="btn gradient-btn m-0">Save Theme</button>
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
<script>
let index = 1;

// ADD DOCUMENT
function addDoc() {
    const wrapper = document.getElementById('docWrapper');
    const first = wrapper.querySelector('.document');

    const clone = first.cloneNode(true);

    // Clear inputs
    clone.querySelectorAll('input').forEach(input => {
        if (input.type === 'file') {
            input.value = '';
        } else {
            input.value = '';
        }
    });

    // Reset selects
    clone.querySelectorAll('select').forEach(select => {
        select.selectedIndex = 0;
    });

    // Update index-based names
    clone.querySelectorAll('input, select').forEach(el => {
        if (el.name) {
            el.name = el.name.replace(/\[\d+\]/, '[' + index + ']');
        }
    });

    wrapper.appendChild(clone);

    updateTitles();
    index++;
}


// REMOVE DOCUMENT (event delegation)
document.getElementById('docWrapper').addEventListener('click', function(e) {

    if (e.target.classList.contains('remove-btn')) {

        const allDocs = document.querySelectorAll('.document');

        if (allDocs.length > 1) {
            e.target.closest('.document').remove();
        }

        updateTitles();
        resetIndexes();
    }

});


// UPDATE TITLES (Document 1,2,3...)
function updateTitles() {
    document.querySelectorAll('.document').forEach((doc, i) => {
        doc.querySelector('.doc-title').innerText = "Document " + (i + 1);
    });
}


// RESET INPUT NAME INDEXES (important for Laravel)
function resetIndexes() {
    document.querySelectorAll('.document').forEach((doc, i) => {
        doc.querySelectorAll('input, select').forEach(el => {
            if (el.name) {
                el.name = el.name.replace(/\[\d+\]/, '[' + i + ']');
            }
        });
    });

    index = document.querySelectorAll('.document').length;
}
</script>


@endsection
