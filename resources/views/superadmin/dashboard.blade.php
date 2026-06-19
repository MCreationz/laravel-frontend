@extends('superadmin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="dashboard-v2">
        <div class="dashboard-v2-summary-card mb-3">
            <div class="dashboard-v2-summary-grid">
                <div class="dashboard-v2-org">
                    <p class="dashboard-v2-welcome mb-1">Super Admin</p>

                    <h2 class="dashboard-v2-name mb-1">
                        Fundlink Control Centre
                    </h2>
                   <p>Full platform oversight - clients, applicants, reviewers, and funds</p>

                    <p class="dashboard-v2-meta mb-0">
                     
                    </p>
                </div>

                <div class="dashboard-v2-kpi">
                    <p class="mb-0 value">
                        ₹{{ number_format($fundingAvailable ?? 0) }}
                    </p>
                    <p class="mb-0 label">Funding Available</p>
                </div>

                <div class="dashboard-v2-kpi">
                    <p class="mb-0 value">{{ $totalApplications ?? 0 }}</p>
                    <p class="mb-0 label">Total Applications</p>
                </div>

                <div class="dashboard-v2-kpi">
                    <p class="mb-0 value">{{ $ongoing ?? 0 }}</p>
                    <p class="mb-0 label">Ongoing</p>
                </div>

                <div class="dashboard-v2-kpi">
                    <p class="mb-0 value">{{ $selected ?? 0 }}</p>
                    <p class="mb-0 label">Selected</p>
                </div>

                <div class="dashboard-v2-kpi">
                    <p class="mb-0 value">{{ $rejected ?? 0 }}</p>
                    <p class="mb-0 label">Rejected</p>
                </div>
            </div>


        </div>

        <div class="dashboard-v2-table-card">
            <div class="dashboard-v2-table-head">
                <h3 class="mb-0">All Projects</h3>
                <div class="dashboard-v2-filters">
                    <div class="search-box dashboard-v2-search">
                        <span class="search-icon w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                <path
                                    d="M5.70944 0.00239889C4.19598 0.00493613 2.74524 0.607279 1.67506 1.67746C0.604881 2.74764 0.00253724 4.19838 0 5.71184C0.0012649 7.22657 0.602894 8.67904 1.67307 9.75102C2.74325 10.823 4.19471 11.4271 5.70944 11.4309C7.05284 11.4309 8.29068 10.9583 9.26944 10.1762L11.6468 12.5536C11.7672 12.6656 11.9264 12.7265 12.0908 12.7236C12.2552 12.7207 12.4121 12.6543 12.5286 12.5381C12.645 12.422 12.7119 12.2653 12.7152 12.1008C12.7186 11.9364 12.658 11.7771 12.5464 11.6564L10.169 9.27664C10.981 8.26684 11.4236 7.00998 11.4237 5.71424C11.4237 2.56685 8.85683 0.00239889 5.70944 0.00239889ZM5.70944 1.27383C8.17074 1.27383 10.1522 3.25294 10.1522 5.71184C10.1522 8.17074 8.17074 10.1618 5.70944 10.1618C3.24814 10.1618 1.26903 8.17793 1.26903 5.71664C1.26903 3.25534 3.24814 1.27383 5.70944 1.27383Z"
                                    fill="#BABABA" />
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <div class="select-wrapper dashboard-v2-select">
                        <div class="custom-select form-control">Category</div>
                        <input type="hidden" class="hidden-select" value="">
                        <ul class="select-list">
                            <li data-value="all">All</li>
                            <li data-value="education">Education</li>
                            <li data-value="health">Health</li>
                        </ul>
                    </div>
                </div>
            </div>
{{-- 
            <div class="table-responsive">
                <table class="table dashboard-v2-table mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Domain Tags</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($funds as $fund)
                            @php
                                $snapshot = $fund->snapshot;

                                $tags = collect(explode(',', $snapshot->eligible_states ?? ''))
                                    ->filter()
                                    ->values();

                                $statusItems = collect([
                                    $snapshot?->fund_outlay ? 'Fund Outlay: ₹' . $snapshot->fund_outlay : null,
                                    $snapshot?->fund_type ? 'Fund Type: ' . ucfirst($snapshot->fund_type) : null,
                                    $snapshot?->single_entity_cap ? 'Per Entity Cap: ₹' . $snapshot->single_entity_cap : null,
                                ])->filter()->values();
                            @endphp

                            <tr>
                                <td>
                                    <div class="dashboard-v2-name-cell">
                                        <span class="hc-badge">
                                            {{ strtoupper(substr($fund->fund_name ?? 'F', 0, 2)) }}
                                        </span>
                                        <span>{{ $fund->fund_name }}</span>
                                    </div>
                                </td>

                                <td>
                                    <div class="tag-wrap">
                                        @foreach($tags->take(3) as $tag)
                                            <span class="tag-pill">{{ trim($tag) }}</span>
                                        @endforeach

                                        @if($tags->count() > 3)
                                            <span class="tag-pill plus">+{{ $tags->count() - 3 }}</span>
                                        @endif
                                    </div>
                                </td>

                                <td>
                                    <div class="status-wrap">
                                        @foreach($statusItems->take(3) as $item)
                                            <span class="status-pill">{{ $item }}</span>
                                        @endforeach

                                        @if($statusItems->count() > 3)
                                            <span class="status-pill plus">+{{ $statusItems->count() - 3 }}</span>
                                        @endif
                                    </div>
                                </td>

                                <td class="text-end">
                                    <div class="dashboard-v2-action">
                                        <a href=""
                                            class="btn btn-primary dashboard-v2-apply">
                                            Apply Now
                                        </a>

                                        <a href="" class="dashboard-v2-view-link">
                                            View Details
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">
                                    No funds available.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> --}}
        </div>
    </div>
@endsection
