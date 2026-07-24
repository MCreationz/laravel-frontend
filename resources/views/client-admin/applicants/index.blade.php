@extends('client-admin.layouts.app')

@section('title', 'Funds')

@section('content')

<div class="card-box bg-white rounded card-box-applicants">

    <!-- Header -->
    <div class="top-search-wrap p-3 mb-2">
        <div class="row justify-content-between align-items-center row-gap-2">

            <div class="col-auto">
                <div class="mb-1 fw-bold table-heading">
                    Applicants
                </div>

                <p class="text-muted mb-0">
                    {{ $applicants->total() }} Applicants Found
                </p>
            </div>

            <form method="GET" action=""
                class="col-12 col-lg-10 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">

                <!-- Search -->
                <div class="search-bar input-group flex-nowrap position-relative" style="max-width:273px;">
                    <input type="text" id="searchInput" name="search" class="form-control search-input w-100"
                        placeholder="Search " value="{{ request('search') }}">
                </div>

                <!-- Type -->
                <!-- <div style="max-width:140px;">
                        <select name="type" class="form-control" onchange="this.form.submit()">
                            <option value="">All Types</option>
                            <option value="npo" {{ request('type') == 'npo' ? 'selected' : '' }}>NPO</option>
                            <option value="startup" {{ request('type') == 'startup' ? 'selected' : '' }}>Startup</option>
                        </select>
                    </div> -->
                @php
                use App\Models\Fund;

                $funds = Fund::where('client_id', auth('client_admin')->id())
                ->latest()
                ->get();

                @endphp

                <!-- Status -->
                <div style="max-width:220px;">
                    <select name="fund_id" class="form-control btn-select" onchange="this.form.submit()">
                        <option value="">All Funds</option>

                        @foreach($funds as $fund)
                        <option value="{{ $fund->id }}"
                            {{ request('fund_id') == $fund->id ? 'selected' : '' }}>
                            {{ $fund->fund_name }}
                        </option>
                        @endforeach

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
                    <th class="first-col">Organisation</th>
                    {{-- <th class="text-center">Type</th> --}}
                    <th class="text-center">Fund</th>
                    <th class="text-center">Contact</th>
                    <th class="text-center">PAN</th>
                    <th class="text-center">Vintage</th>
                    <th class="text-center">Theme</th>
                    <th class="text-center">Sub-Theme</th>




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
                    {{--
                            <td class="text-center">
                                {{ ucfirst($organization->role ?? '-') }}
                    </td> --}}
                    <td class="text-center">
                        {{$applicant->fund->fund_name}}
                    </td>


                    <td class="text-center">
                        {{ $profile->contact_name ?? '-' }}
                        @if ($profile?->mobile_no)
                        <br>
                        <small class="text-muted">{{ $profile->mobile_no }}</small>
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
                        {{ $applicant->theme->theme_name ?? '-' }}
                    </td>
                    <td class="text-center">
                        {{ $applicant->subtheme->sub_theme_name ?? '-' }}
                    </td>





                    <td class="text-center action-btn">
                        <a href="{{ route('client-admin.applicants.edit', $organization->id) }}" class="edit-btn">

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
@endsection