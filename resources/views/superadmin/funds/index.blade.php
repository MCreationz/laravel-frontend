@extends('superadmin.layouts.app')

@section('title', 'Funds')

@section('content')
    <div class="card-box bg-white rounded">
        <!-- Header -->
        <div class="top-search-wrap p-3 mb-2">
            <div class="row justify-content-between align-items-center row-gap-2">
                <div class="col-auto">
                    <div class="mb-0 fw-bold table-heading">
                        Funds
                    </div>
                    <p class="text-muted mb-0">
                        {{ $funds->total() }} Funds
                    </p>
                </div>
                <form method="GET" action="{{ route('superadmin.funds.index') }}"
                    class="col-12 col-lg-10 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">
                    <!-- Search -->
                    <div class="search-bar input-group flex-nowrap position-relative" style="max-width:273px;">
                        <input type="text" id="searchInput" name="search" class="form-control search-input w-100"
                            placeholder="Search Fund" value="{{ request('search') }}">
                    </div>
                    <!-- Type -->
                    <div style="max-width:140px;">
                        <select name="fund_type" class="form-control" onchange="this.form.submit()">
                            <option value="">All Types</option>
                            <option value="npo" {{ request('fund_type') == 'npo' ? 'selected' : '' }}>
                                NPO
                            </option>
                            <option value="startup" {{ request('fund_type') == 'startup' ? 'selected' : '' }}>
                                Startup
                            </option>
                        </select>
                    </div>
                    <!-- Status -->
                    <div style="max-width:126px;">
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="">All Status</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="first-col">Fund Name</th>
                        <th class="text-center">Client</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Outlay</th>
                        <th class="text-center">Cap</th>
                        <th class="text-center text-nowrap">Open & Close Date</th>

                        <th class="text-center">Applications</th>
                        <th class="text-center">Reviewed</th>
                        <th class="text-center">Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($funds as $fund)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2 fund-name-trigger" style="cursor: pointer;">
                                    @if ($fund->fund_logo)
                                        <img src="{{ Storage::url($fund->fund_logo) }}" alt="{{ $fund->fund_name }}"
                                            style="width:40px;height:40px;object-fit:cover;border-radius:50%;">
                                    @else
                                        <div class="px-2 py-1 fw-bold gradient-text">
                                            {{ strtoupper(substr($fund->fund_name, 0, 2)) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-medium">
                                            {{ $fund->fund_name }}
                                        </div>
                                        <small class="text-muted">
                                            {{ $fund->fund_owner }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <script>
                                document.querySelectorAll('.fund-name-trigger').forEach(function(element) {
                                    element.addEventListener('click', function() {
                                        const modal = new bootstrap.Modal(document.getElementById('fundModal'));
                                        modal.show();
                                    });
                                });
                            </script>
                            <!-- Client -->
                            <td class="text-center">
                                {{ $fund->client?->organization_name ?? '-' }}
                            </td>
                            <!-- Type -->
                            <td class="text-center">
                                @if ($fund->snapshot?->is_npo)
                                    NPO
                                @elseif($fund->snapshot?->is_startup)
                                    Startup
                                @else
                                    -
                                @endif
                            </td>
                            <!-- Outlay -->
                            <td class="text-center text-nowrap">
                                ₹{{ number_format($fund->outlay ?? 0) }}
                            </td>
                            <!-- Cap -->
                            <td class="text-center text-nowrap">
                                ₹{{ number_format($fund->cap_amount ?? 0) }}
                            </td>
                            <!-- Open Date -->
                            <td class="text-center">
                                <div class="d-flex flex-column text-nowrap">
                                    <small>
                                        <strong>Open:</strong>
                                        {{ optional($fund->project_start)->format('d M Y') ?? '-' }}
                                    </small>

                                    <small>
                                        <strong>Close:</strong>
                                        {{ optional($fund->project_end)->format('d M Y') ?? '-' }}
                                    </small>
                                </div>
                            </td>
                            <!-- Applications -->
                            <td class="text-center">
                                {{ $fund->applications_count ?? 0 }}
                            </td>

                            <!-- Reviewed -->
                            <td class="text-center">
                                {{ $fund->reviewed_count ?? 0 }}
                            </td>
                            <!-- Status -->
                            <td class="text-center">
                                @switch($fund->status)
                                    @case('active')
                                        <span class="badge bg-success-subtle text-success">
                                            Active
                                        </span>
                                    @break

                                    @case('closed')
                                        <span class="badge bg-danger-subtle text-danger">
                                            Closed
                                        </span>
                                    @break

                                    @case('completed')
                                        <span class="badge bg-info-subtle text-info">
                                            Completed
                                        </span>
                                    @break

                                    @default
                                        <span class="badge bg-warning-subtle text-warning">
                                            Draft
                                        </span>
                                @endswitch
                            </td>
                            <!-- Actions -->
                            <td class="action-btn">
                                <div class="btn-group gap-1">
                                    <!-- Edit -->
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#reviewerModal"
                                        class="edit-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z"
                                                stroke="#07CCB5" stroke-width="1.2" />
                                        </svg>
                                    </a>
                                    <!-- Delete -->
                                    <form action="{{ route('client-admin.funds.delete', $fund->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this fund?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="trash-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15"
                                                viewBox="0 0 13 15" fill="none">
                                                <path
                                                    d="M1.3 3L2 12.2C2.1 13 2.7 13.6 3.5 13.6H8.7C9.5 13.6 10.1 13 10.2 12.2L10.9 3"
                                                    stroke="#E74C3C" stroke-width="1.2" />
                                                <path d="M0.6 3.1C4 2.5 8.2 2.5 11.6 3.1" stroke="#E74C3C"
                                                    stroke-width="1.2" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center py-4">
                                    No funds found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3">
                {{ $funds->links() }}
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                let debounceTimer;
                searchInput.addEventListener('input', function() {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => {
                        const url = new URL(window.location.href);
                        if (this.value.trim()) {
                            url.searchParams.set('search', this.value.trim());
                        } else {
                            url.searchParams.delete('search');
                        }
                        url.searchParams.delete('page');
                        window.location.href = url.toString();
                    }, 400);
                });
            });
        </script>

        <div class="modal fade" id="reviewerModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <div>
                            <h2 class="modal-title mb-2 inner-title" id="reviewerModalTitle">
                                Edit Fund
                            </h2>

                            <p class="small mb-0">
                                FND001
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

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">
                                            Fund Name
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" class="form-control py-2" id="full_name" name="full_name"
                                            placeholder="Impact Innovation Fund" required>
                                    </div>
                                </div>

                                <!-- Phone + Password -->
                                <div class="row g-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            Open Date <span class="text-danger">*</span>
                                        </label>

                                        <input type="date" class="form-control py-2" id="open_date" name="open_date"
                                            placeholder="Enter here">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            Close Date <span class="text-danger">*</span>
                                        </label>

                                        <input type="date" class="form-control py-2" id="close_date" name="close_date"
                                            placeholder="Enter here">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            Fund Outlay<span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control py-2" id="fund_outlay" name="fund_outlay"
                                            placeholder="₹1 Cr">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            Entity Cap<span class="text-danger">*</span>
                                        </label>
                                        <input type="number" class="form-control py-2" id="entity_cap" name="entity_cap"
                                            placeholder="₹1 Cr">
                                    </div>

                                </div>
                                <!-- Status -->
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            Status
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
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">
                                            Fund Type
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
                            </div>

                            <!-- Footer -->
                            <div style="border-radius:0px 0px 8px 8px;"
                                class="modal-footer border-0 d-flex justify-content-center justify-content-md-end gap-2 steps-btn pe-lg-4 flex-wrap">

                                <button type="button" class="btn simple-btn m-0" data-bs-dismiss="modal">
                                    Cancel
                                </button>

                                <button type="submit" id="reviewerSubmitBtn" class="btn gradient-btn m-0">
                                    Save Changes
                                </button>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        {{-- Fund view modal --}}
        <div class="modal fade" id="fundModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-2 p-md-3">
                    <!-- Header -->
                    <div class="modal-header">
                        <div class="modal-logo-wrap d-flex align-items-center gap-2">
                            <div class="modal-logo">
                                <img src="{{ asset('img/view-fund-logo.png') }}" alt="view fund logo" width="90"
                                    height="58">
                            </div>
                            <div class="">
                                <h2 class="modal-title mb-0 h3" id="">Kaushal Sambal</h2>
                                <p class="small mb-0">M3M Foundation</p>
                            </div>
                        </div>
                        <a href="#" class="linkdin">
                            <img src="{{ asset('img/linkdin.png') }}" alt="view fund logo" width="28" height="28">
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <!-- Body -->
                    <div class="modal-body px-1 py-3 px-md-2 py-md-4">
                        <!-- New Fund Details -->
                        <section class="mb-3">
                            <h3 class="inner-title">New Fund Details</h3>
                            <div class="details-table">
                                <div class="detail-row">
                                    <div class="detail-label">
                                        Fund Name
                                    </div>
                                    <div class="detail-value">
                                        Kaushal Sambal
                                    </div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">
                                        Fund Owner
                                    </div>
                                    <div class="detail-value">
                                        M3M Foundation
                                    </div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">
                                        Fund Owner Email
                                    </div>
                                    <div class="detail-value">
                                        admin@fundink.in
                                    </div>
                                </div>
                                <div class="detail-row align-items-start">
                                    <div class="detail-label pt-2">
                                        About Fund
                                    </div>
                                    <div class="detail-value">
                                        <p class="mb-2">
                                            Video provides a powerful way to help you
                                            prove your point. When you click Online
                                            Video, you can paste in the embed code
                                            for the video you want to add.
                                        </p>
                                        <p class="mb-2">
                                            To make your document look professionally
                                            produced, Word provides header, footer,
                                            cover page, and text box designs that
                                            complement each other.
                                        </p>
                                        <p class="mb-0">
                                            Themes and styles also help keep your
                                            document coordinated. When you click
                                            Design and choose a new Theme, the
                                            pictures, charts, and SmartArt graphics
                                            change to match your new theme.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Fund Timelines -->
                        <section class="details-table mb-3">
                            <h3 class="inner-title">
                                Fund Timelines
                            </h3>

                            <div class="detail-row">
                                <div class="detail-label">
                                    Application Starts On:
                                </div>
                                <div class="detail-value">
                                    01/04/2026
                                </div>
                            </div>

                            <div class="detail-row">
                                <div class="detail-label">
                                    Application Closes On:
                                </div>
                                <div class="detail-value">
                                    31/03/2026
                                </div>
                            </div>

                            <div class="detail-row">
                                <div class="detail-label">
                                    Maximum Project Duration:
                                </div>
                                <div class="detail-value">
                                    admin@fundink.in
                                </div>
                            </div>

                        </section>
                        <!-- Eligibility -->
                        <section class="details-table mb-3">
                            <h3 class="inner-title">
                                Eligibility
                            </h3>
                            <div class="detail-row">
                                <div class="detail-label">
                                    Eligible States
                                </div>
                                <div class="detail-value">
                                    Haryana
                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">
                                    Eligibility Instruction
                                </div>
                                <div class="detail-value">
                                    <p class="mb-1">Minimum 3 years expereince in Health<br>
                                        Turnover above ₹3 crore<br>
                                        XYZ</p>
                                </div>
                            </div>
                        </section>
                        <section class="details-table mb-3">
                            <h3 class="inner-title">
                                Funds Snapshot
                            </h3>
                            <div class="detail-row">
                                <div class="detail-label">
                                    Fund Outlay
                                </div>
                                <div class="detail-value">
                                    ₹ 6,00,00,000
                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">
                                    Fund Type
                                </div>
                                <div class="detail-value">
                                    Grant
                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">
                                    Single Entity Cap
                                </div>
                                <div class="detail-value">
                                    ₹ 1,50,00,000
                                </div>
                            </div>
                        </section>
                        {{-- <section class="details-table upload-document mb-3">
                            <h3 class="inner-title">
                                Upload Documents
                            </h3>
                            <div class="document-row">
                                <div class="detail-label">Passport</div>
                                <div class="upload-file">

                                </div>
                            </div>
                            <div class="document-row">
                                <div class="detail-label">ITR</div>
                                <div class="upload-file">

                                </div>
                            </div>
                            <div class="document-row">
                                <div class="detail-label">Pan Card</div>
                                <div class="upload-file">

                                </div>
                            </div>
                        </section> --}}
                        <section class="details-table mb-3">
                            <h3 class="inner-title">
                                Funding Domain
                            </h3>
                            <div class="detail-row">
                                <div class="detail-label">
                                    Theme Name
                                </div>
                                <div class="detail-value">
                                    Health
                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">
                                    Sub Theme
                                </div>
                                <div class="detail-value">
                                    Nutrition
                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">
                                    Description
                                </div>
                                <div class="detail-value">
                                    Video provides a powerful way to help you prove your point. When you click Online Video, you
                                    can paste in the embed code for the video you want to add. You can also type a keyword to
                                    search online for the video that best fits your document.
                                </div>
                            </div>
                        </section>
                        <section class="details-table">
                            <h3 class="inner-title">
                                Questions
                            </h3>
                            <div class="detail-row">
                                <div class="detail-label">
                                    Question:
                                </div>
                                <div class="detail-value">
                                    What is you impact in Health?
                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">
                                    Description
                                </div>
                                <div class="detail-value">
                                    Video provides a powerful way to help you prove your point. When you click Online Video, you
                                    can paste in the embed code for the video you want to add. You can also type a keyword to
                                    search online for the video that best fits your document.
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @endsection
