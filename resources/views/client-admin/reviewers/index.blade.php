@extends('client-admin.layouts.app')

@section('title', 'Reviewers')
@section('header_title', 'Reviewers')

@section('header_back', route('client-admin.dashboard'))

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

    <!-- Header -->
    <div class="top-search-wrap p-3 mb-2">
        <div class="row justify-content-between align-items-center row-gap-2">

            <div class="col-auto">
                <div class="mb-0 fw-bold table-heading">
                    Reviewers
                </div>

                <p class="text-muted mb-0">
                    {{ \App\Models\Reviewer::count() }} Reviewers
                </p>
            </div>

            <div class="col-12 col-lg-10 d-flex gap-2 justify-content-end align-items-center flex-wrap">

                <!-- Search -->
                <div class="search-bar input-group position-relative" style="max-width: 273px;">
                    <input type="text" class="form-control search-input" id="searchInput" placeholder="Search">
                </div>

                <!-- Add Button -->
                <button class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#reviewerModal">
                    + Reviewer
                </button>

            </div>

        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table align-middle">

            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Expertise</th>

                    <th class="text-center">Assigned</th>
                    <th class="text-center">Completed</th>
                    <th class="text-center">Pending</th>

                    <th class="text-center">Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($reviewers as $reviewer)
                <tr>

                    <td class="fw-medium">
                        {{ $reviewer->full_name }}
                    </td>

                    <td>{{ $reviewer->email }}</td>

                    <td>{{ $reviewer->phone_number ?? '-' }}</td>

                    <td>{{ $reviewer->role ?? '-' }}</td>

                    <td>{{ $reviewer->domain_expertise ?? '-' }}</td>

                    {{-- ASSIGNED --}}
                    <td class="text-center">
                        {{ $reviewer->assigned_funds_count }}
                    </td>

                    {{-- COMPLETED --}}
                    <td class="text-center">
                        {{ $reviewer->completed_funds_count ?? 0 }}
                    </td>

                    {{-- PENDING --}}
                    <td class="text-center">
                        {{ $reviewer->pending_funds_count ?? 0 }}
                    </td>

                    {{-- STATUS --}}
                    <td class="text-center">

                        @if($reviewer->status === 'verified')
                        <span class="badge bg-success-subtle text-success">Verified</span>
                        @else
                        <span class="badge bg-danger-subtle text-danger">Non-Verified</span>
                        @endif

                    </td>

                    {{-- ACTIONS --}}
                    <td class="action-btn">
                        <div class="btn-group gap-1">

                            {{-- ASSIGN FUNDS --}}
                            <button
                                class="btn btn-sm btn-primary assign-fund-btn"
                                data-id="{{ $reviewer->id }}"
                                data-funds='@json($reviewer->funds->pluck("id")->values())'
                                data-bs-toggle="modal"
                                data-bs-target="#assignFundModal">
                                Assign Fund
                            </button> {{-- EDIT --}}
                            <button class="edit-btn edit-reviewer" data-id="{{ $reviewer->id }}"
                                data-full_name="{{ $reviewer->full_name }}" data-email="{{ $reviewer->email }}"
                                data-phone_number="{{ $reviewer->phone_number }}" data-role="{{ $reviewer->role }}"
                                data-domain_expertise="{{ $reviewer->domain_expertise }}"
                                data-status="{{ $reviewer->status }}"
                                data-update-url="{{ route('client-admin.reviewers.update', ':id') }}"
                                data-bs-toggle="modal" data-bs-target="#reviewerModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path
                                        d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z"
                                        stroke="#07CCB5" stroke-width="1.2" />
                                </svg>
                            </button>

                            {{-- DELETE --}}
                            <form action="{{ route('client-admin.reviewers.delete', $reviewer->id) }}" method="POST"
                                onsubmit="return confirm('Delete this reviewer?')">

                                @csrf

                                <button type="submit" class="trash-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15"
                                        fill="none">
                                        <path
                                            d="M1.3 3L2 12.2C2.1 13 2.7 13.6 3.5 13.6H8.7C9.5 13.6 10.1 13 10.2 12.2L10.9 3"
                                            stroke="#E74C3C" stroke-width="1.2" />
                                        <path d="M0.6 3.1C4 2.5 8.2 2.5 11.6 3.1" stroke="#E74C3C" stroke-width="1.2" />
                                    </svg>
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center py-4">
                        No reviewers found.
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
            <div class="modal-header border-0 pb-0">
                <div>
                    <h2 class="modal-title mb-2 inner-title" id="reviewerModalTitle">
                        Add Reviewer
                    </h2>

                    <p class="text-muted small mb-0">
                        Assign domain experts for fund review
                    </p>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body p-0">

                <form id="reviewerForm" action="{{ route('client-admin.reviewers.store') }}" method="POST">

                    @csrf

                    <div class="p-3">

                        <input type="hidden" name="reviewer_id" id="reviewer_id">

                        <!-- Name + Email -->
                        <div class="row g-3 mb-3">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Full Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text" class="form-control py-2" id="full_name" name="full_name"
                                    placeholder="Enter full name" required>
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
                                </label>

                                <input type="text" class="form-control py-2" id="phone_number" name="phone_number"
                                    placeholder="Enter phone number">
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

                        <!-- Role + Expertise -->
                        <div class="row g-3 mb-3">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Role
                                </label>

                                <input type="text" class="form-control py-2" id="role" name="role"
                                    placeholder="e.g. Senior Reviewer">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Domain Expertise
                                </label>

                                <input type="text" class="form-control py-2" id="domain_expertise"
                                    name="domain_expertise" placeholder="e.g. Healthcare, Tech, Finance">
                            </div>

                        </div>

                        <!-- Status -->
                        <div class="row g-3 mb-3">

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">
                                    Status
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="select-wrapper w-100 position-relative">

                                    <div
                                        class="custom-select form-control py-2 d-flex justify-content-between align-items-center">
                                        <span class="text-muted">Select Status</span>
                                    </div>

                                    <input type="hidden" name="status" id="status" required class="hidden-select">

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

                        <button type="button" class="btn simple-btn m-0" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" id="reviewerSubmitBtn" class="btn gradient-btn m-0">
                            Save Reviewer
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="assignFundModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header border-0 pb-0">
                <h2 class="modal-title inner-title">Assign Funds</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-3">

                <form id="assignFundForm" method="POST"
                    action="{{ route('client-admin.reviewers.assign-funds') }}">

                    @csrf

                    <input type="hidden" name="reviewer_id" id="assign_reviewer_id">

                    <label class="form-label fw-semibold mb-2">
                        Select Funds
                    </label>

                    <div class="select-wrapper w-100 position-relative checkbox-wrap fund-wrap">

                        <div id="selectedFundsBox"
                            class="custom-select form-control d-flex flex-wrap gap-2 align-items-center">
                            <span class="placeholder">Select Funds</span>
                        </div>

                        <ul class="select-list checkbox-list">
                            @foreach($funds as $fund)
                            <li>
                                <input
                                    type="checkbox"
                                    value="{{ $fund->id }}"
                                    id="fund_{{ $fund->id }}"
                                    class="fund-checkbox">

                                <label for="fund_{{ $fund->id }}">
                                    {{ $fund->fund_name }}
                                </label>
                            </li>
                            @endforeach
                        </ul>

                        <input type="hidden" name="fund_ids" id="hiddenFunds">

                    </div>

                </form>

            </div>

            <div class="modal-footer border-0">

                <button type="button"
                    class="btn simple-btn"
                    data-bs-dismiss="modal">
                    Cancel
                </button>

                <button
                    type="submit"
                    form="assignFundForm"
                    class="btn gradient-btn">
                    Assign
                </button>

            </div>

        </div>
    </div>
