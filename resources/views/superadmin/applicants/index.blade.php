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

                            <td class="text-center action-btn">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#reviewerModal" class="edit-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z"
                                            stroke="#07CCB5" stroke-width="1.2" />
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

    <div class="modal fade" id="reviewerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <div>
                        <h2 class="modal-title mb-2 inner-title" id="reviewerModalTitle">
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

                    <form id="reviewerForm" action="{{ route('client-admin.reviewers.store') }}" method="POST">

                        @csrf

                        <div class="p-4">

                            <input type="hidden" name="reviewer_id" id="reviewer_id">

                            <!-- Name + Email -->
                            <div class="row g-3 mb-3">

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Organization Name
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="organization_name"
                                        name="organization_name" placeholder="Enter Here" required>
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
                                        <input type="hidden" name="status" id="status" required
                                            class="hidden-select">
                                        <ul class="select-list" style="display: none;">
                                            <li data-value="verified">Verified</li>
                                            <li data-value="non_verified">Non-Verified</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <!-- Phone + Password -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Contact Person
                                    </label>
                                    <input type="text" class="form-control py-2" id="contact_person"
                                        name="contact_person" placeholder="Enter here">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Email Address
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="email" class="form-control py-2" id="email" name="email"
                                        placeholder="Enter Email Address" required>
                                </div>

                            </div>

                            <!-- Role + Expertise -->
                            <div class="row g-3 mb-3">

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Phone Number<span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control py-2" id="phone-nbr" name="phone-nbr"
                                        placeholder="Enter here">
                                </div>

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


                            </div>

                            <!-- Status -->
                            <div class="row g-3 mb-3">
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

                                        <input type="hidden" name="status" id="status" required
                                            class="hidden-select">

                                        <ul class="select-list" style="display: none;">
                                            <li data-value="verified">Verified</li>
                                            <li data-value="non_verified">Non-Verified</li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        PAN<span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control py-2" id="pan-nbr" name="pan-nbr"
                                        placeholder="Enter here">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Vintage<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control py-2" id="Vintage" name="Vintage"
                                        placeholder="Enter here">
                                </div>
                                 <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Annual Turnover
                                    </label>
                                    <input type="text" class="form-control py-2" id="annual_turnover" name="annual_turnover"
                                        placeholder="Enter here">
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div style="border-radius:0px 0px 8px 8px;"
                            class="modal-footer border-0 d-flex justify-content-center justify-content-md-end gap-2 steps-btn pe-lg-4 flex-wrap">

                            <button type="button" class="btn simple-btn m-0" data-bs-dismiss="modal">
                                Cancel
                            </button>

                            <button type="submit" id="reviewerSubmitBtn" class="btn gradient-btn m-0">
                                Save Client
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
        document.querySelectorAll('.select-list li').forEach(item => {

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
@endsection
