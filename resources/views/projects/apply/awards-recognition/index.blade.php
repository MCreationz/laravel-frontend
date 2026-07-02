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
                    <button class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#addAward">
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
                    @forelse($awards as $award)
                        <tr>
                            <td>{{ $award->award_name }}</td>
                            <td>{{ $award->awarding_organization }}</td>
                            <td>{{ $award->year }}</td>
                            <td class="d-flex justify-content-center align-items-center gap-2">

                                <!-- EDIT -->
                                <button type="button" class="edit-btn border-0 bg-transparent p-1" data-id="{{ $award->id }}"
                                    data-award_name="{{ $award->award_name }}"
                                    data-awarding_organization="{{ $award->awarding_organization }}"
                                    data-year="{{ $award->year }}"  data-certificate="{{ $award->certificate }}" data-bs-toggle="modal" data-bs-target="#addAward">

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

                                <!-- DELETE -->
                                <form method="POST"
                                    action="{{ route('projects.apply.awards-recognition.destroy', [$fund->id, $award->id]) }}"
                                    onsubmit="return confirm('Delete this award?')">

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
                            <td colspan="4" class="text-center">
                                No awards added yet.
                            </td>
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
                    Submit
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addAward" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h2 class="modal-title mb-2 inner-title" id="addPartnerLabel">
                            Awards & Recognitions
                        </h2>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body p-0">

                    <form id="AwardForm" action="{{ route('projects.apply.awards-recognition.store', $fund->id) }}"
                        method="POST" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="id" id="edit_id">

                        <div class="p-3">

                            <div class="row g-3 mb-3">

                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Name of the Award <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" name="award_name" id="award_name"
                                        placeholder="Enter Award Name" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Awarding Organization <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" name="awarding_organization"
                                        id="awarding_organization" placeholder="Enter Awarding Organization" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Year <span class="text-danger">*</span>
                                    </label>

                                    <select name="year" id="year" class="form-control py-2" required>
                                        <option value="">Select Year</option>

                                        @for($year = date('Y'); $year >= 2000; $year--)
                                            <option value="{{ $year }}">
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">
                                        Upload Certificate <span class="text-danger">*</span>
                                    </label>

                                    <input type="file" id="certificate" name="certificate" hidden>

                                    <label for="certificate" class="upload-label">
                                        <div class="upload-content">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                viewBox="0 0 26 26" fill="none">
                                                <g opacity="0.2">
                                                    <path d="M9.75 11.917V18.417L11.9167 16.2503" stroke="#292D32"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.7526 18.4167L7.58594 16.25" stroke="#292D32"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M23.8307 10.8337V16.2503C23.8307 21.667 21.6641 23.8337 16.2474 23.8337H9.7474C4.33073 23.8337 2.16406 21.667 2.16406 16.2503V9.75032C2.16406 4.33366 4.33073 2.16699 9.7474 2.16699H15.1641"
                                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M23.8307 10.8337H19.4974C16.2474 10.8337 15.1641 9.75033 15.1641 6.50033V2.16699L23.8307 10.8337Z"
                                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                            </svg>

                                            <p class="mt-2">Upload pdf/JPG upto 5 MB</p>

                                            <small id="certificate_name"></small>
                                            @if (!empty($award->certificate))
    <a href="{{ asset('storage/' . $award->certificate) }}"
       target="_blank"
       class="text-success d-block mb-1">
        View existing certificate
    </a>
@endif

                                            <small id="current_certificate" class="text-success d-block mt-1">
                                            </small>

                                        </div>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer border-0 d-flex justify-content-end gap-2">
                            <button type="button" class="btn simple-btn" data-bs-dismiss="modal">
                                Cancel
                            </button>

                            <button type="submit" class="btn gradient-btn" id="submitBtn">
                                Add
                            </button>
                        </div>

                    </form>

                </div>


            </div>
        </div>
    </div>


    <div class="modal fade" id="submitAward" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Header (same style as main modal) -->
                <div class="modal-header border-0 pb-0">
                    <div></div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Body -->
                <div class="modal-body p-0">
                    <div class="p-3 px-lg-4 text-center">
                        <div class="edit-top-icon mb-3">
                            <img src="{{ asset('img/edit-icon.png') }}" alt="">
                        </div>
                        <h2 class="modal-title mb-2 inner-title">
                            Your Application Has Been Submitted Successfully
                        </h2>
                        <p class="text-muted mb-0">
                            Thank you for applying. We have received your application and will review it shortly.
                        </p>
                    </div>
                </div>
                <!-- Footer (same structure as first modal) -->
                <div class="modal-footer border-0 d-flex justify-content-end gap-2 flex-wrap px-lg-4">

                    <button type="button" class="btn gradient-btn w-100"
                        onclick="window.location.href='{{ route('dashboard') }}'">
                        Go To My Projects
                    </button>

                    <button type="button" class="btn simple-btn w-100" id="goToDocuments">
                        Back
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

        const form = document.getElementById("AwardForm");
        const id = this.dataset.id;

        form.action = "{{ url('projects/' . $fund->id . '/apply/awards-recognition') }}/" + id;

        let methodInput = form.querySelector("input[name='_method']");
        if (!methodInput) {
            methodInput = document.createElement("input");
            methodInput.type = "hidden";
            methodInput.name = "_method";
            form.appendChild(methodInput);
        }
        methodInput.value = "PUT";

        document.getElementById("edit_id").value = id;

        form.querySelector("[name='award_name']").value =
            this.dataset.award_name || "";

        form.querySelector("[name='awarding_organization']").value =
            this.dataset.awarding_organization || "";

        form.querySelector("[name='year']").value =
            this.dataset.year || "";

        const fileInput = document.getElementById("certificate");

        const hasFile = this.dataset.certificate && this.dataset.certificate !== "";

        if (hasFile) {
            fileInput.removeAttribute("required");
        } else {
            fileInput.setAttribute("required", "required");
        }

        form.querySelector("button[type='submit']").textContent = "Update";
    });
});
</script>




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
            const modal = new bootstrap.Modal(document.getElementById("submitAward"));
            modal.show();
        });
    </script>

    <script>
        document.getElementById("cancelBtn").addEventListener("click", function () {
            const modal = new bootstrap.Modal(document.getElementById("addAward"));
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
            location.reload();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('input[type="file"]').forEach(input => {

                input.setAttribute(
                    'accept',
                    '.pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                );

                input.addEventListener('change', function () {

                    if (!this.files.length) return;

                    const file = this.files[0];
                    const ext = file.name.split('.').pop().toLowerCase();

                    if (!['pdf', 'doc', 'docx'].includes(ext)) {

                        alert('Only PDF, DOC and DOCX files are allowed.');

                        this.value = '';

                        const fileNameEl =
                            document.getElementById(this.id + '_name');

                        if (fileNameEl) {
                            fileNameEl.textContent = '';
                        }
                    }
                });

            });

        });
    </script>
@endsection