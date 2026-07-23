@extends('layouts.dashboard')

@section('page_title', '')

@section('header_extra')
<span class="header-org-chip">
    @if(auth('organization')->check() && auth('organization')->user()->role === 'funder')
    Non - Profit Organisation
    @else
    Startup
    @endif
</span>

@endsection

@section('content')


<div class="card-box bg-white rounded">

    <!-- Header -->
    <div class="top-search-wrap p-3 mb-2">
        <div class="row justify-content-between align-items-center row-gap-2">

            <div class="col-auto">
                <div class="mb-0 fw-bold table-heading">
                    My Applications
                </div>

                <p class="text-muted mb-0">
                    {{ $applications->total() }} Applications Found
                </p>
            </div>

            <form method="GET" action=""
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
                        <option value="npo" {{ request('fund_type') == 'npo' ? 'selected' : '' }}>NPO</option>
                        <option value="startup" {{ request('fund_type') == 'startup' ? 'selected' : '' }}>Startup</option>
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
                    <th class="first-col">Fund</th>
                    <th class="text-center">Funder</th>
                    <th class="text-center">Applied On</th>
                    <th class="text-center">Current Stage</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($applications as $application)
                @php
                $statusClass = match ($application->status) {
                'approved' => 'bg-success-subtle text-success',
                'rejected' => 'bg-danger-subtle text-danger',
                'under_review' => 'bg-warning-subtle text-warning',
                default => 'bg-primary-subtle text-primary',
                };
                @endphp

                <tr>
                <td>
    <div class="dashboard-v2-name-cell application-details"
        data-application-id="{{ $application->id }}"
        style="cursor:pointer;">

        @if($application->fund->fund_logo)
            <img
                src="{{ Storage::url($application->fund->fund_logo) }}"
                alt="{{ $application->fund->fund_name }} Logo"
                style="width:48px;height:48px;object-fit:cover;flex-shrink:0;">
        @else
            <span class="hc-badge">
                {{ strtoupper(substr($application->fund->fund_name ?? 'F', 0, 2)) }}
            </span>
        @endif

        <span style="text-decoration: underline;">
            {{ $application->fund->fund_name ?? '-' }}
        </span>

    </div>
