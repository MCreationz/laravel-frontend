@extends('superadmin.layouts.app')

@section('title', 'Entities')

@section('content')
<div class="card-box bg-white rounded">
    <!-- Header -->
    <div class="top-search-wrap p-3 mb-2">
        <div class="row justify-content-between align-items-center row-gap-2">
            <div class="col-auto">
                <div class="mb-0 fw-bold table-heading">
                    Entities
                </div>
                <p class="text-muted mb-0">
                    {{ $organizations->total() }} Entities
                </p>
            </div>

            <form method="GET" action="{{ route('superadmin.entities.index') }}"
                class="col-12 col-lg-10 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">

                <!-- Search -->
                <div class="search-bar input-group flex-nowrap position-relative" style="max-width:273px;">
                    <input type="text"
                        id="searchInput"
                        name="search"
                        class="form-control search-input w-100"
                        placeholder="Search Entity"
                        value="{{ request('search') }}">
                </div>

                <!-- Role -->
                <div style="max-width:140px;">
                    <select name="role" class="form-control" onchange="this.form.submit()">
                        <option value="">All Roles</option>
                        <option value="startup" {{ request('role') == 'startup' ? 'selected' : '' }}>
                            Startup
                        </option>
                        <option value="npo" {{ request('role') == 'npo' ? 'selected' : '' }}>
                            NPO
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
                    <th class="first-col">Organization</th>
                    <th class="text-center">Work Email</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Profile</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Operational Details</th>
                    <th class="text-center">Funders</th>
                    <th class="text-center">Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($organizations as $organization)
                <tr>

                    <!-- Organization -->
                    <td>
                        <div class="d-flex align-items-center gap-2"
                            style="cursor: pointer;">

                            <div class="px-2 py-1 fw-bold gradient-text">
                                {{ strtoupper(substr($organization->organization_name, 0, 2)) }}
                            </div>

                            <div>
                                <div class="fw-medium">
                                    {{ $organization->organization_name }}
                                </div>

                                <small class="text-muted">
                                    {{ $organization->work_email }}
                                </small>
                            </div>
                        </div>
                    </td>

                    <!-- Work Email -->
                    <td class="text-center">
                        {{ $organization->work_email ?? '-' }}
                    </td>

                    <!-- Role -->
                    <td class="text-center">
                        @if ($organization->role === 'fund_seeker')
                        Startup
                        @else
                        Non-Profit
                        @endif
                    </td>
                    <!-- Profile -->
                    <td class="text-center">
                        @if ($organization->profile)
                        <span class="badge bg-success-subtle text-success">
                            Complete
                        </span>
                        @else
                        <span class="badge bg-warning-subtle text-warning">
                            Pending
                        </span>
                        @endif
                    </td>

                    <!-- Address -->
                    <td class="text-center">
                        @if ($organization->address)
                        <span class="badge bg-success-subtle text-success">
                            Added
                        </span>
                        @else
                        <span class="badge bg-warning-subtle text-warning">
                            Pending
                        </span>
                        @endif
                    </td>

                    <!-- Operational Details -->
                    <td class="text-center">
                        @if ($organization->operationalDetail)
                        <span class="badge bg-success-subtle text-success">
                            Added
                        </span>
                        @else
                        <span class="badge bg-warning-subtle text-warning">
                            Pending
                        </span>
                        @endif
                    </td>

                    <!-- Funders -->
                    <td class="text-center">
                        {{ $organization->funders->count() }}
                    </td>

                    <!-- Status -->
                    <td class="text-center">
                        @if ($organization->isProfileComplete())
                        <span class="badge bg-success-subtle text-success">
                            Complete
                        </span>
                        @else
                        <span class="badge bg-warning-subtle text-warning">
                            Incomplete
                        </span>
                        @endif
                    </td>

                    <!-- Actions -->
                    <td class="action-btn">
                        <div class="btn-group gap-1">

                            <!-- Edit -->
                            <!-- <a href="{{ route('superadmin.entities.edit', $organization->id) }}"
                                class="edit-btn">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 16 16"
                                    fill="none">
                                    <path
                                        d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z"
                                        stroke="#07CCB5"
                                        stroke-width="1.2" />
                                </svg>
                            </a> -->

                            <!-- Delete -->
                            <form action="{{ route('superadmin.entities.destroy', $organization->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this entity?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="trash-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="13"
                                        height="15"
                                        viewBox="0 0 13 15"
                                        fill="none">
                                        <path
                                            d="M1.3 3L2 12.2C2.1 13 2.7 13.6 3.5 13.6H8.7C9.5 13.6 10.1 13 10.2 12.2L10.9 3"
                                            stroke="#E74C3C"
                                            stroke-width="1.2" />
                                        <path
                                            d="M0.6 3.1C4 2.5 8.2 2.5 11.6 3.1"
                                            stroke="#E74C3C"
                                            stroke-width="1.2" />
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="9" class="text-center py-4">
                        No entities found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="p-3">
        {{ $organizations->links() }}
    </div>
</div>
@endsection