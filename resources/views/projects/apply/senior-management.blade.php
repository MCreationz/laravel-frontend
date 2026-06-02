@extends('layouts.dashboard')

@section('page_title', 'Application Form')
@section('header_back_url', route('dashboard'))

@section('header_extra')
    <div class="header-first-time d-flex align-items-center gap-2">
        <span class="header-first-time-label">First Time User</span>
        <label class="switch mb-0">
            <input type="checkbox" checked>
            <span class="slider"></span>
        </label>
    </div>
    <a href="#" class="icon px-2 px-lg-3 header-refresh" title="Refresh">
        <i class="bi bi-arrow-clockwise"></i>
    </a>
@endsection

@section('content')
    <div class="step-section position-relative mb-3">
        <div class="bg-image position-absolute top-0 start-0 w-100 h-100">
            <img src="{{ asset('img/dasboard-bg.png') }}" class="img-fluid" alt="steps section" width="100%"
                height="100%">
        </div>
        <div
            class="step-wrapper d-flex flex-wrap justify-content-center justify-content-md-between align-items-center py-3 py-md-4 py-xl-5 px-2 row-gap-2">
            <div class="col-6 col-md-3 step bold active position-relative">
                <div class="step-inner">
                    <div class="step-circle active d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/direction.png') }}" class="object-fit-contain" alt="steps section"
                            width="15px" height="11px">
                    </div>
                    <p>Senior Management Details</p>
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

                </div>
            </div>
            <div class="col-6 col-md-3 step bold">
                <div class="step-inner">
                    <div class="step-circle d-flex justify-content-center align-items-center">
                        <span></span>
                    </div>
                    <p>2. Address</p>
                </div>

                <div class="progress-dots position-absolute d-none d-md-flex">
                    <span class="dot one"></span>
                    <span class="dot two"></span>
                    <span class="dot three"></span>
                    <span class="dot four"></span>
                    <span class="dot five"></span>
                    <span class="dot five"></span>
                    <span class="dot six"></span>
                    <span class="dot seven"></span>
                    <span class="dot nine"></span>

                </div>
            </div>

            <div class="col-6 col-md-3 step">
                <div class="step-inner">
                    <div class="step-circle d-flex justify-content-center align-items-center">
                        <span></span>
                    </div>
                    <p>Financial Documents</p>
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

                </div>
            </div>

            <div class="col-6 col-md-3 step bold">

                <div class="step-inner">
                    <div class="step-circle d-flex justify-content-center align-items-center">
                        <span></span>
                    </div>
                    <p>Awards & Recognitions</p>
                </div>


            </div>

        </div>
    </div>
    <div class="card-box bg-white rounded">
        <div class="top-search-wrap p-3 mb-2">
            <div class="row justify-content-between align-items-center row-gap-2">
                <div class="col-md-6">
                    <div class="mb-0 fw-bold top-heading">
                        Senior Management Details
                    </div>
                </div>
                <div
                    class="col-12 col-md-6 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">

                    <!-- Add Button -->
                    <button class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#addPartner">
                        + Add Director/Partner
                    </button>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th class="text-nowrap">S No.</th>
                        <th class="text-nowrap">Name of Director/Partner</th>
                        <th class="text-nowrap">Designation</th>
                        <th class="text-nowrap">Nature of Engagement</th>
                        <th class="text-nowrap">Appointment Date</th>
                        <th class="text-nowrap">Total Experience</th>
                        <th></th>
                    </tr>

                </thead>
                <tbody id="">
                    <tr>
                        <td>1</td>
                        <td>Mukesh Sharma</td>
                        <td>Chief Executive Officer</td>
                        <td>Full-time</td>
                        <td>12/05/2018</td>
                        <td>05 Years</td>
                        <td>
                            <button class="bg-transparent border-0 px-1 py-2">⫶</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Mukesh Sharma</td>
                        <td>Chief Executive Officer</td>
                        <td>Full-time</td>
                        <td>12/05/2018</td>
                        <td>05 Years</td>
                        <td>
                            <button class="bg-transparent border-0 px-1 py-2">⫶</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Mukesh Sharma</td>
                        <td>Chief Executive Officer</td>
                        <td>Full-time</td>
                        <td>12/05/2018</td>
                        <td>05 Years</td>
                        <td>
                            <button class="bg-transparent border-0 px-1 py-2">⫶</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Mukesh Sharma</td>
                        <td>Chief Executive Officer</td>
                        <td>Full-time</td>
                        <td>12/05/2018</td>
                        <td>05 Years</td>
                        <td>
                            <button class="bg-transparent border-0 px-1 py-2">⫶</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="border-radius:0px 0px 8px 8px;"
            class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 mt-4 steps-btn pe-lg-4 flex-wrap">
            <div class="btn-wrap">
                <button type="button" class="btn btn-secondary"
                    onclick="window.location.href='http://127.0.0.1:8000/client-admin/funds' ">
                    Back
                </button>
                <button type="submit" class="btn btn-primary">Continue
                </button>
            </div>
        </div>
    </div>
        <div class="modal fade" id="addPartner" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header border-0 pb-0">
                    <div>
                        <!-- MODAL TITLE -->
                        <h2 class="modal-title mb-2 inner-title" id="addPartnerLabel">
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
                    <form id="AddPartnerForm" action="" method="POST">
                        @csrf
                        <div class="p-3">
                            <input type="hidden" name="" id="">
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
                            <button type="submit" id="addPartnerSubmitBtn" class="btn gradient-btn m-0">Save
                                Partner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card-box table th {
            min-width: min-content;
            max-width: max-content;
            width: auto;
        }
    </style>


@endsection
