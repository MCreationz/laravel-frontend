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
                            Senior Management Details
                        </h2>
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
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Name of Director/Partner
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="director_name"
                                        name="director_name" placeholder="Enter Name of Director/Partner" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold">
                                        Designation
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="designation" name="designation"
                                        placeholder="Enter here" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Nature of Engagement
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
                                        Gender
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="select-wrapper w-100 position-relative">
                                        <div
                                            class="custom-select form-control py-2 d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Select an option</span>
                                        </div>

                                        <input type="hidden" name="gender" id="gender" required>

                                        <ul class="select-list" style="display: none;">
                                            <li data-value="male">Male</li>
                                            <li data-value="female">Female</li>
                                            <li data-value="other">Other</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Date of Birth
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="date" class="form-control py-2" id="date_of_birth"
                                        name="date_of_birth" placeholder="Select an option" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Date of Appointment
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="date" class="form-control py-2" id="date_of_appointment"
                                        name="date_of_appointment" placeholder="Select an option" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Highest Qualification
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="highest_qualification"
                                        name="highest_qualification" placeholder="Enter here" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Roles & Responsibities
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="roles_responsibilities"
                                        name="roles_responsibilities" placeholder="Enter here" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Total Years of Experience
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="total_experience"
                                        name="total_experience" placeholder="Enter here" required>
                                </div>
                                <div class="col-12 px-md-2">
                                    <label class="form-label">Upload Resume/CV<span>*</span></label>
                                    <input type="file" id="resume_cv" name="resume_cv" hidden="">
                                    <label for="resume_cv" class="upload-label mb-0">
                                        <div class="upload-content">
                                            <div class="upload-icon mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                    viewBox="0 0 26 26" fill="none">
                                                    <g opacity="0.2">
                                                        <path d="M9.75 11.916V18.416L11.9167 16.2493" stroke="#292D32"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path d="M9.7526 18.4167L7.58594 16.25" stroke="#292D32"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M23.8307 10.8327V16.2493C23.8307 21.666 21.6641 23.8327 16.2474 23.8327H9.7474C4.33073 23.8327 2.16406 21.666 2.16406 16.2493V9.74935C2.16406 4.33268 4.33073 2.16602 9.7474 2.16602H15.1641"
                                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M23.8307 10.8327H19.4974C16.2474 10.8327 15.1641 9.74935 15.1641 6.49935V2.16602L23.8307 10.8327Z"
                                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                            </div>

                                            <p class="">Upload Resume/CV</p>

                                            <small id="resume_cv_name" class="d-block mt-2"></small>
                                        </div>
                                    </label>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
