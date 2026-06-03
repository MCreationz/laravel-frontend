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
        {{-- <div class="table-responsive">
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
        </div> --}}
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

                <tbody>
                    @forelse($managements as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{ $item->name }}</td>

                                    <td>{{ $item->designation ?? '-' }}</td>

                                    <td>{{ ucfirst(str_replace('_', ' ', $item->nature_of_engagement ?? '-')) }}</td>

                                    <td>
                                        {{ $item->date_of_appointment
                        ? \Carbon\Carbon::parse($item->date_of_appointment)->format('d/m/Y')
                        : '-' }}
                                    </td>

                                    <td>
                                        {{ $item->total_years_of_experience !== null
                        ? $item->total_years_of_experience . ' Years'
                        : '-' }}
                                    </td>

                                    <td class="d-flex justify-content-center align-items-center gap-2">

                                        <!-- EDIT -->
                                        <button type="button" class="edit-btn border-0 bg-transparent p-1" data-id="{{ $item->id }}"
                                            data-name="{{ $item->name }}" data-designation="{{ $item->designation }}"
                                            data-nature="{{ $item->nature_of_engagement }}" data-gender="{{ $item->gender }}"
                                            data-dob="{{ $item->date_of_birth ? \Carbon\Carbon::parse($item->date_of_birth)->format('Y-m-d') : '' }}"
                                            data-appointment="{{ $item->date_of_appointment ? \Carbon\Carbon::parse($item->date_of_appointment)->format('Y-m-d') : '' }}"
                                            data-qualification="{{ $item->highest_qualification }}"
                                            data-roles="{{ $item->roles_and_responsibilities }}"
                                            data-experience="{{ $item->total_years_of_experience }}" data-bs-toggle="modal"
                                            data-bs-target="#addPartner">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                                fill="none">

                                                <path
                                                    d="M8.8198 2.39503L3.35707 8.17714C3.1508 8.39671 2.95119 8.8292 2.91127 9.12862L2.66508 11.2844C2.57858 12.0629 3.1375 12.5952 3.90933 12.4621L6.05184 12.0962C6.35126 12.043 6.77044 11.8234 6.97671 11.5972L12.4394 5.81506C13.3843 4.81699 13.8101 3.6792 12.3396 2.28857C10.8758 0.911245 9.76463 1.39697 8.8198 2.39503Z"
                                                    stroke="#07CCB5" stroke-width="1.2" stroke-linecap="round"
                                                    stroke-linejoin="round" />

                                                <path d="M7.91406 3.35938C8.20017 5.19581 9.69061 6.59975 11.5404 6.78605"
                                                    stroke="#07CCB5" stroke-width="1.2" stroke-linecap="round"
                                                    stroke-linejoin="round" />

                                                <path d="M2 14.6387H13.9767" stroke="#07CCB5" stroke-width="1.2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </button>
                                        </button>

                                        <!-- DELETE -->
                                        <form method="POST"
                                            action="{{ route('projects.apply.senior-management.destroy', [$fund->id, $item->id]) }}"
                                            onsubmit="return confirm('Delete this record?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="border-0 bg-transparent p-1">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15"
                                                    fill="none">

                                                    <path
                                                        d="M7.91403 5.09124L7.68381 11.0796M4.498 11.0796L4.26778 5.09124M8.58606 2.69123C9.3604 2.75118 10.1323 2.83929 10.9002 2.95538C11.1278 2.98998 11.354 3.02658 11.5802 3.06584M10.9002 2.95538L10.1896 12.1928C10.1606 12.5689 9.99071 12.9201 9.71388 13.1764C9.43706 13.4326 9.07371 13.5749 8.69651 13.5748H3.4853C3.10809 13.5749 2.74475 13.4326 2.46792 13.1764C2.1911 12.9201 2.0212 12.5689 1.9922 12.1928L1.28158 2.95538M1.28158 2.95538C1.05402 2.98932 0.82779 3.02591 0.601562 3.06517M1.28158 2.95538C2.04951 2.83929 2.82141 2.75118 3.59575 2.69123M8.58606 2.69123V2.08175C8.58606 1.2966 7.98057 0.641875 7.19543 0.617256C6.45927 0.593727 5.72254 0.593727 4.98638 0.617256C4.20124 0.641875 3.59575 1.29727 3.59575 2.08175V2.69123M8.58606 2.69123C6.9251 2.56286 5.25671 2.56286 3.59575 2.69123"
                                                        stroke="#E74C3C" stroke-width="1.2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </button>

                                        </form>

                                    </td>
                                </tr>
                    @empty
                        <tr>
                            <td colspan="7">No records found</td>
                        </tr>
                    @endforelse
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
    </script>
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
    $documentsRoute = auth('organization')->user()->role === 'fund_seeker'
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