</td>
                    <td class="text-center">
                        {{ $application->fund->fund_owner ?? '-' }}
                    </td>

                    <td class="text-center text-nowrap">
                        {{ $application->created_at->format('d M Y') }}
                    </td>
                    <td class="text-center">
                        {{ \Illuminate\Support\Str::of($application->current_step)
        ->replace(['_', '-'], ' ')
        ->title() }}
                    </td>

                    <td class="text-center">
                        <span class="badge {{ $statusClass }}">
                            {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                        </span>
                    </td>

                    <td class="text-center action-btn">
                     <a href="javascript:void(0)"
    class="edit-btn view-application"
    data-bs-toggle="modal"
    data-bs-target="#viewApplication"
    data-fund="{{ $application->fund->fund_name ?? '-' }}"
    data-owner="{{ $application->fund->fund_owner ?? '-' }}"
    data-logo="{{ $application->fund->fund_logo ?? '' }}"
    data-application-id="APP-{{ $application->id }}"
    data-applied="{{ $application->created_at->format('d/m/Y') }}"
    data-stage="{{ $application->current_step }}"
    data-status="{{ ucfirst(str_replace('_', ' ', $application->status)) }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="#07CCB5" stroke-width="2">
                                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">
                        No applications found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="viewApplication" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Header -->
        <div class="modal-header border-0" style="border-bottom: 1px solid rgb(0 0 0 / 10%) !important">

    <div class="d-flex align-items-center gap-3">

        <div class="FD-text" id="modalFundLogoWrapper">
            <h2 class="gradient-text mb-0" id="modalFundShort">FD</h2>
        </div>

        <div>
            <h3 class="mb-0 modal-heading" id="modalFundName">-</h3>
            <small class="text-muted">
                Fund Owner:
                <span id="modalFundOwner">-</span>
            </small>
        </div>

    </div>

    <button class="btn-close" data-bs-dismiss="modal"></button>

</div>
            <!-- Body -->
            <div class="modal-body">
                <div class="row">

                    <!-- LEFT: Timeline -->
                    <div class="col-md-8">

                        <p class="mb-3">
                            <strong>Application Journey</strong>
                        </p>

                        <div class="timeline-step">
                            <div class="timeline-icon completed">✓</div>
                            <div class="flex-grow-1">
                                <strong>Registration</strong><br>
                                <small>01/03/2026 09:00</small>
                            </div>
                            <span class="status-pill bg-success-subtle text-success">
                                Completed
                            </span>
                        </div>

                        <div class="timeline-step">
                            <div class="timeline-icon submitted">✓</div>
                            <div class="flex-grow-1">
                                <strong>Application</strong><br>
                                <small>01/03/2026 09:00</small>
                            </div>
                            <span class="status-pill bg-info-subtle text-info">
                                Submitted
                            </span>
                        </div>

                        <div class="timeline-step">
                            <div class="timeline-icon review">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <path
                                        d="M7.61182 3.8042V7.60791H10.4646M13.3174 7.60791C13.3174 8.35718 13.1698 9.0991 12.8831 9.79134C12.5963 10.4836 12.1761 11.1125 11.6463 11.6424C11.1165 12.1722 10.4875 12.5924 9.79524 12.8792C9.10301 13.1659 8.36108 13.3135 7.61182 13.3135C6.86255 13.3135 6.12062 13.1659 5.42839 12.8792C4.73616 12.5924 4.10718 12.1722 3.57737 11.6424C3.04756 11.1125 2.62729 10.4836 2.34056 9.79134C2.05383 9.0991 1.90625 8.35718 1.90625 7.60791C1.90625 6.0947 2.50737 4.64347 3.57737 3.57347C4.64737 2.50346 6.09861 1.90234 7.61182 1.90234C9.12503 1.90234 10.5763 2.50346 11.6463 3.57347C12.7163 4.64347 13.3174 6.0947 13.3174 7.60791Z"
                                        stroke="#F0C436" stroke-width="0.950928" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="flex-grow-1">
                                <strong>Application Evaluation</strong><br>
                                <small>01/03/2026 09:00</small>
                            </div>
                            <span class="status-pill bg-warning-subtle text-warning">
                                Under Review
                            </span>
                        </div>

                        <div class="timeline-step">
                            <div class="timeline-icon pending"></div>
                            <div class="flex-grow-1">
                                <strong>Proposal Submission</strong>
                            </div>
                            <span class="status-pill pending-btn">
                                Pending
                            </span>
                        </div>

                        <div class="timeline-step">
                            <div class="timeline-icon pending"></div>
                            <div class="flex-grow-1">
                                <strong>Proposal Evaluation</strong>
                            </div>
                            <span class="status-pill pending-btn">
                                Pending
                            </span>
                        </div>

                        <div class="timeline-step">
                            <div class="timeline-icon pending"></div>
                            <div class="flex-grow-1">
                                <strong>Pitching</strong>
                            </div>
                            <span class="status-pill pending-btn">
                                Pending
                            </span>
                        </div>

                        <div class="timeline-step">
                            <div class="timeline-icon pending"></div>
                            <div class="flex-grow-1">
                                <strong>Final Result</strong>
                            </div>
                            <span class="status-pill pending-btn">
                                Pending
                            </span>
                        </div>

                    </div>

                    <!-- RIGHT: Details -->
                    <div class="col-md-4">

                        <p class="mb-3">
                            <strong>Application Details</strong>
                        </p>

                        <div class="app-detail-col">
                            <p class="mb-0 text-muted">
                                Application ID
                            </p>
                            <div class="detail-title" id="modalApplicationId">
                                -
                            </div>
                        </div>

                        <div class="app-detail-col">
                            <p class="mt-3 mb-0 text-muted">
                                Applied On
                            </p>
                            <div class="detail-title" id="modalAppliedOn">
                                -
                            </div>
                        </div>

                        <div class="app-detail-col">
                            <p class="mt-3 mb-0 text-muted">
                                Current Stage
                            </p>
                            <div class="detail-title" id="modalCurrentStage">
                                -
                            </div>
                        </div>

                        <div class="app-detail-col">
                            <p class="mt-3 mb-0 text-muted">
                                Founder
                            </p>
                            <div class="detail-title" id="modalFounder">
                                -
                            </div>
                        </div>

                        <div class="snapshot-box mt-4">
                            <p class="mb-4 fw-semibold">
                                Fund Snapshot
                            </p>

                            <p class="mb-1">
                                Status:
                                <b id="modalStatus">-</b>
                            </p>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="applicationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <div class="modal-header border-0" style="border-bottom:1px solid rgb(0 0 0 / 10%) !important;">

                <div class="d-flex align-items-center gap-3">

                    <div class="FD-text" id="appFundLogoWrapper">
                        <h2 class="gradient-text mb-0" id="appFundShort">FD</h2>
                    </div>

                    <div>
                        <h3 class="mb-0 modal-heading" id="appFundName">-</h3>
                        <small class="text-muted">
                            Application Details
                        </small>
                    </div>

                </div>

                <button class="btn-close" data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <!-- LEFT -->
                    <div class="col-lg-8">

                        <h5 class="mb-4">Questionnaire</h5>

                        <div id="applicationAnswers">
                            <!-- Dynamic -->
                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-4">

                        <h5 class="mb-4">Application Information</h5>

                        <div class="app-detail-col">
                            <p class="text-muted mb-0">Theme</p>
                            <div class="detail-title" id="appTheme">-</div>
                        </div>

                        <div class="app-detail-col mt-3">
                            <p class="text-muted mb-0">Sub Theme</p>
                            <div class="detail-title" id="appSubTheme">-</div>
                        </div>

                        <div class="app-detail-col mt-3">
                            <p class="text-muted mb-0">Project Duration</p>
                            <div class="detail-title" id="appDuration">-</div>
                        </div>

                        <div class="app-detail-col mt-3">
                            <p class="text-muted mb-0">Total Budget</p>
                            <div class="detail-title" id="appBudget">-</div>
                        </div>

                        <div class="app-detail-col mt-3">
                            <p class="text-muted mb-0">Status</p>
                            <div class="detail-title" id="appStatus">-</div>
                        </div>

                        <div class="mt-4 snapshot-box">

                            <p class="fw-semibold mb-3">
                                Additional Information
                            </p>

                            <div id="appAdditionalInfo" style="white-space:pre-wrap;font-size:14px;">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.view-application').forEach(button => {

            button.addEventListener('click', function() {

                const fund = this.dataset.fund;
                const owner = this.dataset.owner;
                const applicationId = this.dataset.applicationId;
                const applied = this.dataset.applied;
                const stage = this.dataset.stage;
                const status = this.dataset.status;

                document.getElementById('modalFundName').textContent = fund;
                document.getElementById('modalFundOwner').textContent = owner;
                document.getElementById('modalApplicationId').textContent = applicationId;
                document.getElementById('modalAppliedOn').textContent = applied;
                document.getElementById('modalCurrentStage').textContent = stage
                    .replace(/[_-]/g, ' ')
                    .replace(/\b\w/g, c => c.toUpperCase());
                document.getElementById('modalFounder').textContent = owner;
                document.getElementById('modalStatus').textContent = status;

           const logo = this.dataset.logo;
const logoWrapper = document.getElementById('modalFundLogoWrapper');

if (logo) {

    logoWrapper.innerHTML = `
        <img
            src="/storage/${logo}"
            alt="${fund} Logo"
            class="img-fluid w-100 h-100 object-fit-cover">
    `;

} else {

    logoWrapper.innerHTML = `
        <h2 class="gradient-text mb-0" id="modalFundShort">
            ${fund.substring(0, 2).toUpperCase()}
        </h2>
    `;

}
            });

        });

    });
