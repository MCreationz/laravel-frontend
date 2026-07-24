@extends('superadmin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

@php

/*
|--------------------------------------------------------------------------
| GLOBAL KPIs
|--------------------------------------------------------------------------
*/

$totalApplications = \App\Models\FundApplication::count();

$ongoing = \App\Models\FundApplication::where('status', 'ongoing')->count();

$selected = \App\Models\FundApplication::where('status', 'selected')->count();

$rejected = \App\Models\FundApplication::where('status', 'rejected')->count();

$fundingAvailable =  0;


/*
|--------------------------------------------------------------------------
| CLIENT ADMINS
|--------------------------------------------------------------------------
*/

$totalClients = \App\Models\ClientAdmin::count();

$activeClients = \App\Models\ClientAdmin::where('status', 'active')->count();

$recentClients = \App\Models\ClientAdmin::latest()->take(5)->get();


/*
|--------------------------------------------------------------------------
| ORGANIZATIONS (APPLICANTS)
|--------------------------------------------------------------------------
*/

$totalApplicants = \App\Models\Organization::count();

$verifiedApplicants = \App\Models\Organization::whereHas('profile')
    ->whereHas('address')
    ->whereHas('operationalDetail')
    ->count();


/*
|--------------------------------------------------------------------------
| REVIEWERS
|--------------------------------------------------------------------------
*/

$totalReviewers = \App\Models\Reviewer::count();

$activeReviewers = \App\Models\Reviewer::where('status', 'verified')->count();


/*
|--------------------------------------------------------------------------
| FUNDS
|--------------------------------------------------------------------------
*/

$totalFunds = \App\Models\Fund::count();

$activeFunds = \App\Models\Fund::where('status', 'active')->count();

$closedFunds = \App\Models\Fund::where('status', 'closed')->count();

$suspendedFunds = \App\Models\Fund::where('status', 'suspended')->count();

$draftFunds = \App\Models\Fund::where('status', 'draft')->count();

$totalStatusFunds = max(1, $activeFunds + $closedFunds + $suspendedFunds + $draftFunds);


/*
|--------------------------------------------------------------------------
| RECENT APPLICATIONS
|--------------------------------------------------------------------------
*/

$recentApplications = \App\Models\FundApplication::with(['fund', 'organization'])
    ->latest()
    ->take(4)
    ->get();

@endphp


{{-- HEADER --}}
<div class="dashboard-v2">
    <div class="dashboard-v2-summary-card mb-3">
        <div class="dashboard-col-wrap d-flex justify-content-between align-items-stretch flex-wrap gap-2">

            <div class="left-content col-12 col-lg-4">
                <p class="dashboard-v2-welcome mb-2">Super Admin</p>
                <h2 class="dashboard-v2-name mb-1">Fundlink Control Centre</h2>
                <p class="text-white mb-0">
                    Full platform oversight - clients, applicants, reviewers, and funds
                </p>
            </div>

            <div class="col-12 col-lg-7 d-flex flex-wrap gap-1 justify-content-lg-end">

                <div class="col">
                    <div class="dashboard-v2-kpi">
                        <p class="mb-0 value">₹{{ number_format($fundingAvailable) }}</p>
                        <p class="mb-0 label">Funding Available</p>
                    </div>
                </div>

                <div class="col">
                    <div class="dashboard-v2-kpi">
                        <p class="mb-0 value">{{ $totalApplications }}</p>
                        <p class="mb-0 label">Total Applications</p>
                    </div>
                </div>

                <div class="col">
                    <div class="dashboard-v2-kpi">
                        <p class="mb-0 value">{{ $ongoing }}</p>
                        <p class="mb-0 label">Ongoing</p>
                    </div>
                </div>

                <div class="col">
                    <div class="dashboard-v2-kpi">
                        <p class="mb-0 value">{{ $selected }}</p>
                        <p class="mb-0 label">Selected</p>
                    </div>
                </div>

                <div class="col">
                    <div class="dashboard-v2-kpi">
                        <p class="mb-0 value">{{ $rejected }}</p>
                        <p class="mb-0 label">Rejected</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


{{-- STATUS CARDS --}}
<div class="dashboard-status d-flex row-cols-2 row-cols-md-4 flex-wrap row-gap-2">

    <div class="col px-1">
        <div class="single-box clients">
            <div class="number">{{ $activeClients }}</div>
            <div class="text">
                Active Client Admins
                <span>of {{ $totalClients }} total</span>
            </div>
        </div>
    </div>

    <div class="col px-1">
        <div class="single-box applicants">
            <div class="number">{{ $verifiedApplicants }}</div>
            <div class="text">
                Verified Organizations
                <span>of {{ $totalApplicants }} total</span>
            </div>
        </div>
    </div>

    <div class="col px-1">
        <div class="single-box reviewers">
            <div class="number">{{ $activeReviewers }}</div>
            <div class="text">
                Active Reviewers
                <span>of {{ $totalReviewers }} total</span>
            </div>
        </div>
    </div>

    <div class="col px-1">
        <div class="single-box funds">
            <div class="number">{{ $activeFunds }}</div>
            <div class="text">
                Active Funds
                <span>of {{ $totalFunds }} total</span>
            </div>
        </div>
    </div>

</div>


{{-- RECENT + FUND STATUS --}}
<div class="recent-status mt-3">

<div class="d-flex row-cols-1 row-cols-lg-2 flex-wrap row-gap-2">

    <div class="col px-1">

        <div class="recent-col client bg-white h-100">

            <div class="top-title-wrap px-2 px-md-3 pt-3 pt-md-4 pb-2">
                <h3 class="top-title mb-0 font-inter h5 fw-bold">
                    Recent Client Admins
                </h3>
            </div>

            <div class="recent-inner">

                @forelse($recentApplications as $application)

                    <div class="single-row d-flex justify-content-between px-2 px-md-3 py-2 py-md-3 align-items-center">

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
                                style="width: {{ $totalStatusFunds > 0 ? ($activeFunds / $totalStatusFunds) * 100 : 0 }}%">
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
                                style="width: {{ $totalStatusFunds > 0 ? ($closedFunds / $totalStatusFunds) * 100 : 0 }}%">
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
                                style="width: {{ $totalStatusFunds > 0 ? ($suspendedFunds / $totalStatusFunds) * 100 : 0 }}%">
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
                                style="width: {{ $totalStatusFunds > 0 ? ($draftFunds / $totalStatusFunds) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>s
<script>
    const toggleBtn = document.getElementById("sidebar-toggle");
    const sidebar = document.querySelector("body");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-active");
    });
</script>

@endsection