</div>

<style>
    /* Modal body */
    #assignFundModal .modal-body {
        min-height: 350px
    }

    /* Selected box */
    #assignFundModal #selectedFundsBox {
        min-height: 48px;
        align-items: flex-start !important;
        overflow-y: auto;
    }

    /* Dropdown */
    #assignFundModal .select-list {
        max-height: 180px;
        /* Approximately 4 items */
        overflow-y: auto;
        overflow-x: hidden;
    }

    /* Optional scrollbar styling */
    #assignFundModal .select-list::-webkit-scrollbar {
        width: 6px;
    }

    #assignFundModal .select-list::-webkit-scrollbar-thumb {
        background: #c5c5c5;
        border-radius: 10px;
    }

    #assignFundModal .select-list::-webkit-scrollbar-track {
        background: #f5f5f5;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const selectedBox = document.getElementById('selectedFundsBox');
        const hiddenInput = document.getElementById('hiddenFunds');
        const reviewerInput = document.getElementById('assign_reviewer_id');

        function updateSelectedFunds() {
            const selectedIds = [];
            selectedBox.innerHTML = '';

            document.querySelectorAll('.fund-checkbox:checked').forEach(cb => {
                selectedIds.push(cb.value);

                const label = document.querySelector(`label[for="${cb.id}"]`).innerText;

                const tag = document.createElement('span');
                tag.className = 'selected-item';
                tag.innerHTML = `
                ${label}
                <span class="remove-fund" data-id="${cb.value}" style="cursor:pointer;margin-left:6px;">&times;</span>
            `;

                selectedBox.appendChild(tag);
            });

            if (!selectedIds.length) {
                selectedBox.innerHTML = '<span class="placeholder">Select Funds</span>';
            }

            hiddenInput.value = selectedIds.join(',');
        }

        // Open modal
        document.querySelectorAll('.assign-fund-btn').forEach(button => {
            button.addEventListener('click', function() {

                reviewerInput.value = this.dataset.id;

                const assignedFunds = JSON.parse(this.dataset.funds || '[]');

                // Reset
                document.querySelectorAll('.fund-checkbox').forEach(cb => {
                    cb.checked = false;
                });

                // Check assigned
                assignedFunds.forEach(id => {
                    const checkbox = document.getElementById('fund_' + id);
                    if (checkbox) {
                        checkbox.checked = true;
                    }
                });

                updateSelectedFunds();
            });
        });

        // Checkbox changed
        document.querySelectorAll('.fund-checkbox').forEach(cb => {
            cb.addEventListener('change', updateSelectedFunds);
        });

        // Remove chip
        selectedBox.addEventListener('click', function(e) {
            if (!e.target.classList.contains('remove-fund')) {
                return;
            }

            e.preventDefault();
            e.stopPropagation();

            const id = e.target.dataset.id;

            const checkbox = document.getElementById('fund_' + id);
            if (checkbox) {
                checkbox.checked = false;
            }

            updateSelectedFunds();
        });

    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.assign-fund-btn').forEach(button => {

            button.addEventListener('click', function() {

                document.getElementById('assign_reviewer_id').value =
                    this.dataset.id;

            });

        });

    });
