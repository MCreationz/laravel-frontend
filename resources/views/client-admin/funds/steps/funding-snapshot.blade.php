@extends('client-admin.layouts.app')

@section('title', 'Funds')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet">

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
        <form method="POST" action="{{ route('client-admin.funds.funding-snapshot.store') }}">
            @csrf
            <div style="border-radius:8px 8px 0px 0px;" class="card border-0">

                @php
                $selectedStates = old(
                'eligible_states',
                $fundSnapshot?->eligible_states ?? ''
                );

                if (is_string($selectedStates)) {
                $selectedStates = array_filter(
                array_map('trim', explode(',', $selectedStates))
                );
                }

                if (!is_array($selectedStates)) {
                $selectedStates = [];
                }
                @endphp


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
                                </ul>

                                <input type="hidden" name="eligible_states" id="hiddenStates"
                                    value="{{ implode(',', $selectedStates) }}" required>
                            </div>

                            @error('state')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="col-12 px-md-2 mb-4">
                            <label class="form-label">
                                Eligibility Instruction <span>*</span>
                            </label>

                            <div id="eligibility-editor"></div>

                            <input type="hidden"
                                name="eligibility_instruction"
                                id="eligibility_instruction"
                                value="{{ old('eligibility_instruction', $fundSnapshot->eligibility_instruction ?? '') }}">
                        </div>

                    </div>
                    <div class="toggle-container d-flex mb-3 justify-content-start gap-2">
                        <div class="col-auto toggle-item">
                            <div class="toggle-wrap">
                                <span class="font-small">NPO</span>
                                <label class="switch mb-0">
                                    <input type="hidden" name="is_npo" value="0">

                                    <input type="checkbox" name="is_npo" value="1" {{ old('is_npo', $fundSnapshot->is_npo ?? 0) ? 'checked' : '' }}>

                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-auto toggle-item">
                            <div class="toggle-wrap">
                                <span class="font-small">Startup</span>
                                <label class="switch mb-0">
                                    <input type="hidden" name="is_startup" value="0">

                                    <input type="checkbox" name="is_startup" value="1" {{ old('is_startup', $fundSnapshot->is_startup ?? 0) ? 'checked' : '' }}>

                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    {{-- --}}
                    <div class="mt-4 mb-4">
                        <h2 class="top-heading mb-0">Funds Snapshot</h2>
                    </div>
                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Fund Outlay (₹)<span>*</span></label>
                            <input type="text" inputmode="numeric" name="fund_outlay" class="form-control"
                                placeholder="Enter Fund Outlay (₹)"
                                value="{{ old('fund_outlay', $fundSnapshot->fund_outlay ?? '') }}">
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Fund Type<span>*</span></label>
                            <input type="text" name="fund_type" class="form-control" placeholder="Enter Fund Type"
                                value="{{ old('fund_type', $fundSnapshot->fund_type ?? '') }}" required>
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>
                        <div class="col-12 px-md-2">
                            <label class="form-label">Single Entity Cap (₹)<span>*</span></label>
                            <input type="text" inputmode="numeric" name="single_entity_cap" class="form-control"
                                placeholder="Enter Single Entity Cap (₹)"
                                value="{{ old('single_entity_cap', $fundSnapshot->single_entity_cap ?? '') }}" required>
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="ms-0 me-2" width="11" height="11"
                                    viewBox="0 0 11 11" fill="none">
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
                            <tbody id="documentsTable">


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
                                <svg xmlns="http://www.w3.org/2000/svg" class="ms-0 me-2" width="11" height="11"
                                    viewBox="0 0 11 11" fill="none">
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="themeTableBody">


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
                                <input type="text" class="form-control py-2" id="sub_theme_name" name="sub_theme_name"
                                    placeholder="Enter Sub Theme" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold">
                                    Description
                                </label>
                                <textarea type="text" class="form-control py-2" id="theme_description"
                                    name="description" placeholder="Enter Description"
                                    style="min-height:138px"></textarea>
                            </div>
                        </div>
                    </div>

                    <div style="border-radius:0px 0px 8px 8px;"
                        class="modal-footer border-0 d-flex justify-content-center justify-content-md-end gap-2 steps-btn pe-lg-4 flex-wrap">
                        <button type="button" class="btn simple-btn m-0" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" id="themeSubmitBtn" class="btn gradient-btn m-0">Save Theme</button>
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
                            <div class="d-flex justify-content-between mb-3 align-items-center document-heading px-2">
                                <p class="doc-title fw-semibold mb-0">Document 1</p>
                                <button type="button" class="trash-btn bg-transparent border-0 p-2  remove-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15"
                                        fill="none">
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
                                            placeholder="Enter Document Name">
                                        <div class="error-message text-danger" style="display:none;"></div>
                                    </div>
                                    <div class="col-12 col-md-6 px-md-2">
                                        <label class="form-label">Instruction<span>*</span></label>
                                        <input type="text" name="fund_owner" class="form-control"
                                            placeholder="Enter Instruction" required>
                                        <div class="error-message text-danger" style="display:none;"></div>
                                    </div>
                                    <div class="col-12 col-md-6 px-md-2"> <label class="form-label">Organization
                                            Legal Type<span>*</span></label>


                                        <div class="select-wrapper w-100 position-relative">
                                            <div class="custom-select form-control">
                                                Document Type
                                            </div>

                                            <ul class="select-list">
                                                <li data-value="PDF">PDF</li>
                                                <li data-value="JPG">JPG</li>
                                                <li data-value="Docx">Docx</li>
                                                <li data-value="PPT">PPT</li>
                                                <li data-value="Excel">Excel</li>
                                            </ul>

                                            <input type="hidden" name="document_type" class="hidden-select">
                                        </div>

                                    </div>

                                    <div class="col-12 col-md-6 px-md-2">
                                        <label class="form-label">File Size <input type="hidden" name="document_type"
                                                class="hidden-select">(MB)<span>*</span></label>
                                        <input type="number" name="about_fund" placeholder="Enter File Size (MB)"
                                            class="form-control">
                                    </div>
                                    <!-- <div class="col-12 px-md-2">
                                        <label class="form-label">Upload File<span>*</span></label>
                                        <input type="file" id="fund_banner" name="fund_banner" hidden>
                                        <label for="fund_banner" class="upload-label mb-0">
                                            <div class="upload-content">
                                                <div class="upload-icon mb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                        viewBox="0 0 26 26" fill="none">
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
                                    </div> -->
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
                <button type="button" id="docSubmitBtn" class="btn gradient-btn m-0">Save Documents</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Document Modal -->
