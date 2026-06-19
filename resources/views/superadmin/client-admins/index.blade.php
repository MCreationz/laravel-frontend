@extends('superadmin.layouts.app')

@section('title', 'Client Admin')
@section('header_title', 'Client Admins')

@section('header_back', route('superadmin.dashboard'))
@section('content')
            <p class="mb-3 header-text d-flex align-items-center gap-2 d-md-none">
                @hasSection('header_back')
                    <a href="@yield('header_back')" 
                       class="arrow-icon d-flex align-items-center justify-content-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                            viewBox="0 0 20 17" fill="none">
                            <path d="M8.25 0.75L0.75 8.25L8.25 15.75M0.75 8.25H18.75"
                                stroke="black" stroke-width="1.5"
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
                        Client Admins
                    </div>

                    <p class="text-muted mb-0">
                        {{ \App\Models\ClientAdmin::count() }} Organisations
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
                    <button class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#clientAdminModal">

                        + Client Admin

                    </button>

                </div>


            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-middle">

                <thead class="table-light">
                    <tr>
                        <th class="first-col">Organisation</th>
                        <th class="second-col text-center">Type</th>
                        <th class="third-col text-center">Contact</th>
                        <th>State</th>
                        <th class="text-center">Funds</th>
                        <th class="text-center">Outlay</th>
                        <th class="text-center">Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($clientAdmins as $clientAdmin)
                        <tr>

                            <!-- Organisation -->
                            <td>
                                <div class="d-flex align-items-center gap-2">

                                    <div class="px-2 py-1 fw-bold gradient-text">
                                        {{ strtoupper(substr($clientAdmin->organization_name, 0, 2)) }}
                                    </div>

                                    <span class="fw-medium">
                                        {{ $clientAdmin->organization_name }}
                                    </span>

                                </div>
                            </td>

                            <!-- Type -->
                            <td class="text-center text-nowrap">
                                {{ ucwords(str_replace('_', ' ', $clientAdmin->organization_type)) }}
                            </td>

                            <!-- Contact -->
                            <td class="text-center text-nowrap">
                                {{ $clientAdmin->primary_contact_name }}
                                <br>

                                <small class="text-muted">
                                    {{ $clientAdmin->phone_number }}
                                </small>
                            </td>

                            <!-- State -->
                            <td>
                                {{ $clientAdmin->state }}
                            </td>

                            <!-- Funds -->
                            <td class="text-center">
                                <a href="#" class="text-decoration-none">
                                    0
                                </a>
                            </td>

                            <!-- Outlay -->
                            <td class="text-center text-nowrap">
                                ₹0
                            </td>

                            <!-- Status -->
                            <td class="text-center">

                                @if ($clientAdmin->status === 'verified')
                                    <span class="badge bg-success-subtle text-success">
                                        Verified
                                    </span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger">
                                        Non-Verified
                                    </span>
                                @endif

                            </td>

                            <!-- Actions -->
                            <td class="action-btn">

                                <div class="btn-group gap-1">

                                    <!-- View -->
                                    {{-- <a href="{{ route('superadmin.client-admins.show', $clientAdmin->id) }}"
                                        class="view-btn">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">

                                            <g clip-path="url(#clip0_4400_2140)">
                                                <path
                                                    d="M1.35475 8.19903C1.30883 8.06102 1.30883 7.91184 1.35475 7.77383C2.27769 4.99704 4.89743 2.99414 7.98497 2.99414C11.0712 2.99414 13.6896 4.99505 14.6145 7.7705C14.6611 7.90824 14.6611 8.0573 14.6145 8.1957C13.6922 10.9725 11.0725 12.9754 7.98497 12.9754C4.89876 12.9754 2.27968 10.9745 1.35475 8.19903Z"
                                                    stroke="#0160D6" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />

                                                <path
                                                    d="M9.98469 7.98453C9.98469 8.51397 9.77437 9.02172 9.4 9.39609C9.02563 9.77046 8.51788 9.98078 7.98844 9.98078C7.459 9.98078 6.95124 9.77046 6.57688 9.39609C6.20251 9.02172 5.99219 8.51397 5.99219 7.98453C5.99219 7.45509 6.20251 6.94734 6.57688 6.57297C6.95124 6.1986 7.459 5.98828 7.98844 5.98828C8.51788 5.98828 9.02563 6.1986 9.4 6.57297C9.77437 6.94734 9.98469 7.45509 9.98469 7.98453Z"
                                                    stroke="#0160D6" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>

                                            <defs>
                                                <clipPath id="clip0_4400_2140">
                                                    <rect width="15.97" height="15.97" fill="white" />
                                                </clipPath>
                                            </defs>

                                        </svg>

                                    </a> --}}

                                    <!-- Edit -->
                                    <button type="button" class="edit-btn edit-client-admin"
                                        data-id="{{ $clientAdmin->id }}"
                                        data-organization_name="{{ $clientAdmin->organization_name }}"
                                        data-organization_type="{{ $clientAdmin->organization_type }}"
                                        data-primary_contact_name="{{ $clientAdmin->primary_contact_name }}"
                                        data-email="{{ $clientAdmin->email }}"
                                        data-phone_number="{{ $clientAdmin->phone_number }}"
                                        data-state="{{ $clientAdmin->state }}" data-status="{{ $clientAdmin->status }}"
                                        data-update-url="{{ route('superadmin.client-admins.update', ':id') }}"
                                        data-bs-toggle="modal" data-bs-target="#clientAdminModal">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">

                                            <path
                                                d="M8.8198 2.39503L3.35707 8.17714C3.1508 8.39671 2.95119 8.8292 2.91127 9.12862L2.66508 11.2844C2.57858 12.0629 3.1375 12.5952 3.90933 12.4621L6.05184 12.0962C6.35126 12.043 6.77044 11.8234 6.97671 11.5972L12.4394 5.81506C13.3843 4.81699 13.8101 3.6792 12.3396 2.28857C10.8758 0.911245 9.76463 1.39697 8.8198 2.39503Z"
                                                stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />

                                            <path d="M7.91406 3.35938C8.20017 5.19581 9.69061 6.59975 11.5404 6.78605"
                                                stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                                stroke-linecap="round" stroke-linejoin="round" />

                                            <path d="M2 14.6387H13.9767" stroke="#07CCB5" stroke-width="1.2"
                                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />

                                        </svg>

                                    </button>

                                    <!-- Delete -->
                                    <form action="{{ route('superadmin.client-admins.destroy', $clientAdmin->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this client admin?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="trash-btn">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15"
                                                viewBox="0 0 13 15" fill="none">

                                                <path
                                                    d="M7.91403 5.09124L7.68381 11.0796M4.498 11.0796L4.26778 5.09124M8.58606 2.69123C9.3604 2.75118 10.1323 2.83929 10.9002 2.95538C11.1278 2.98998 11.354 3.02658 11.5802 3.06584M10.9002 2.95538L10.1896 12.1928C10.1606 12.5689 9.99071 12.9201 9.71388 13.1764C9.43706 13.4326 9.07371 13.5749 8.69651 13.5748H3.4853C3.10809 13.5749 2.74475 13.4326 2.46792 13.1764C2.1911 12.9201 2.0212 12.5689 1.9922 12.1928L1.28158 2.95538M1.28158 2.95538C1.05402 2.98932 0.82779 3.02591 0.601562 3.06517M1.28158 2.95538C2.04951 2.83929 2.82141 2.75118 3.59575 2.69123M8.58606 2.69123V2.08175C8.58606 1.2966 7.98057 0.641875 7.19543 0.617256C6.45927 0.593727 5.72254 0.593727 4.98638 0.617256C4.20124 0.641875 3.59575 1.29727 3.59575 2.08175V2.69123M8.58606 2.69123C6.9251 2.56286 5.25671 2.56286 3.59575 2.69123"
                                                    stroke="#E74C3C" stroke-width="1.2" stroke-linecap="round"
                                                    stroke-linejoin="round" />

                                            </svg>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="text-center py-4">
                                No client admins found.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>
        </div>
    </div>

    <div class="modal fade" id="clientAdminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header border-0 pb-0">
                    <div>
                        <!-- MODAL TITLE -->
                        <h2 class="modal-title mb-2 inner-title" id="clientAdminModalTitle">
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
                    <form id="clientAdminForm" action="{{ route('superadmin.client-admins.store') }}" method="POST">
                        @csrf
                        <div class="p-3">
                            <input type="hidden" name="client_admin_id" id="client_admin_id">
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
                            <button type="submit" id="clientAdminSubmitBtn" class="btn gradient-btn m-0">Save
                                Client</button>
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

            window.location.href = `{{ route('superadmin.client-admins.index') }}?${params.toString()}`;

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
