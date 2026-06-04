@extends('layouts.dashboard')

@section('page_title', '')

@section('header_extra')
    <span class="header-org-chip">Non - Profit Organisation</span>
@endsection

@section('content')


    <div class="card-box bg-white rounded">

        <!-- Header -->
        <div class="top-search-wrap p-3 mb-2">
            <div class="row justify-content-between align-items-center row-gap-2">

                <div class="col-auto">
                    <div class="mb-0 fw-bold table-heading">
                        Applicants
                    </div>

                    <p class="text-muted mb-0">
                        {{ $applications->total() }} Applications Found
                    </p>
                </div>

                <form method="GET" action="http://127.0.0.1:8000/client-admin/funds"
                    class="col-12 col-lg-10 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">

                    <!-- Search -->
                    <div class="search-bar input-group flex-nowrap position-relative" style="max-width:273px;">
                        <input type="text" id="searchInput" name="search" class="form-control search-input w-100"
                            placeholder="Search Fund" value="">
                    </div>

                    <!-- Type -->
                    <div style="max-width:140px;">
                        <select name="fund_type" class="form-control" onchange="this.form.submit()">
                            <option value="">All Types</option>
                            <option value="npo">
                                NPO
                            </option>
                            <option value="startup">
                                Startup
                            </option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div style="max-width:126px;">
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="">All Status</option>
                            <option value="draft">Draft</option>
                            <option value="active">Active</option>
                            <option value="closed">Closed</option>
                            <option value="completed">Completed</option>
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
                                <div class="dashboard-v2-name-cell">
                                    <span class="hc-badge">
                                        {{ strtoupper(substr($application->fund->fund_name ?? 'F', 0, 2)) }}
                                    </span>

                                    <span>
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
                                Step {{ $application->current_step }}
                            </td>

                            <td class="text-center">
                                <span class="badge {{ $statusClass }}">
                                    {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                                </span>
                            </td>

                            <td class="text-center action-btn">
                                <a href="" class="edit-btn" title="View">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                        fill="none" stroke="#07CCB5" stroke-width="2">
                                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </a>
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

@endsection