</script>

<script>
    document.getElementById("continueBtn").addEventListener("click", function() {
        const modal = new bootstrap.Modal(document.getElementById("submitAward"));
        modal.show();
    });
</script>

<script>
    let timeout = null;

    document.getElementById('searchInput').addEventListener('input', function() {
        clearTimeout(timeout);

        timeout = setTimeout(() => {
            this.form.submit();
        }, 400); // 500ms debounce
    });
</script>

<script>
    const applicationShowRoute = "{{ route('my-applications.show', ':id') }}";

    $(document).on('click', '.application-details', function() {

        const applicationId = $(this).data('application-id');
        const url = applicationShowRoute.replace(':id', applicationId);

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(response) {

                const app = response.application;

                function formatIndianNumber(value) {
                    value = String(value || '').replace(/,/g, '');

                    if (!value || isNaN(value)) {
                        return '-';
                    }

                    return Number(value).toLocaleString('en-IN');
                }

         const logoWrapper = $('#appFundLogoWrapper');

if (app.fund.fund_logo) {

    logoWrapper.html(`
        <img
            src="/storage/${app.fund.fund_logo}"
            alt="${app.fund.fund_name} Logo"
            class="img-fluid w-100 h-100 object-fit-cover">
    `);

} else {

    logoWrapper.html(`
        <h2 class="gradient-text mb-0">
            ${app.fund.fund_name.substring(0, 2).toUpperCase()}
        </h2>
    `);

}

                $('#appFundName').text(app.fund.fund_name);

                $('#appTheme').text(app.theme?.theme_name ?? '-');
                $('#appSubTheme').text(app.sub_theme?.sub_theme_name ?? '-');
                $('#appDuration').text(app.project_duration + ' Months');
                $('#appBudget').text('₹ ' + formatIndianNumber(app.total_budget));
                $('#appStatus').text(app.status);
                $('#appAdditionalInfo').text(app.additional_info);

                let html = '';

                app.answers.forEach(function(answer, index) {

                    html += `
            <div class="card mb-3 border-0 shadow-sm">
                <div class="card-body">

                    <div class="fw-semibold mb-2">
                        Q${index + 1}.
                        ${answer.questionnaire?.question ?? 'Question'}
                    </div>

                    <div class="text-muted">
                        ${answer.answer ?? '-'}
                    </div>

                </div>
            </div>
        `;
                });

                $('#applicationAnswers').html(html);

                $('#applicationModal').modal('show');
            },
            error: function(xhr) {
                console.error(xhr);
                alert('Unable to fetch application details.');
            }
        });

    });
</script>

@endsection