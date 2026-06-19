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

                        <input type="hidden" name="type" class="hidden-select filter-field" value="{{ request('type') }}">

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
                                {{$applicant->fund->fund_name}}
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
                                <a href="" class="edit-btn">

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


    <script>
        document.addEventListener("DOMContentLoaded", function () {

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

                button.addEventListener("click", function () {

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

            modal.addEventListener("hidden.bs.modal", function () {

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

            item.addEventListener('click', function () {

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