</script>

<script>
    function debounce(fn, delay) {
        let timer;
        return function(...args) {
            clearTimeout(timer);
            timer = setTimeout(() => fn.apply(this, args), delay);
        };
    }

    function updateFilters() {

        const url = new URL(window.location.href);
        const params = url.searchParams;

        // Search
        const search = document.getElementById('searchInput')?.value || '';

        if (search.trim()) {
            params.set('search', search.trim());
        } else {
            params.delete('search');
        }

        // Type (optional - safe fallback)
        const typeInput = document.querySelector('input[name="type"]');
        if (typeInput) {
            const type = typeInput.value;
            if (type) params.set('type', type);
            else params.delete('type');
        }

        // Status (optional - safe fallback)
        const statusInput = document.querySelector('input[name="status"]');
        if (statusInput) {
            const status = statusInput.value;
            if (status) params.set('status', status);
            else params.delete('status');
        }

        // Keep pagination reset when filtering
        params.delete('page');

        // Reload using current base URL (NOT hardcoded route)
        window.location.href = `${url.pathname}?${params.toString()}`;
    }

    // Attach debounce
    const searchInput = document.getElementById('searchInput');

    if (searchInput) {
        searchInput.addEventListener('keyup', debounce(updateFilters, 500));
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const url = new URL(window.location.href);
        const params = url.searchParams;

        const searchInput = document.getElementById('searchInput');

        // Restore value on page load
        if (searchInput) {
            const existingSearch = params.get('search');
            if (existingSearch) {
                searchInput.value = existingSearch;
            }

            // Update URL while typing (debounced)
            searchInput.addEventListener('input', debounce(function() {

                const currentUrl = new URL(window.location.href);
                const currentParams = currentUrl.searchParams;

                const value = searchInput.value.trim();

                if (value) {
                    currentParams.set('search', value);
                } else {
                    currentParams.delete('search');
                }

                currentParams.delete('page'); // reset pagination

                window.location.href = `${currentUrl.pathname}?${currentParams.toString()}`;

            }, 500));
        }

    });

    // Debounce helper
    function debounce(fn, delay) {
        let timer;
        return function(...args) {
            clearTimeout(timer);
            timer = setTimeout(() => fn.apply(this, args), delay);
        };
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const modal = document.getElementById('reviewerModal');
        const form = document.getElementById('reviewerForm');
        const title = document.getElementById('reviewerModalTitle');

        document.querySelectorAll('.edit-reviewer').forEach(button => {

            button.addEventListener('click', function() {

                // Change modal title
                title.innerText = 'Edit Reviewer';

                // Fill fields
                document.getElementById('reviewer_id').value = this.dataset.id;
                document.getElementById('full_name').value = this.dataset.full_name;
                document.getElementById('email').value = this.dataset.email;
                document.getElementById('phone_number').value = this.dataset.phone_number ?? '';
                document.getElementById('role').value = this.dataset.role ?? '';
                document.getElementById('domain_expertise').value = this.dataset.domain_expertise ?? '';

                // Status (hidden input)
                document.getElementById('status').value = this.dataset.status;

                // Update form action (replace :id)
                let url = this.dataset.updateUrl.replace(':id', this.dataset.id);
                form.action = url;

                // Remove password requirement for edit
                document.getElementById('password').required = false;
                document.getElementById('password').value = '';

            });

        });

        // Reset modal when opening for CREATE
        document.querySelector('[data-bs-target="#reviewerModal"]').addEventListener('click', function() {

            title.innerText = 'Add Reviewer';

            form.action = "{{ route('client-admin.reviewers.store') }}";

            document.getElementById('reviewer_id').value = '';
            document.getElementById('full_name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('phone_number').value = '';
            document.getElementById('role').value = '';
            document.getElementById('domain_expertise').value = '';
            document.getElementById('status').value = '';
            document.getElementById('password').required = true;
            document.getElementById('password').value = '';

        });

    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const selectedBox = document.getElementById('selectedFundsBox');
        const dropdown = document.querySelector('.fund-wrap .checkbox-list');
        const checkboxes = document.querySelectorAll('.fund-wrap input[type="checkbox"]');
        const hiddenInput = document.getElementById('hiddenFunds');

        // OPEN / CLOSE
        selectedBox.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-tag')) return;
            e.stopPropagation();
            dropdown.classList.toggle('show');
        });

        document.addEventListener('click', function() {
            dropdown.classList.remove('show');
        });

        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // UPDATE UI
        function updateSelected() {

            let selected = [];
            selectedBox.innerHTML = '';

            checkboxes.forEach(cb => {

                if (cb.checked) {

                    selected.push(cb.value);

                    const tag = document.createElement('div');
                    tag.className = 'state-tag';

                    tag.innerHTML = `
                        <span>${cb.nextElementSibling.innerText}</span>
                        <span class="remove-tag" data-value="${cb.value}">&times;</span>
                    `;

                    selectedBox.appendChild(tag);
                }
            });

            if (selected.length === 0) {
                selectedBox.innerHTML = '<span class="placeholder">Select Funds</span>';
            }

            hiddenInput.value = selected.join(',');
        }

        // CHECKBOX CHANGE
        checkboxes.forEach(cb => {
            cb.addEventListener('change', function() {
                updateSelected();
            });
        });

        // REMOVE CROSS CLICK
        selectedBox.addEventListener('click', function(e) {

            if (e.target.classList.contains('remove-tag')) {

                e.stopPropagation();

                const value = e.target.getAttribute('data-value');

                checkboxes.forEach(cb => {
                    if (cb.value === value) {
                        cb.checked = false;
                    }
                });

                updateSelected();
            }
        });

        updateSelected();

    });
</script>
@endsection