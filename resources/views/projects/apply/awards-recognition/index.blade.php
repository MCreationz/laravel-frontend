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
            <img src="{{ asset('img/dasboard-bg.png') }}" class="img-fluid" alt="steps section" width="100%" height="100%">
        </div>
        <div
            class="step-wrapper d-flex flex-wrap justify-content-center justify-content-md-between align-items-center py-3 py-md-4 py-xl-5 px-2 row-gap-2">
            <div class="col-6 col-md-3 step bold active position-relative">
                <div class="step-inner">
                    <div class="step-circle active d-flex justify-content-center align-items-center done">
                        <img src="{{ asset('img/checkmark.png') }}" class="object-fit-contain" alt="steps section"
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
            <div class="col-6 col-md-3 step bold active">
                <div class="step-inner">
                    <div class="step-circle active d-flex justify-content-center align-items-center done">
                        <img src="{{ asset('img/checkmark.png') }}" class="object-fit-contain" alt="steps section"
                            width="15px" height="11px">
                    </div>
                    <p>Documents</p>
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

            <div class="col-6 col-md-3 step active">
                <div class="step-inner">
                    <div class="step-circle active d-flex justify-content-center align-items-center done">
                        <img src="{{ asset('img/checkmark.png') }}" class="object-fit-contain" alt="steps section"
                            width="15px" height="11px">
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

                    <div class="step-circle active d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/direction.png') }}" class="object-fit-contain" alt="steps section"
                            width="15px" height="11px">
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
                        Awards & Recognitions
                    </div>
                </div>
                <div
                    class="col-12 col-md-6 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">

                    <!-- Add Button -->
                    <button class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#addPartner">
                        + Add Awards & Recognitions
                    </button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-nowrap">Name of the Award</th>
                        <th class="text-nowrap">Awarding Organization</th>
                        <th class="text-nowrap">Year</th>
                        <th class="text-nowrap">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Ramesh Gupta <br> +91 441549878</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="border-radius:0px 0px 8px 8px;"
            class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 mt-4 steps-btn pe-lg-4 flex-wrap">
            <div class="btn-wrap">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('dashboard') }}' ">
                    Back
                </button>
                <button type="button" class="btn btn-primary" id="continueBtn">
                    Continue
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
                        <h2 class="modal-title mb-2 inner-title" id="addPartnerLabel">
                            Senior Management Details
                        </h2>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body p-0">

                    <form id="AddPartnerForm" action="{{ route('projects.apply.senior-management.store', $fund->id) }}"
                        method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="edit_id">
                        @csrf

                        <div class="p-3">

                            <!-- Name -->
                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Name of Director/Partner <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" name="name" placeholder="Enter Name"
                                        required>
                                </div>

                                <!-- Designation -->
                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold">
                                        Designation <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" name="designation" required>
                                </div>

                                <!-- Nature of Engagement -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Nature of Engagement <span class="text-danger">*</span>
                                    </label>

                                    <div class="select-wrapper position-relative">

                                        <div
                                            class="custom-select form-control py-2 d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Select</span>
                                        </div>

                                        <input type="hidden" name="nature_of_engagement" id="nature_of_engagement"
                                            class="hidden-select" required>
                                        <ul class="select-list" style="display:none;">
                                            <li data-value="csr_foundation">CSR Foundation</li>
                                            <li data-value="vc_firm">VC Firm</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact / Details -->
                            <div class="row g-3 mb-3">

                                <!-- Gender -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Gender <span class="text-danger">*</span></label>

                                    <div class="select-wrapper position-relative">
                                        <div
                                            class="custom-select form-control py-2 d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Select</span>
                                        </div>

                                        <input type="hidden" name="gender" id="gender" class="hidden-select" required>

                                        <ul class="select-list" style="display:none;">
                                            <li data-value="male">Male</li>
                                            <li data-value="female">Female</li>
                                            <li data-value="other">Other</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- DOB -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Date of Birth <span
                                            class="text-danger">*</span></label>

                                    <input type="date" class="form-control py-2" name="date_of_birth" required>
                                </div>

                                <!-- Appointment -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Date of Appointment <span
                                            class="text-danger">*</span></label>

                                    <input type="date" class="form-control py-2" name="date_of_appointment" required>
                                </div>

                                <!-- Qualification -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Highest Qualification <span
                                            class="text-danger">*</span></label>

                                    <div class="select-wrapper position-relative">
                                        <div
                                            class="custom-select form-control py-2 d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Select</span>
                                        </div>

                                        <input type="hidden" name="highest_qualification" id="highest_qualification"
                                            class="hidden-select" required>

                                        <ul class="select-list" style="display:none;">
                                            <li data-value="Diploma">Diploma</li>
                                            <li data-value="BA">BA</li>
                                            <li data-value="BCom">BCom</li>
                                            <li data-value="BSc">BSc</li>
                                            <li data-value="MBA">MBA</li>
                                            <li data-value="PhD">PhD</li>
                                            <li data-value="Others">Others</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Roles -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Roles & Responsibilities <span
                                            class="text-danger">*</span></label>

                                    <input type="text" class="form-control py-2" name="roles_and_responsibilities" required>
                                </div>

                                <!-- Experience -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Total Years of Experience <span
                                            class="text-danger">*</span></label>

                                    <input type="number" class="form-control py-2" name="total_years_of_experience"
                                        required>
                                </div>

                                <!-- Resume -->
                                <div class="col-12">
                                    <label class="form-label">Upload Resume/CV <span class="text-danger">*</span></label>

                                    <input type="file" id="resume_cv" name="resume_cv" hidden>

                                    <label for="resume_cv" class="upload-label">
                                        <div class="upload-content">
                                            <p>Upload Resume/CV</p>
                                            <small id="resume_cv_name"></small>
                                        </div>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="modal-footer border-0 d-flex justify-content-end gap-2">
                            <button type="button" class="btn simple-btn" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn gradient-btn">
                                Save Partner
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addAnotherPartner" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Header (same style as main modal) -->
                <div class="modal-header border-0 pb-0">
                    <div></div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body p-0">

                    <div class="p-3 text-center">

                        <div class="edit-top-icon mb-3">
                            <img src="{{ asset('img/edit-icon.png') }}" alt="">
                        </div>

                        <h2 class="modal-title mb-2 inner-title">
                            Do you want to add another director/partner details?
                        </h2>

                        <p class="text-muted mb-0">
                            You can add multiple directors or partners to this listing.
                            If you're done, continue to the next step.
                        </p>

                    </div>

                </div>

                <!-- Footer (same structure as first modal) -->
                <div class="modal-footer border-0 d-flex justify-content-end gap-2">

                    <button type="button" class="btn simple-btn" data-bs-dismiss="modal" id="cancelBtn">
                        Add Another
                    </button>

                    <button type="button" class="btn gradient-btn" id="goToDocuments">
                        Continue
                    </button>

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

    {{--
    <script>
        document.querySelectorAll(".edit-btn").forEach(btn => {
            btn.addEventListener("click", function () {

                const form = document.getElementById("AddPartnerForm");
                const modalEl = document.getElementById("addPartner");

                const id = this.dataset.id;

                // open modal
                const modal = new bootstrap.Modal(modalEl);
                modal.show();

                // set update route
                const baseUrl = "{{ url('projects/' . $fund->id . '/apply/senior-management') }}";
                form.action = `${baseUrl}/${id}`;

                // ensure PUT method only once
                let methodInput = form.querySelector("input[name='_method']");
                if (!methodInput) {
                    methodInput = document.createElement("input");
                    methodInput.type = "hidden";
                    methodInput.name = "_method";
                    form.appendChild(methodInput);
                }
                methodInput.value = "PUT";

                // helper to set custom dropdown UI
                function setSelect(name, value) {
                    const hidden = form.querySelector(`[name="${name}"]`);
                    const wrapper = hidden.closest(".select-wrapper");
                    const label = wrapper.querySelector(".custom-select span");

                    hidden.value = value || "";

                    // update visible text
                    const optionText = wrapper.querySelector(`li[data-value="${value}"]`);
                    label.textContent = optionText ? optionText.textContent : "Select";
                }
                console.log(this.dataset)

                // fill normal inputs
                form.querySelector("[name='name']").value = this.dataset.name || "";
                form.querySelector("[name='designation']").value = this.dataset.designation || "";
                form.querySelector("[name='date_of_birth']").value = this.dataset.dob || "";
                form.querySelector("[name='date_of_appointment']").value = this.dataset.appointment || "";
                form.querySelector("[name='roles_and_responsibilities']").value = this.dataset.roles || "";
                form.querySelector("[name='total_years_of_experience']").value = this.dataset.experience || "";

                // fill dropdowns properly
                setSelect("nature_of_engagement", this.dataset.nature);
                setSelect("gender", this.dataset.gender);
                setSelect("highest_qualification", this.dataset.qualification);

            });
        });
    </script> --}}
    <script>
        document.getElementById("continueBtn").addEventListener("click", function () {
            const modal = new bootstrap.Modal(document.getElementById("addAnotherPartner"));
            modal.show();
        });
    </script>

    <script>
        document.getElementById("cancelBtn").addEventListener("click", function () {
            const modal = new bootstrap.Modal(document.getElementById("addPartner"));
            modal.show();
        });
    </script>
    @php
        $documentsRoute =
            auth('organization')->user()->role === 'fund_seeker'
            ? route('projects.apply.documents.startup', $fund->id)
            : route('projects.apply.documents.npo', $fund->id);
    @endphp

    <script>
        document.getElementById("goToDocuments").addEventListener("click", function () {
            window.location.href = "{{ $documentsRoute }}";
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection