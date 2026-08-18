@extends('superadmin.layouts.app')

@section('title', 'Applicants')
@section('header_title', 'Applicants')

@section('header_back', route('superadmin.dashboard'))
@section('content')
<p class="mb-3 header-text d-flex align-items-center gap-2 d-md-none">
    @hasSection('header_back')
    <a href="@yield('header_back')" class="arrow-icon d-flex align-items-center justify-content-center cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" fill="none">
            <path d="M8.25 0.75L0.75 8.25L8.25 15.75M0.75 8.25H18.75" stroke="black" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </a>
    @endif

    @yield('header_title', 'Dashboard')

</p>

<div class="card-box bg-white rounded">
    <div class="top-search-wrap p-3 mb-2">
        <div class="row justify-content-between align-items-center row-gap-2">
            <div class="col-auto">
                <div class="mb-0 fw-bold table-heading">
                    Applicants
                </div>

                <p class="text-muted mb-0">
                    {{ \App\Models\FundApplication::count() }} Applicants
                </p>
            </div>

            <div
                class="col-12 col-lg-10 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">

                <!-- Search -->
                <div class="search-bar input-group flex-nowrap position-relative" style="max-width: 273px;">

                    <input type="text" class="form-control search-input w-100" id="searchInput" placeholder="Search"
                        value="{{ request('search') }}">

                </div>

                <!-- Type Filter -->
                <div class="select-wrapper position-relative" style="max-width: 126px;">

                    <div class="custom-select form-control">
                        {{ request('type') ? ucwords(str_replace('_', ' ', request('type'))) : 'Type' }}
                    </div>

                    <ul class="select-list" style="display: none;">

                        <li data-value="">All</li>
                        <li data-value="csr_foundation">CSR Foundation</li>
                        <li data-value="vc_firm">VC Firm</li>

                    </ul>

                    <input type="hidden" name="type" class="hidden-select filter-field"
                        value="{{ request('type') }}">

                </div>

                <!-- Status Filter -->
                <div class="select-wrapper position-relative" style="max-width: 126px;">

                    <div class="custom-select form-control">
                        {{ request('status') ? ucwords(str_replace('_', ' ', request('status'))) : 'Status' }}
                    </div>

                    <ul class="select-list" style="display: none;">

                        <li data-value="">All</li>
                        <li data-value="verified">Verified</li>
                        <li data-value="non_verified">Non-Verified</li>

                    </ul>

                    <input type="hidden" name="status" class="hidden-select filter-field"
                        value="{{ request('status') }}">

                </div>

                <!-- Add Button -->

            </div>


        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">

        <table class="table align-middle">

            <thead class="table-light">
                <tr>
                    <th class="first-col">Organisation</th>
                    <th class="text-center">Fund</th>
                    {{-- <th class="text-center">Type</th> --}}
                    <th class="text-center">Contact</th>
                    <th class="text-center">PAN</th>
                    <th class="text-center">Vintage</th>
                    <th class="text-center">Turnover</th>
                    <th class="text-center">Applications</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($applicants as $applicant)
                @php
                $organization = $applicant->organization;
                if (!$organization) {
                continue;
                }
                // dd($organization);
                $profile = $organization?->profile;
                $operational = $organization?->operationalDetail;

                $statusClass = $organization?->email_verified_at
                ? 'bg-success-subtle text-success'
                : 'bg-warning-subtle text-warning';
                @endphp

                <tr>

                    <td>
                        <div class="dashboard-v2-name-cell">
                            <span class="hc-badge">
                                {{ strtoupper(substr($organization->organization_name ?? 'O', 0, 2)) }}
                            </span>

                            <span>
                                {{ $organization->organization_name ?? '-' }}
                            </span>
                        </div>
                    </td>

                    {{-- <td class="text-center">
                                {{ ucfirst($organization->role ?? '-') }}
                    </td> --}}

                    <td class="text-center">
                        {{ $applicant->fund->fund_name }}
                    </td>

                    <td class="text-center">
                        {{ $profile->contact_name ?? '-' }}
                        @if ($profile?->mobile_no)
                        <br>
                        <small>{{ $profile->mobile_no }}</small>
                        @endif
                    </td>

                    <td class="text-center">
                        {{ $profile->pan_number ?? '-' }}
                    </td>

                    <td class="text-center">
                        @if ($profile?->date_of_incorporation)
                        {{ \Carbon\Carbon::parse($profile->date_of_incorporation)->age }} Years
                        @else
                        -
                        @endif
                    </td>

                    <td class="text-center">
                        ₹{{ number_format($applicant->financialDocument->last_year_turnover ?? 0) }}
                    </td>

                    <td class="text-center">
                        {{ $organization->fundApplications_count ?? 1 }}
                    </td>

                    <td class="text-center">
                        <span class="badge {{ $statusClass }}">
                            {{ $organization?->email_verified_at ? 'Active' : 'Pending' }}
                        </span>
                    </td>

                    <td class="text-center action-btn ">
                        <a href=""
                            class="edit-btn edit-application border-0 bg-transparent p-0"
                            data-application='@json($applicant)'
                            data-bs-toggle="modal"
                            data-bs-target="#applicationModal">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z"
                                    stroke="#07CCB5"
                                    stroke-width="1.2" />
                            </svg>

</a>
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="9" class="text-center py-4">
                        No applicants found.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

<div class="modal fade" id="applicationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <div>
                    <h2 class="modal-title mb-2 inner-title" id="applicationModalTitle">
                        Edit Application Details
                    </h2>

                    <p class="small mb-0">
                        NPO - NPO001
                    </p>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body p-0">

                <form id="applicationForm"

                    method="POST">

                    @csrf

                    <div class="p-4">

                        <!-- Application ID -->
                        <input type="hidden"
                            name="application_id"
                            id="application_id">

                        <!-- Organization Name + Type -->
                        <div class="row g-3 mb-3">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Organization Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                    class="form-control py-2"
                                    id="organization_name"
                                    name="organization_name"
                                    placeholder="Enter Here"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Organization Type
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="select-wrapper w-100 position-relative">

                                    <div
                                        class="custom-select form-control py-2 d-flex justify-content-between align-items-center">
                                        <span class="text-muted">
                                            Select an option
                                        </span>
                                    </div>

                                    <input type="hidden"
                                        name="organization_type"
                                        id="organization_type"
                                        required
                                        class="hidden-select">

                                    <ul class="select-list checkbox-list-others"
                                        style="display: none;">

                                        <li data-value="npo">
                                            NPO
                                        </li>

                                        <li data-value="startup">
                                            Startup
                                        </li>

                                    </ul>

                                </div>
                            </div>

                        </div>


                        <!-- Contact Person + Email -->
                        <div class="row g-3 mb-3">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Contact Person
                                </label>

                                <input type="text"
                                    class="form-control py-2"
                                    id="contact_person"
                                    name="contact_person"
                                    placeholder="Enter here">

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Email Address
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="email"
                                    class="form-control py-2"
                                    id="email"
                                    name="email"
                                    placeholder="Enter Email Address"
                                    required>

                            </div>

                        </div>


                        <!-- Phone + State -->
                        <div class="row g-3 mb-3">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Phone Number
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                    class="form-control py-2"
                                    id="phone_number"
                                    name="phone_number"
                                    placeholder="Enter here"
                                    required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    State
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="select-wrapper w-100 position-relative checkbox-wrap">

                                    <div id="selectedStatesBox"
                                        class="custom-select form-control d-flex flex-wrap gap-2 align-items-center">

                                        <span class="placeholder">
                                            Select State
                                        </span>

                                    </div>

                                    <ul class="select-list checkbox-list-others"
                                        id="applicationStateList">

                                        <li>
                                            <input type="checkbox" value="Pan India" id="application_state_0">
                                            <label for="application_state_0">Pan India</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Andhra Pradesh" id="application_state_1">
                                            <label for="application_state_1">Andhra Pradesh</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Arunachal Pradesh" id="application_state_2">
                                            <label for="application_state_2">Arunachal Pradesh</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Assam" id="application_state_3">
                                            <label for="application_state_3">Assam</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Bihar" id="application_state_4">
                                            <label for="application_state_4">Bihar</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Chhattisgarh" id="application_state_5">
                                            <label for="application_state_5">Chhattisgarh</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Goa" id="application_state_6">
                                            <label for="application_state_6">Goa</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Gujarat" id="application_state_7">
                                            <label for="application_state_7">Gujarat</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Haryana" id="application_state_8">
                                            <label for="application_state_8">Haryana</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Himachal Pradesh" id="application_state_9">
                                            <label for="application_state_9">Himachal Pradesh</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Jharkhand" id="application_state_10">
                                            <label for="application_state_10">Jharkhand</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Karnataka" id="application_state_11">
                                            <label for="application_state_11">Karnataka</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Kerala" id="application_state_12">
                                            <label for="application_state_12">Kerala</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Madhya Pradesh" id="application_state_13">
                                            <label for="application_state_13">Madhya Pradesh</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Maharashtra" id="application_state_14">
                                            <label for="application_state_14">Maharashtra</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Manipur" id="application_state_15">
                                            <label for="application_state_15">Manipur</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Meghalaya" id="application_state_16">
                                            <label for="application_state_16">Meghalaya</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Mizoram" id="application_state_17">
                                            <label for="application_state_17">Mizoram</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Nagaland" id="application_state_18">
                                            <label for="application_state_18">Nagaland</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Odisha" id="application_state_19">
                                            <label for="application_state_19">Odisha</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Punjab" id="application_state_20">
                                            <label for="application_state_20">Punjab</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Rajasthan" id="application_state_21">
                                            <label for="application_state_21">Rajasthan</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Sikkim" id="application_state_22">
                                            <label for="application_state_22">Sikkim</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Tamil Nadu" id="application_state_23">
                                            <label for="application_state_23">Tamil Nadu</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Telangana" id="application_state_24">
                                            <label for="application_state_24">Telangana</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Tripura" id="application_state_25">
                                            <label for="application_state_25">Tripura</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Uttar Pradesh" id="application_state_26">
                                            <label for="application_state_26">Uttar Pradesh</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="Uttarakhand" id="application_state_27">
                                            <label for="application_state_27">Uttarakhand</label>
                                        </li>

                                        <li>
                                            <input type="checkbox" value="West Bengal" id="application_state_28">
                                            <label for="application_state_28">West Bengal</label>
                                        </li>

                                        <li>
                                            <input type="checkbox"
                                                value="Andaman and Nicobar Islands"
                                                id="application_state_29">
                                            <label for="application_state_29">
                                                Andaman and Nicobar Islands
                                            </label>
                                        </li>

                                        <li>
                                            <input type="checkbox"
                                                value="Chandigarh"
                                                id="application_state_30">
                                            <label for="application_state_30">
                                                Chandigarh
                                            </label>
                                        </li>

                                        <li>
                                            <input type="checkbox"
                                                value="Dadra and Nagar Haveli and Daman and Diu"
                                                id="application_state_31">
                                            <label for="application_state_31">
                                                Dadra and Nagar Haveli and Daman and Diu
                                            </label>
                                        </li>

                                        <li>
                                            <input type="checkbox"
                                                value="Delhi"
                                                id="application_state_32">
                                            <label for="application_state_32">
                                                Delhi
                                            </label>
                                        </li>

                                        <li>
                                            <input type="checkbox"
                                                value="Jammu and Kashmir"
                                                id="application_state_33">
                                            <label for="application_state_33">
                                                Jammu and Kashmir
                                            </label>
                                        </li>

                                        <li>
                                            <input type="checkbox"
                                                value="Ladakh"
                                                id="application_state_34">
                                            <label for="application_state_34">
                                                Ladakh
                                            </label>
                                        </li>

                                        <li>
                                            <input type="checkbox"
                                                value="Lakshadweep"
                                                id="application_state_35">
                                            <label for="application_state_35">
                                                Lakshadweep
                                            </label>
                                        </li>

                                        <li>
                                            <input type="checkbox"
                                                value="Puducherry"
                                                id="application_state_36">
                                            <label for="application_state_36">
                                                Puducherry
                                            </label>
                                        </li>

                                    </ul>

                                    <input type="hidden"
                                        name="state"
                                        id="state"
                                        required
                                        class="hidden-select">

                                </div>

                            </div>

                        </div>


                        <!-- Status + PAN -->
                        <div class="row g-3 mb-3">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Status
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="select-wrapper w-100 position-relative">

                                    <div
                                        class="custom-select form-control py-2 d-flex justify-content-between align-items-center">

                                        <span class="text-muted">
                                            Select Status
                                        </span>

                                    </div>


                                    <input type="hidden"
                                        name="status"
                                        id="status"
                                        required
                                        class="hidden-select">


                                    <ul class="select-list checkbox-list"
                                        style="display: none;">

                                        <li data-value="active">
                                            Active
                                        </li>
                                        <li data-value="inactive">
                                            In-Active
                                        </li>

                                        <li data-value="draft">
                                            Draft
                                        </li>

                                    </ul>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    PAN
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                    class="form-control py-2"
                                    id="pan_number"
                                    name="pan_number"
                                    placeholder="Enter here"
                                    required>

                            </div>

                        </div>


                        <!-- Vintage + Annual Turnover -->
                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Vintage
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                    class="form-control py-2"
                                    id="vintage"
                                    name="vintage"
                                    placeholder="Enter here"
                                    required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Annual Turnover
                                </label>

                                <input type="text" inputmode="numeric"
                                    class="form-control py-2"
                                    id="annual_turnover"
                                    name="annual_turnover"
                                    placeholder="Enter here">

                            </div>

                        </div>

                    </div>


                    <!-- Footer -->
                    <div style="border-radius:0px 0px 8px 8px;"
                        class="modal-footer border-0 d-flex justify-content-center justify-content-md-end gap-2 steps-btn pe-lg-4 flex-wrap">

                        <button type="button"
                            class="btn simple-btn m-0"
                            data-bs-dismiss="modal">

                            Cancel

                        </button>


                        <button type="submit"
                            id="applicationSubmitBtn"
                            class="btn gradient-btn m-0">

                            Save Application

                        </button>

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
    // Debounce Helper
    function debounce(callback, delay = 500) {

        let timeout;

        return (...args) => {

            clearTimeout(timeout);

            timeout = setTimeout(() => {
                callback(...args);
            }, delay);

        };

    }

    // Update URL Params
    function updateFilters() {

        const params = new URLSearchParams(window.location.search);

        // Search
        const search = document.getElementById('searchInput').value;

        if (search) {
            params.set('search', search);
        } else {
            params.delete('search');
        }

        // Type
        const type = document.querySelector('input[name="type"]').value;

        if (type) {
            params.set('type', type);
        } else {
            params.delete('type');
        }

        // Status
        const status = document.querySelector('input[name="status"]').value;

        if (status) {
            params.set('status', status);
        } else {
            params.delete('status');
        }

        window.location.href = `{{ route('superadmin.applicants.index') }}?${params.toString()}`;

    }

    // Search Debounce
    document.getElementById('searchInput')
        .addEventListener('keyup', debounce(updateFilters, 500));

    // Custom Select Click
    document.querySelectorAll(
        '.select-list:not(.checkbox-list):not(.checkbox-list-others) li'
    ).forEach(item => {

        item.addEventListener('click', function() {

            const wrapper = this.closest('.select-wrapper');

            const hiddenInput = wrapper.querySelector('.hidden-select');

            const customSelect = wrapper.querySelector('.custom-select');

            hiddenInput.value = this.dataset.value;

            customSelect.innerText = this.innerText;

            updateFilters();

        });

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const modal = document.getElementById('applicationModal');
        const form = document.getElementById('applicationForm');
        const title = document.getElementById('applicationModalTitle');


        /*
        |--------------------------------------------------------------------------
        | Set normal input value
        |--------------------------------------------------------------------------
        */

        function setValue(id, value) {

            const element = document.getElementById(id);

            if (!element) {
                return;
            }

            element.value = value ?? '';
        }


        /*
        |--------------------------------------------------------------------------
        | Set custom select value
        |--------------------------------------------------------------------------
        */

        function setCustomSelect(inputId, value) {

            const input = document.getElementById(inputId);

            if (!input) {
                return;
            }

            input.value = value ?? '';

            const wrapper = input.closest('.select-wrapper');

            if (!wrapper) {
                return;
            }

            const display = wrapper.querySelector('.custom-select span');

            if (!display) {
                return;
            }

            const option = wrapper.querySelector(
                `.select-list li[data-value="${CSS.escape(value ?? '')}"]`
            );

            if (option) {

                display.innerText = option.innerText.trim();
                display.classList.remove('text-muted');

            } else {

                display.innerText = 'Select an option';
                display.classList.add('text-muted');

            }
        }


        /*
        |--------------------------------------------------------------------------
        | Edit Application
        |--------------------------------------------------------------------------
        */

        document.querySelectorAll('.edit-application').forEach(button => {

            button.addEventListener('click', function(e) {
                e.preventDefault();

                let application = {};

                try {

                    application = JSON.parse(
                        this.dataset.application || '{}'
                    );

                    console.log('Application:', application);

                } catch (error) {

                    console.error(
                        'Unable to parse application data:',
                        error
                    );

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | Modal Title
                |--------------------------------------------------------------------------
                */

                title.innerText = 'Edit Application Details';


                /*
                |--------------------------------------------------------------------------
                | Main Objects
                |--------------------------------------------------------------------------
                */

                const organization = application.organization || {};

                const profile = organization.profile || {};

                const operationalDetail =
                    organization.operational_detail || {};


                /*
                |--------------------------------------------------------------------------
                | Application ID
                |--------------------------------------------------------------------------
                */

                setValue(
                    'application_id',
                    application.id
                );


                /*
                |--------------------------------------------------------------------------
                | Organization Name
                |--------------------------------------------------------------------------
                */

                setValue(
                    'organization_name',
                    organization.organization_name
                );


                /*
                |--------------------------------------------------------------------------
                | Organization Type
                |--------------------------------------------------------------------------
                |
                | Backend:
                |
                | funder      => NPO
                | fund_seeker => Startup
                |
                */

                let organizationType = '';

                if (organization.role === 'funder') {

                    organizationType = 'npo';

                } else if (organization.role === 'fund_seeker') {

                    organizationType = 'startup';

                }

                setCustomSelect(
                    'organization_type',
                    organizationType
                );


                /*
                |--------------------------------------------------------------------------
                | Contact Person
                |--------------------------------------------------------------------------
                */

                setValue(
                    'contact_person',
                    profile.contact_name
                );


                /*
                |--------------------------------------------------------------------------
                | Email
                |--------------------------------------------------------------------------
                */

                setValue(
                    'email',
                    organization.work_email
                );


                /*
                |--------------------------------------------------------------------------
                | Phone Number
                |--------------------------------------------------------------------------
                */

                setValue(
                    'phone_number',
                    profile.mobile_no
                );


                /*
                |--------------------------------------------------------------------------
                | State
                |--------------------------------------------------------------------------
                */

                const state = operationalDetail.state || '';

                populateApplicationStates(operationalDetail.state);

                /*
                |--------------------------------------------------------------------------
                | Application Status
                |--------------------------------------------------------------------------
                */

                setCustomSelect(
                    'status',
                    application.status
                );


                /*
                |--------------------------------------------------------------------------
                | PAN
                |--------------------------------------------------------------------------
                */

                setValue(
                    'pan_number',
                    profile.pan_number
                );


                /*
|--------------------------------------------------------------------------
| Vintage
|--------------------------------------------------------------------------
| Calculate age from date_of_incorporation
*/

                let vintage = '';

                if (profile.date_of_incorporation) {

                    const incorporationDate = new Date(
                        profile.date_of_incorporation
                    );

                    const today = new Date();

                    vintage =
                        today.getFullYear() -
                        incorporationDate.getFullYear();

                    const monthDifference =
                        today.getMonth() -
                        incorporationDate.getMonth();

                    const dayDifference =
                        today.getDate() -
                        incorporationDate.getDate();

                    // Birthday/incorporation anniversary hasn't occurred yet this year
                    if (
                        monthDifference < 0 ||
                        (monthDifference === 0 && dayDifference < 0)
                    ) {
                        vintage--;
                    }
                }

                setValue('vintage', vintage);


                /*
                |--------------------------------------------------------------------------
                | Annual Turnover
                |--------------------------------------------------------------------------
                |
                | Database value:
                | last_year_revenue_lakh
                |
                */

                setValue(
                    'annual_turnover',
                    operationalDetail.last_year_revenue_lakh
                );


                /*
                |--------------------------------------------------------------------------
                | Form Action
                |--------------------------------------------------------------------------
                */

                form.action =
                    "{{ route('superadmin.applications.update.details') }}";


                /*
                |--------------------------------------------------------------------------
                | Debug
                |--------------------------------------------------------------------------
                */

                console.log('Organization:', organization);
                console.log('Profile:', profile);
                console.log('Operational Detail:', operationalDetail);

            });

        });

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const selectedBox = document.getElementById('selectedStatesBox');
        const dropdown = document.getElementById('applicationStateList');
        const hiddenInput = document.getElementById('state');

        if (!selectedBox || !dropdown || !hiddenInput) {
            return;
        }

        const checkboxes = dropdown.querySelectorAll(
            'input[type="checkbox"]'
        );

        const panIndiaCheckbox = dropdown.querySelector(
            'input[value="Pan India"]'
        );


        /*
        |--------------------------------------------------------------------------
        | Update Selected States UI
        |--------------------------------------------------------------------------
        */

        function updateSelectedStates() {

            const selected = [];

            selectedBox.innerHTML = '';

            checkboxes.forEach(function(checkbox) {

                if (checkbox.checked) {

                    selected.push(checkbox.value);

                    const tag = document.createElement('div');

                    tag.className = 'state-tag';

                    tag.innerHTML = `
                    <span>${checkbox.value}</span>
                    <span
                        class="remove-state"
                        data-value="${checkbox.value}"
                        style="cursor:pointer;margin-left:6px;">
                        &times;
                    </span>
                `;

                    selectedBox.appendChild(tag);
                }

            });


            if (selected.length === 0) {

                selectedBox.innerHTML =
                    '<span class="placeholder">Select State</span>';

            }


            hiddenInput.value = selected.join(',');

        }


        /*
        |--------------------------------------------------------------------------
        | Pan India Logic
        |--------------------------------------------------------------------------
        */

        function handlePanIndiaSelection() {

            if (!panIndiaCheckbox) {
                return;
            }

            checkboxes.forEach(function(checkbox) {

                if (checkbox === panIndiaCheckbox) {
                    return;
                }

                if (panIndiaCheckbox.checked) {

                    checkbox.checked = false;
                    checkbox.disabled = true;

                    checkbox.parentElement.style.pointerEvents = 'none';
                    checkbox.parentElement.style.opacity = '0.5';

                } else {

                    checkbox.disabled = false;

                    checkbox.parentElement.style.pointerEvents = '';
                    checkbox.parentElement.style.opacity = '';

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Open / Close Dropdown
        |--------------------------------------------------------------------------
        */

        selectedBox.addEventListener('click', function(e) {

            if (e.target.classList.contains('remove-state')) {
                return;
            }

            e.stopPropagation();

            dropdown.classList.toggle('show');

        });


        document.addEventListener('click', function() {

            dropdown.classList.remove('show');

        });


        dropdown.addEventListener('click', function(e) {

            e.stopPropagation();

            // Prevent any parent click handler from treating this
            // as a form/button/action click.
            if (
                e.target.tagName === 'LI' ||
                e.target.tagName === 'LABEL'
            ) {
                e.stopImmediatePropagation();
            }

        });

        /*
        |--------------------------------------------------------------------------
        | Checkbox Change
        |--------------------------------------------------------------------------
        */

        checkboxes.forEach(function(checkbox) {

            checkbox.addEventListener('change', function() {

                if (this === panIndiaCheckbox) {

                    handlePanIndiaSelection();

                } else if (this.checked && panIndiaCheckbox) {

                    panIndiaCheckbox.checked = false;

                    handlePanIndiaSelection();

                }

                updateSelectedStates();

            });

        });


        /*
        |--------------------------------------------------------------------------
        | Remove Selected State
        |--------------------------------------------------------------------------
        */

        selectedBox.addEventListener('click', function(e) {

            if (!e.target.classList.contains('remove-state')) {
                return;
            }

            e.preventDefault();
            e.stopPropagation();

            const value = e.target.dataset.value;

            const checkbox = Array.from(checkboxes).find(
                cb => cb.value === value
            );

            if (checkbox) {

                checkbox.checked = false;

                checkbox.dispatchEvent(
                    new Event('change')
                );

            }

        });


        /*
        |--------------------------------------------------------------------------
        | Populate States When Editing Application
        |--------------------------------------------------------------------------
        */

        window.populateApplicationStates = function(stateValue) {

            /*
             * Reset everything first
             */
            checkboxes.forEach(function(checkbox) {

                checkbox.checked = false;
                checkbox.disabled = false;

                checkbox.parentElement.style.pointerEvents = '';
                checkbox.parentElement.style.opacity = '';

            });


            if (!stateValue) {

                updateSelectedStates();

                return;
            }


            /*
             * Database stores:
             *
             * Assam,Bihar,Chhattisgarh,Gujarat
             *
             * Convert to:
             *
             * ['Assam', 'Bihar', 'Chhattisgarh', 'Gujarat']
             */

            let states = [];

            if (Array.isArray(stateValue)) {

                states = stateValue;

            } else {

                states = String(stateValue)
                    .split(',')
                    .map(state => state.trim())
                    .filter(state => state !== '');

            }


            /*
             * Populate checkboxes
             */

            states.forEach(function(state) {

                const checkbox = Array.from(checkboxes).find(
                    cb => cb.value === state
                );

                if (checkbox) {
                    checkbox.checked = true;
                }

            });


            /*
             * Apply Pan India rules
             */

            if (
                panIndiaCheckbox &&
                states.includes('Pan India')
            ) {

                panIndiaCheckbox.checked = true;

            }


            handlePanIndiaSelection();

            updateSelectedStates();

        };


        /*
        |--------------------------------------------------------------------------
        | Initial State
        |--------------------------------------------------------------------------
        */

        updateSelectedStates();

    });
</script>


@endsection