<div class="modal fade" id="editDocumentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header border-0 pt-4 pb-3">
                <h2 class="modal-title inner-title">
                    Edit Document
                </h2>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>


            <div class="modal-body px-4">

                <form id="editDocumentForm">

                    <div class="row row-gap-3">

                        <div class="col-md-6">
                            <label class="form-label">
                                Document Name <span>*</span>
                            </label>

                            <input type="text"
                                id="edit_document_name"
                                class="form-control">
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">
                                Instruction
                            </label>

                            <input type="text"
                                id="edit_instruction"
                                class="form-control">
                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                Document Type <span>*</span>
                            </label>

                            <select id="edit_document_type"
                                class="form-control">

                                <option value="">Select Type</option>
                                <option value="PDF">PDF</option>
                                <option value="JPG">JPG</option>
                                <option value="Docx">Docx</option>
                                <option value="PPT">PPT</option>
                                <option value="Excel">Excel</option>

                            </select>

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">
                                File Size (MB) <span>*</span>
                            </label>

                            <input type="number"
                                id="edit_max_file_size_mb"
                                class="form-control">

                        </div>


                    </div>

                </form>

            </div>


            <div class="modal-footer border-0">

                <button type="button"
                    class="btn simple-btn"
                    data-bs-dismiss="modal">
                    Cancel
                </button>


                <button type="button"
                    id="updateDocumentBtn"
                    class="btn gradient-btn">
                    Update Document
                </button>

            </div>

        </div>
    </div>
