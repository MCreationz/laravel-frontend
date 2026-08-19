@extends('layouts.dashboard')

@section('page_title', 'Discover Funds')

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
<style>
    
</style>

<div class="card-box bg-white rounded">

    <!-- Header -->
    <div class="top-search-wrap p-3 mb-2">
        <div class="row justify-content-between align-items-center row-gap-2">

            <div class="col-auto">
                <div class="mb-0 fw-bold table-heading">
                    Discover Funds
                </div>

                <p class="text-muted mb-0">
                    {{ $funds->total() }} Funds Found
                </p>
            </div>

            <form method="GET"
                class="col-12 col-lg-10 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">

                <!-- Search -->
                <div class="search-bar input-group flex-nowrap position-relative" style="max-width:273px;">
                    <input type="text"
                        name="search"
                        class="form-control search-input w-100"
                        placeholder="Search Fund"
                        value="{{ request('search') }}">
                </div>

                <!-- Type -->
                <div style="max-width:140px;">
                    <select name="fund_type"
                        class="form-control"
                        onchange="this.form.submit()">
                        <option value="">All Types</option>
                        <option value="npo" {{ request('fund_type') == 'npo' ? 'selected' : '' }}>NPO</option>
                        <option value="startup" {{ request('fund_type') == 'startup' ? 'selected' : '' }}>Startup</option>
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
                    <th>Fund</th>
                    <th class="text-center">Owner</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Duration</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

       <tbody>

    @forelse($funds as $fund)

        <tr>

            <!-- Fund Name -->
            <td>
                <div class="dashboard-v2-name-cell">

                    @if($fund->fund_logo)
                        <img
                            src="{{ Storage::url($fund->fund_logo) }}"
                            alt="{{ $fund->fund_name ?? 'Fund' }} Logo"
                            style="width:48px;height:48px;object-fit:cover;flex-shrink:0;">
                    @else
                        <span class="hc-badge">
                            {{ strtoupper(substr($fund->fund_name ?? 'F', 0, 2)) }}
                        </span>
                    @endif

                    <span>
                        <strong>{{ $fund->fund_name ?? 'Unnamed Fund' }}</strong>
                    </span>

                </div>

                @if($fund->about_fund)
                    <small class="text-muted d-block mt-1">
                        {{ \Illuminate\Support\Str::limit($fund->about_fund, 60) }}
                    </small>
                @endif
            </td>

            <!-- Owner -->
            <td class="text-center">
                {{ $fund->fund_owner ?? '-' }}
            </td>

            <!-- Email -->
            <td class="text-center">
                {{ $fund->fund_owner_email ?? '-' }}
            </td>

            <!-- Duration -->
            <td class="text-center text-nowrap">
                @if($fund->project_start && $fund->project_end)
                    {{ $fund->project_start->format('d M Y') }}
                    <br>
                    <small class="text-muted">
                        to {{ $fund->project_end->format('d M Y') }}
                    </small>
                @else
                    -
                @endif
            </td>

            <!-- Status -->
            <td class="text-center">
                @php
                    $statusClass = match($fund->status) {
                        'active' => 'bg-success-subtle text-success',
                        'closed' => 'bg-danger-subtle text-danger',
                        'draft' => 'bg-warning-subtle text-warning',
                        'completed' => 'bg-primary-subtle text-primary',
                        default => 'bg-secondary-subtle text-secondary',
                    };
                @endphp

                <span class="badge {{ $statusClass }}">
                    {{ ucfirst($fund->status ?? 'unknown') }}
                </span>
            </td>

            <!-- Actions -->
            @php
                $hasApplied = auth('organization')->check()
                    && \App\Models\FundApplication::where('fund_id', $fund->id)
                        ->where('organization_id', auth('organization')->user()->id)
                        ->exists();
            @endphp

            <td class="text-end">
                <div class="dashboard-v2-action">

                    @if($fund->fund_scope === 'outside' && $fund->redirection_link)
                        <a href="{{ $fund->redirection_link }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="btn btn-primary dashboard-v2-apply">
                            Apply Now
                        </a>
                    @else
                        <a href="{{ route('projects.apply.questions', $fund) }}"
                            class="btn btn-primary dashboard-v2-apply">
                            {{ $hasApplied ? 'Apply Again' : 'Apply Now' }}
                        </a>
                    @endif

                    <a href="{{ route('projects.details', $fund->id) }}"
                        class="dashboard-v2-view-link">
                        View Details
                    </a>

                </div>
            </td>

        </tr>

    @empty

        <tr>
            <td colspan="6" class="text-center py-4">
                No funds available.
            </td>
        </tr>

    @endforelse

</tbody>

        </table>

    </div>

</div>

@endsection