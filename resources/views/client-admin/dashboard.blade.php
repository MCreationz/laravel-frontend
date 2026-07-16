@extends('client-admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-v2">
        <div class="dashboard-v2-summary-card mb-3">
            <div class="dashboard-col-wrap d-flex justify-content-between align-items-center flex-wrap gap-2 gap-lg-0">
                <div class="left-content col-12 col-lg-4 col-xl-5 flex-shrink-0">
                    <p class="dashboard-v2-welcome mb-2">Client Admin</p>
                    <h2 class="dashboard-v2-name mb-1">
                        Fundlink Control Centre
                    </h2>
                </div>
                <div
                    class="col-12 col-lg-7 flex-grow-1 flex-wrap flex-lg-nowrap dashboar-cards-wrap d-flex gap-1 justify-content-lg-end row-cols-1 row-cols-sm-2 row-cols-md-4">

                    <div class="col">
                        <div class="dashboard-v2-kpi">
                            <p class="mb-0 value">
                                ₹0
                            </p>
                            <p class="mb-0 label">Funding Available</p>
                        </div>
                    </div>

                    <div class="col">
                        <div class="dashboard-v2-kpi">
                            <p class="mb-0 value">
                                {{ \App\Models\FundApplication::whereHas('fund', function ($q) {
                                    $q->where('client_id', auth('client_admin')->id());
                                })->count() }}
                            </p>
                            <p class="mb-0 label">Total Applications</p>
                        </div>
                    </div>

                    <div class="col">
                        <div class="dashboard-v2-kpi">
                            <p class="mb-0 value">
                                {{ \App\Models\FundApplication::whereHas('fund', function ($q) {
                                    $q->where('client_id', auth('client_admin')->id());
                                })->where('status', 'ongoing')->count() }}
                            </p>
                            <p class="mb-0 label">Ongoing</p>
                        </div>
                    </div>

                    <div class="col">
                        <div class="dashboard-v2-kpi">
                            <p class="mb-0 value">
                                {{ \App\Models\FundApplication::whereHas('fund', function ($q) {
                                    $q->where('client_id', auth('client_admin')->id());
                                })->where('status', 'selected')->count() }}
                            </p>
                            <p class="mb-0 label">Selected</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dashboard-v2-kpi">
                            <p class="mb-0 value">
                                {{ \App\Models\FundApplication::whereHas('fund', function ($q) {
                                    $q->where('client_id', auth('client_admin')->id());
                                })->where('status', 'selected')->count() }}
                            </p>
                            <p class="mb-0 label">Selected</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @php

        $clientId = auth('client_admin')->id();

        /*
|--------------------------------------------------------------------------
| ORGANIZATIONS
|--------------------------------------------------------------------------
*/

        $totalOrganizations = \App\Models\Organization::count();

        $verifiedOrganizations = \App\Models\Organization::whereHas('profile')
            ->whereHas('address')
            ->whereHas('operationalDetail')
            ->count();

        /*
|--------------------------------------------------------------------------
| REVIEWERS (CLIENT-SCOPED FIX REQUIRED)
|--------------------------------------------------------------------------
*/

        $totalReviewers = \App\Models\Reviewer::where('client_id', $clientId)->count();

        $activeReviewers = \App\Models\Reviewer::where('client_id', $clientId)->where('status', 'verified')->count();

        /*
|--------------------------------------------------------------------------
| FUNDS (CLIENT-SCOPED)
|--------------------------------------------------------------------------
*/

        $fundsQuery = \App\Models\Fund::where('client_id', $clientId);

        $totalFunds = (clone $fundsQuery)->count();

        $openFunds = (clone $fundsQuery)->where('status', 'active')->count();

        $activeFunds = (clone $fundsQuery)->where('status', 'active')->count();

        $closedFunds = (clone $fundsQuery)->where('status', 'closed')->count();

        $suspendedFunds = (clone $fundsQuery)->where('status', 'suspended')->count();

        $draftFunds = (clone $fundsQuery)->where('status', 'draft')->count();

        $totalStatusFunds = max(1, $activeFunds + $closedFunds + $suspendedFunds + $draftFunds);

        /*
|--------------------------------------------------------------------------
| RECENT APPLICATIONS (ORG-BASED)
|--------------------------------------------------------------------------
*/

        $recentApplications = \App\Models\FundApplication::with(['fund', 'organization'])
            ->whereHas('fund', function ($q) use ($clientId) {
                $q->where('client_id', $clientId);
            })
            ->latest()
            ->take(4)
            ->get();

    @endphp

    {{-- <div class="dashboard-status d-flex d-flex row-cols-2 row-cols-md-3 flex-wrap row-gap-2">
        <div class="col px-1">
            <div class="single-item">
                <div class="single-box applicants">
                    <div class="number">
                        {{ $verifiedOrganizations }}
                    </div>
                    <div class="text">
                        Verified Organizations
                        <span>of {{ $totalOrganizations }} total</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col px-1">
            <div class="single-item">
                <div class="single-box reviewers">
                    <div class="number">
                        {{ $activeReviewers }}
                    </div>
                    <div class="text">
                        Active Reviewers
                        <span>of {{ $totalReviewers }} total</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col px-1">
            <div class="single-item">
                <div class="single-box funds">
                    <div class="number">
                        {{ $openFunds }}
                    </div>
                    <div class="text">
                        Open Funding Calls
                        <span>of {{ $totalFunds }} total</span>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}

    <div class="recent-status mt-3">

        <div class="d-flex row-cols-1 row-cols-lg-2 flex-wrap row-gap-2">

            <div class="col px-1">

                <div class="recent-col client bg-white h-100">

                    <div class="top-title-wrap px-2 px-md-3 pt-3 pt-md-4 pb-2">
                        <h3 class="top-title mb-0 font-inter h5 fw-bold">
                            Recent Applications
                        </h3>
                    </div>

                    <div class="recent-inner">

                        @forelse($recentApplications as $application)
                            <div
                                class="single-row d-flex justify-content-between px-2 px-md-3 py-2 py-md-3 align-items-center">

                                <div class="d-flex align-items-center gap-2">

                                    <div class="px-2 py-1 fw-bold gradient-text bordered">
                                        {{ strtoupper(substr($application->organization->organization_name ?? 'NA', 0, 2)) }}
                                    </div>

                                    <div class="text-wrap">

                                        <span class="fw-bold">
                                            {{ $application->organization->organization_name ?? 'Organization' }}
                                        </span>

                                        <p class="text-muted text-small">
                                            {{ $application->fund->fund_name ?? '-' }}
                                            •
                                            {{ $application->created_at->format('d/m/Y') }}
                                        </p>

                                    </div>

                                </div>

                                <div>
                                    <a href="#" class="btn btn-primary response">
                                        View
                                    </a>
                                </div>

                            </div>

                        @empty

                            <div class="text-center py-4">
                                No recent applications found.
                            </div>
                        @endforelse

                    </div>

                </div>

            </div>


            <div class="col px-1">

                <div class="recent-col fund-status bg-white py-3 py-md-4 px-2 px-md-3 h-100">

                    <div class="top-title-wrap">
                        <h3 class="top-title mb-0 font-inter h5 fw-bold">
                            Fund Status Overview
                        </h3>
                    </div>

                    <div class="recent-inner">

                        <div class="status-progress-wrap">

                            <div class="status-row">
                                <div class="status-header">
                                    <span><strong>Active</strong></span>
                                    <span>{{ $activeFunds }}</span>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar progress-active"
                                        style="width: {{ ($activeFunds / $totalStatusFunds) * 100 }}%">
                                    </div>
                                </div>
                            </div>

                            <div class="status-row">
                                <div class="status-header">
                                    <span><strong>Closed</strong></span>
                                    <span>{{ $closedFunds }}</span>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar progress-closed"
                                        style="width: {{ ($closedFunds / $totalStatusFunds) * 100 }}%">
                                    </div>
                                </div>
                            </div>

                            <div class="status-row">
                                <div class="status-header">
                                    <span><strong>Suspended</strong></span>
                                    <span>{{ $suspendedFunds }}</span>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar progress-suspended"
                                        style="width: {{ ($suspendedFunds / $totalStatusFunds) * 100 }}%">
                                    </div>
                                </div>
                            </div>

                            <div class="status-row mb-0">
                                <div class="status-header">
                                    <span><strong>Draft</strong></span>
                                    <span>{{ $draftFunds }}</span>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar progress-draft"
                                        style="width: {{ ($draftFunds / $totalStatusFunds) * 100 }}%">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