</div>

</div>
<style>
    .ql-toolbar {
        display: none;
    }

    .ql-container {
        min-height: 120px;
        border-top: 1px solid #ced4da !important;
        border-radius: .375rem;
    }

    .ql-editor {
        padding: 12px 15px;
    }

    .ql-editor ul,
    .ql-editor ol {
        padding-left: 0 !important;
        margin-left: 0 !important;
    }

    .ql-editor li {
        margin-left: 0 !important;
        padding-left: 0 !important;
    }

    .ql-editor li::before {
        margin-left: -1em !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>







<script>
    document.addEventListener('DOMContentLoaded', function() {

        const quill = new Quill('#eligibility-editor', {
            theme: 'snow',
            modules: {
                toolbar: false
            }
        });

        const hiddenInput = document.getElementById('eligibility_instruction');

        // Load existing HTML
        if (hiddenInput.value.trim() !== '') {
            quill.root.innerHTML = hiddenInput.value;
        } else {
            // Default formatting for new content
            quill.focus();
            quill.format('bold', true);
            quill.format('list', 'bullet');
        }

        // Always keep bold + bullets enabled
        function applyDefaultFormatting() {
            quill.format('bold', true);
            quill.format('list', 'bullet');
        }

        quill.on('selection-change', function(range) {
            if (range) {
                applyDefaultFormatting();
            }
        });

        quill.keyboard.addBinding({
            key: 13
        }, function(range) {
            quill.insertText(range.index, '\n', 'list', 'bullet');
            quill.setSelection(range.index + 1);
            applyDefaultFormatting();
            return false;
        });

        quill.on('text-change', function() {
            hiddenInput.value = quill.root.innerHTML;
        });

        applyDefaultFormatting();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        console.log('Fund Documents JS Loaded');

        const tbody = document.getElementById('documentsTable');
        if (!tbody) return;

        const modalEl = document.getElementById('documentModal');
        const modal = bootstrap.Modal.getOrCreateInstance(modalEl);

        const editModalEl = document.getElementById('editDocumentModal');
const editModal = bootstrap.Modal.getOrCreateInstance(editModalEl);

let editDocumentId = null;

        const wrapper = document.getElementById('docWrapper');
        const submitBtn = document.getElementById('docSubmitBtn');

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        let editId = null;

        /*
        |-----------------------------------------
        | DOCUMENT TYPE DROPDOWN (FIXED)
        |-----------------------------------------
        */




        function initDocumentTypeDropdown(block) {
            const wrapperEl = block.querySelector('.select-wrapper');
            if (!wrapperEl) return;

            const selectBox = wrapperEl.querySelector('.custom-select');
            const list = wrapperEl.querySelector('.select-list');
            const hidden = wrapperEl.querySelector('.hidden-select');

            if (!selectBox || !list || !hidden) return;

            // Force hide on init
            list.style.display = 'none';

            // Clone to remove stale listeners
            const newSelectBox = selectBox.cloneNode(true);
            selectBox.parentNode.replaceChild(newSelectBox, selectBox);

            newSelectBox.addEventListener('click', function(e) {
                e.stopPropagation();
                e.stopImmediatePropagation();

                // Close all other dropdowns
                document.querySelectorAll('.select-list').forEach(l => {
                    if (l !== list) l.style.display = 'none';
                });

                // Toggle this one
                list.style.display = (list.style.display === 'none' || list.style.display === '') ? 'block' : 'none';
            });

            // Clone lis to remove stale listeners
            list.querySelectorAll('li').forEach(li => {
                const newLi = li.cloneNode(true);
                li.parentNode.replaceChild(newLi, li);

                newLi.addEventListener('click', function(e) {
                    e.stopPropagation();
                    newSelectBox.innerText = this.dataset.value;
                    hidden.value = this.dataset.value;
                    list.style.display = 'none';
                });
            });
        }

        document.getElementById('documentModal')
.addEventListener('show.bs.modal', function () {

    // Reset edit mode
    editId = null;

    // Reset title/button
    document.getElementById('documentModalTitle').innerText =
        'Add Multiple Documents';

    document.getElementById('docSubmitBtn').innerText =
        'Save Documents';


    const wrapper = document.getElementById('docWrapper');


    // Keep only first document block
    const firstBlock = wrapper.querySelector('.document');

    if (firstBlock) {

        wrapper.innerHTML = '';

        const clone = firstBlock.cloneNode(true);

        // Clear all inputs
        clone.querySelectorAll('input').forEach(input => {

            input.value = '';

            if(input.type === 'file'){
                input.value = '';
            }

        });


        // Reset dropdown
        const selectText = clone.querySelector('.custom-select');

        if(selectText){
            selectText.innerText = 'Document Type';
        }


        const hiddenSelect = clone.querySelector('.hidden-select');

        if(hiddenSelect){
            hiddenSelect.value = '';
        }


        wrapper.appendChild(clone);


        updateTitles();

        initDocumentTypeDropdown(clone);

    }

});

document.getElementById('documentModal')
.addEventListener('hidden.bs.modal', function () {

    document.body.classList.remove('modal-open');

    document.querySelectorAll('.modal-backdrop')
        .forEach(el => el.remove());

});

        // close dropdown on outside click (once)
        // Close dropdown when clicking outside — scope to modal to avoid Bootstrap conflicts
        if (!document.__docTypeBound) {
            document.getElementById('documentModal').addEventListener('click', function(e) {
                if (!e.target.closest('.select-wrapper')) {
                    document.querySelectorAll('.select-list').forEach(l => l.style.display = 'none');
                }
            });
            document.__docTypeBound = true;
        }
        /*
        |-----------------------------------------
        | LOAD DOCUMENTS
        |-----------------------------------------
        */
        function loadDocuments() {

            fetch("{{ route('client-admin.fund-documents.index') }}")
                .then(res => res.json())
                .then(res => {

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        tbody.innerHTML = `<tr><td colspan="4" class="text-center">No documents found</td></tr>`;
                        return;
                    }

                    res.data.forEach(doc => {

                        tbody.innerHTML += `
                                                    <tr>
                                                        <td>${doc.document_name ?? ''}</td>
                                                        <td>${doc.instruction ?? ''}</td>
                                                        <td>${doc.document_type ?? ''}</td>
                                                        <td>${doc.max_file_size_mb ?? ''} MB</td>
                                                      <td>
                    <div class="action-btn d-flex align-items-center gap-2">
                        <a href="javascript:void(0)" 
                           class="edit-btn edit-doc"
                           data-id="${doc.id}"
                           title="Edit">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z"
                                      stroke="#07CCB5" stroke-width="1.2"></path>
                            </svg>
                        </a>

                        <a href="javascript:void(0)"
                           class="trash-btn delete-doc"
                           data-id="${doc.id}"
                           title="Delete">

                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                                <path d="M1.3 3L2 12.2C2.1 13 2.7 13.6 3.5 13.6H8.7C9.5 13.6 10.1 13 10.2 12.2L10.9 3"
                                      stroke="#E74C3C" stroke-width="1.2"></path>
                                <path d="M0.6 3.1C4 2.5 8.2 2.5 11.6 3.1"
                                      stroke="#E74C3C" stroke-width="1.2"></path>
                            </svg>
                        </a>
                    </div>
                </td>
                                                    </tr>
                                                `;
                    });


                });
        }

        loadDocuments();

        /*
        |-----------------------------------------
        | ADD BLOCK
        |-----------------------------------------
        */
        window.addDoc = function() {
            const first = wrapper.querySelector('.document');
            const clone = first.cloneNode(true);

            clone.querySelectorAll('input').forEach(i => i.value = '');
            clone.querySelector('.custom-select').innerText = 'Document Type';
            clone.querySelector('.hidden-select').value = '';
            // No need to touch select-list display — initDocumentTypeDropdown handles it

            wrapper.appendChild(clone);
            updateTitles();
            initDocumentTypeDropdown(clone);
        };

        function updateTitles() {
            document.querySelectorAll('.document').forEach((el, i) => {
                const title = el.querySelector('.doc-title');
                if (title) title.innerText = `Document ${i + 1}`;
            });
        }

        /*
        |-----------------------------------------
        | REMOVE BLOCK
        |-----------------------------------------
        */
        document.getElementById('docWrapper').addEventListener('click', function(e) {

            if (e.target.closest('.remove-btn')) {
                const blocks = document.querySelectorAll('.document');
                if (blocks.length > 1) {
                    e.target.closest('.document').remove();
                    updateTitles();
                }
            }
        });

        /*
        |-----------------------------------------
        | SAVE
        |-----------------------------------------
        */
        submitBtn.addEventListener('click', function() {
            function closeModal(modalEl) {
                const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                modal.hide();

                // Force cleanup in case backdrop gets stuck
                modalEl.addEventListener('hidden.bs.modal', function handler() {
                    document.body.classList.remove('modal-open');
                    document.body.style.removeProperty('overflow');
                    document.body.style.removeProperty('padding-right');
                    document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
                    modalEl.removeEventListener('hidden.bs.modal', handler);
                }, {
                    once: true
                });
            }



            const formData = new FormData();

            formData.append('_token', csrfToken);

            let url = "{{ route('client-admin.fund-documents.store') }}";

            if (editId) {
                url = "{{ route('client-admin.fund-documents.update', ':id') }}".replace(':id', editId);
                formData.append('_method', 'PUT');
            }

            document.querySelectorAll('.document').forEach((block, index) => {

                formData.append(`documents[${index}][document_name]`,
                    block.querySelector('[name="fund_name"]').value
                );

                formData.append(`documents[${index}][instruction]`,
                    block.querySelector('[name="fund_owner"]').value
                );

                // FIXED FIELD NAME
                formData.append(`documents[${index}][document_type]`,
                    block.querySelector('[name="document_type"]').value
                );

                formData.append(`documents[${index}][max_file_size_mb]`,
                    block.querySelector('[name="about_fund"]').value
                );

                // const file = block.querySelector('[name="fund_banner"]').files[0];
                // if (file) {
                //     formData.append(`documents[${index}][uploaded_file]`, file);
                // }
            });

            fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        closeModal(modalEl);
                        loadDocuments();
                    }
                });
        });

        /*
        |-----------------------------------------
        | EDIT
        |-----------------------------------------
        */
       document.addEventListener('click', function(e){

    if(e.target.closest('.edit-doc')){

        const id = e.target.closest('.edit-doc').dataset.id;

        editDocumentId = id;


        fetch(
            "{{ route('client-admin.fund-documents.edit', ':id') }}"
            .replace(':id', id)
        )
        .then(res=>res.json())
        .then(res=>{

            const doc = res.data;


            document.getElementById('edit_document_name').value =
                doc.document_name ?? '';

            document.getElementById('edit_instruction').value =
                doc.instruction ?? '';

            document.getElementById('edit_document_type').value =
                doc.document_type ?? '';

            document.getElementById('edit_max_file_size_mb').value =
                doc.max_file_size_mb ?? '';


            editModal.show();

        });

        document.getElementById('updateDocumentBtn')
.addEventListener('click',function(){

    const formData = new FormData();

    formData.append('_token',csrfToken);
    formData.append('_method','PUT');


    formData.append(
        'document_name',
        document.getElementById('edit_document_name').value
    );


    formData.append(
        'instruction',
        document.getElementById('edit_instruction').value
    );


    formData.append(
        'document_type',
        document.getElementById('edit_document_type').value
    );


    formData.append(
        'max_file_size_mb',
        document.getElementById('edit_max_file_size_mb').value
    );


    fetch(
        "{{ route('client-admin.fund-documents.update', ':id') }}"
        .replace(':id',editDocumentId),
        {
            method:'POST',
            body:formData
        }
    )
    .then(res=>res.json())
    .then(res=>{

        if(res.success){

            editModal.hide();

            loadDocuments();

        }

    });

});

    }

});

        /*
        |-----------------------------------------
        | DELETE
        |-----------------------------------------
        */
        document.addEventListener('click', function(e) {

            if (e.target.closest('.delete-doc')) {

                const id = e.target.closest('.delete-doc').dataset.id;

                if (!confirm('Delete this document?')) return;

                fetch("{{ route('client-admin.fund-documents.destroy', ':id') }}".replace(':id', id), {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: new URLSearchParams({
                            _method: 'DELETE'
                        })
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) loadDocuments();
                    });
            }
        });

        /*
        |-----------------------------------------
        | INIT EXISTING BLOCKS
        |-----------------------------------------
        */
        document.querySelectorAll('.document').forEach(block => {
            initDocumentTypeDropdown(block);
        });

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        function closeModal(modalEl) {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.hide();

            // Force cleanup in case backdrop gets stuck
            modalEl.addEventListener('hidden.bs.modal', function handler() {
                document.body.classList.remove('modal-open');
                document.body.style.removeProperty('overflow');
                document.body.style.removeProperty('padding-right');
                document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
                modalEl.removeEventListener('hidden.bs.modal', handler);
            }, {
                once: true
            });
        }


        console.log('==============================');
        console.log('Funding Theme JS Loaded');
        console.log('==============================');

        const form = document.getElementById('themeForm');
        const tbody = document.getElementById('themeTableBody');

        const modalElement = document.getElementById('themeModal');
        const modal = bootstrap.Modal.getOrCreateInstance(modalElement);

        const themeId = document.getElementById('theme_id');
        const themeName = document.getElementById('theme_name');
        const subThemeName = document.getElementById('sub_theme_name');
        const description = document.getElementById('theme_description');

        const modalTitle = document.getElementById('themeModalTitle');
        const submitBtn = document.getElementById('themeSubmitBtn');
        const addThemeBtn = document.getElementById('addDocumentsBtn');

        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute('content');

        console.log('Form:', form);
        console.log('Submit Button:', submitBtn);
        console.log('Table Body:', tbody);

        /*
        |--------------------------------------------------------------------------
        | Load Themes
        |--------------------------------------------------------------------------
        */

        loadThemes();

        function loadThemes() {

            console.log('Loading themes...');

            fetch("{{ route('client-admin.fund-themes.index') }}")
                .then(response => response.json())
                .then(response => {

                    console.log('Themes Response:', response);

                    tbody.innerHTML = '';

                    if (!response.data || response.data.length === 0) {

                        tbody.innerHTML = `
                                                                    <tr>
                                                                        <td colspan="4" class="text-center">
                                                                            No themes found
                                                                        </td>
                                                                    </tr>
                                                                `;

                        return;
                    }

                    response.data.forEach(theme => {

                        tbody.innerHTML += `
                                                    <tr>
                                                        <td>${theme.theme_name ?? ''}</td>
                                                        <td>${theme.sub_theme_name ?? ''}</td>
                                                        <td>${theme.description ?? ''}</td>
                                                      <td>
                    <div class="action-btn d-flex align-items-center gap-2">

                        <a href="javascript:void(0)"
                           class="edit-btn edit-theme"
                           data-id="${theme.id}"
                           title="Edit">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z"
                                      stroke="#07CCB5"
                                      stroke-width="1.2"></path>
                            </svg>
                        </a>

                        <a href="javascript:void(0)"
                           class="trash-btn delete-theme"
                           data-id="${theme.id}"
                           title="Delete">

                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                                <path d="M1.3 3L2 12.2C2.1 13 2.7 13.6 3.5 13.6H8.7C9.5 13.6 10.1 13 10.2 12.2L10.9 3"
                                      stroke="#E74C3C"
                                      stroke-width="1.2"></path>
                                <path d="M0.6 3.1C4 2.5 8.2 2.5 11.6 3.1"
                                      stroke="#E74C3C"
                                      stroke-width="1.2"></path>
                            </svg>
                        </a>

                    </div>
                </td>
                                                    </tr>
                                                `;
                    });
                })
                .catch(error => {
                    console.error('Load Themes Error:', error);
                });
        }




        /*
        |--------------------------------------------------------------------------
        | Open Add Modal
        |--------------------------------------------------------------------------
        */

        addThemeBtn.addEventListener('click', function() {

            console.log('Opening Add Theme Modal');

            form.reset();

            themeId.value = '';

            modalTitle.innerText = 'Add Theme';

            submitBtn.innerText = 'Save Theme';
        });

        /*
        |--------------------------------------------------------------------------
        | Create / Update Theme
        |--------------------------------------------------------------------------
        */

        submitBtn.addEventListener('click', function() {

            console.log('====================');
            console.log('THEME BUTTON CLICKED');
            console.log('====================');

            const id = themeId.value;

            console.log('Theme ID:', id);

            const formData = new FormData();

            formData.append('_token', csrfToken);
            formData.append('theme_name', themeName.value);
            formData.append('sub_theme_name', subThemeName.value);
            formData.append('description', description.value);

            let url = "{{ route('client-admin.fund-themes.store') }}";

            if (id) {

                console.log('Mode: UPDATE');

                url = "{{ route('client-admin.fund-themes.update', ':id') }}"
                    .replace(':id', id);

                formData.append('_method', 'PUT');

            } else {

                console.log('Mode: CREATE');
            }

            console.log('Request URL:', url);

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(async response => {

                    console.log('HTTP Status:', response.status);

                    const data = await response.json();

                    console.log('Server Response:', data);

                    if (data.success) {

                        console.log('Theme saved successfully');

                        closeModal(modalElement);

                        form.reset();

                        themeId.value = '';

                        loadThemes();

                    } else {

                        console.error('Validation Error:', data);

                        alert(data.message || 'Something went wrong');
                    }
                })
                .catch(error => {

                    console.error('SAVE ERROR');
                    console.error(error);

                });
        });

        /*
        |--------------------------------------------------------------------------
        | Edit Theme
        |--------------------------------------------------------------------------
        */

        document.addEventListener('click', function(e) {

            const button = e.target.closest('.edit-theme');

            if (!button) {
                return;
            }

            const id = button.dataset.id;

            console.log('Editing Theme:', id);

            const url = "{{ route('client-admin.fund-themes.edit', ':id') }}"
                .replace(':id', id);

            fetch(url)
                .then(response => response.json())
                .then(response => {

                    console.log('Edit Response:', response);

                    const theme = response.data;

                    themeId.value = theme.id;
                    themeName.value = theme.theme_name;
                    subThemeName.value = theme.sub_theme_name;
                    description.value = theme.description;

                    modalTitle.innerText = 'Edit Theme';
                    submitBtn.innerText = 'Update Theme';

                    modal.show();
                })
                .catch(error => {

                    console.error('Edit Error:', error);

                });
        });

        /*
        |--------------------------------------------------------------------------
        | Delete Theme
        |--------------------------------------------------------------------------
        */

        document.addEventListener('click', function(e) {

            const button = e.target.closest('.delete-theme');

            if (!button) {
                return;
            }

            const id = button.dataset.id;

            console.log('Delete Theme:', id);

            if (!confirm('Are you sure you want to delete this theme?')) {
                return;
            }

            const url = "{{ route('client-admin.fund-themes.destroy', ':id') }}"
                .replace(':id', id);

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: new URLSearchParams({
                        _method: 'DELETE'
                    })
                })
                .then(async response => {

                    console.log('Delete Status:', response.status);

                    const data = await response.json();

                    console.log('Delete Response:', data);

                    if (data.success) {

                        console.log('Theme deleted');

                        loadThemes();
                    }
                })
                .catch(error => {

                    console.error('Delete Error:', error);

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

{{--
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
        document.getElementById('docWrapper').addEventListener('click', function (e) {

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
    </script> --}}


@endsection