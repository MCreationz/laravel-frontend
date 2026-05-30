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
                            <div class="col-12 px-md-2">
                                <label class="form-label">Eligible States<span>*</span></label>
                                <div class="select-wrapper w-100 position-relative">
                                    <div class="custom-select form-control d-flex flex-wrap gap-2 align-items-center">
                                        Select States
                                    </div>
                                    <ul class="select-list">
                                        <li data-value="Idea">Idea</li>
                                        <li data-value="Early-Revenue">Early Revenue</li>
                                        <li data-value="Growth">Growth</li>
                                        <li data-value="Scale-up">Scale-up</li>
                                    </ul>
                                    <input type="hidden" name="current_stage" class="hidden-select">
                                </div>
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

    <script>
        document.getElementById("fund_logo").addEventListener("change", function() {
            const fileName = this.files[0]?.name;
            document.getElementById("file-name").innerText = fileName || "";
        });
    </script>


@endsection
