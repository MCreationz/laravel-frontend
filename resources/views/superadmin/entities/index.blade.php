@extends('superadmin.layouts.app')

@section('title', 'Entities')

@section('content')

<style>
    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 4px 20px;
    }
    .detail-item {
        font-size: 14px;
        line-height: 1.6;
    }
</style>

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
 <a href="#"
    class="view-btn view-entity"
    data-bs-toggle="modal"
    data-bs-target="#entityModal"
    data-entity='@json($organization)'>

    <svg xmlns="http://www.w3.org/2000/svg"
        width="16"
        height="16"
        viewBox="0 0 16 16"
        fill="none">
        <path
            d="M1.33301 8.00033C1.33301 8.00033 3.66634 3.33366 7.99967 3.33366C12.333 3.33366 14.6663 8.00033 14.6663 8.00033C14.6663 8.00033 12.333 12.667 7.99967 12.667C3.66634 12.667 1.33301 8.00033 1.33301 8.00033Z"
            stroke="#07CCB5"
            stroke-width="1.2"
            stroke-linecap="round"
            stroke-linejoin="round" />

        <path
            d="M7.99967 10.0003C9.10424 10.0003 9.99967 9.10489 9.99967 8.00033C9.99967 6.89576 9.10424 6.00033 7.99967 6.00033C6.8951 6.00033 5.99967 6.89576 5.99967 8.00033C5.99967 9.10489 6.8951 10.0003 7.99967 10.0003Z"
            stroke="#07CCB5"
            stroke-width="1.2"
            stroke-linecap="round"
            stroke-linejoin="round" />
    </svg>

</a>

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


<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.view-entity').forEach(function (button) {

            button.addEventListener('click', function () {

                const entity = JSON.parse(this.dataset.entity);

                const profile = entity.profile || {};
                const address = entity.address || {};
                const operationalDetail = entity.operational_detail || entity.operationalDetail || {};
                const funders = entity.funders || [];

                /*
                |--------------------------------------------------------------------------
                | Helpers
                |--------------------------------------------------------------------------
                */

                const value = (val) => {
                    return val !== null && val !== undefined && val !== ''
                        ? val
                        : '-';
                };

                const escapeHtml = (text) => {
                    const div = document.createElement('div');
                    div.textContent = text ?? '';
                    return div.innerHTML;
                };

                const toTitleCase = (val) => {
                    return String(val)
                        .replace(/_/g, ' ')
                        .replace(/\b\w/g, char => char.toUpperCase());
                };

                /*
                |--------------------------------------------------------------------------
                | Organization Type
                |--------------------------------------------------------------------------
                */

                let entityType = '-';

                if (entity.role === 'fund_seeker') {
                    entityType = 'Startup';
                } else if (entity.role === 'funder') {
                    entityType = 'NPO';
                }

                /*
                |--------------------------------------------------------------------------
                | Header
                |--------------------------------------------------------------------------
                */

                const organizationName = value(entity.organization_name);

                document.getElementById('entityShort').textContent =
                    organizationName !== '-'
                        ? organizationName.substring(0, 2).toUpperCase()
                        : '-';

                document.getElementById('entityName').textContent =
                    organizationName;

                document.getElementById('entityType').textContent =
                    entityType + ' Entity Details';

                /*
                |--------------------------------------------------------------------------
                | Organization Information
                |--------------------------------------------------------------------------
                */

                document.getElementById('entityOrganizationName').textContent =
                    organizationName;

                document.getElementById('entityEmail').textContent =
                    value(entity.work_email);

                document.getElementById('entityRole').textContent =
                    entityType;

                document.getElementById('entityReferralSource').textContent =
                    value(entity.referral_source);

                /*
                |--------------------------------------------------------------------------
                | Profile / Completion
                |--------------------------------------------------------------------------
                */

                document.getElementById('entityProfileStatus').textContent =
                    Object.keys(profile).length > 0
                        ? 'Added'
                        : 'Pending';

                document.getElementById('entityAddressStatus').textContent =
                    Object.keys(address).length > 0
                        ? 'Added'
                        : 'Pending';

                document.getElementById('entityProfile').textContent =
                    Object.keys(profile).length > 0
                        ? 'Added'
                        : 'Pending';

                /*
                |--------------------------------------------------------------------------
                | Entity Information
                |--------------------------------------------------------------------------
                */

                document.getElementById('entityId').textContent =
                    value(entity.id);

                document.getElementById('entityTypeValue').textContent =
                    entityType;

                document.getElementById('entityCreatedAt').textContent =
                    entity.created_at
                        ? new Date(entity.created_at).toLocaleDateString('en-GB', {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric'
                        })
                        : '-';

                document.getElementById('entityUpdatedAt').textContent =
                    entity.updated_at
                        ? new Date(entity.updated_at).toLocaleDateString('en-GB', {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric'
                        })
                        : '-';

                /*
                |--------------------------------------------------------------------------
                | Address
                |--------------------------------------------------------------------------
                */

                let addressHtml = '<div class="detail-grid">';

                Object.entries(address).forEach(function ([key, val]) {

                    if (
                        key === 'id' ||
                        key === 'organization_id' ||
                        key === 'created_at' ||
                        key === 'updated_at'
                    ) {
                        return;
                    }

                    if (val !== null && val !== '') {
                        const label = toTitleCase(key);
                        const displayVal = (typeof val === 'string' && val.includes('_'))
                            ? toTitleCase(val)
                            : val;

                        addressHtml += `
                            <div class="detail-item">
                                <span class="text-muted">${escapeHtml(label)}:</span>
                                <strong>${escapeHtml(String(displayVal))}</strong>
                            </div>
                        `;
                    }
                });

                addressHtml += '</div>';

                document.getElementById('entityAddress').innerHTML =
                    addressHtml === '<div class="detail-grid"></div>' ? '-' : addressHtml;

                /*
                |--------------------------------------------------------------------------
                | Operational Details
                |--------------------------------------------------------------------------
                */

                let operationalHtml = '<div class="detail-grid">';

                Object.entries(operationalDetail).forEach(function ([key, val]) {

                    if (
                        key === 'id' ||
                        key === 'organization_id' ||
                        key === 'created_at' ||
                        key === 'updated_at'
                    ) {
                        return;
                    }

                    if (val !== null && val !== '') {
                        const label = toTitleCase(key);
                        const displayVal = (typeof val === 'string' && val.includes('_'))
                            ? toTitleCase(val)
                            : val;

                        operationalHtml += `
                            <div class="detail-item">
                                <span class="text-muted">${escapeHtml(label)}:</span>
                                <strong>${escapeHtml(String(displayVal))}</strong>
                            </div>
                        `;
                    }
                });

                operationalHtml += '</div>';

                document.getElementById('entityOperationalDetails').innerHTML =
                    operationalHtml === '<div class="detail-grid"></div>' ? '-' : operationalHtml;

                /*
                |--------------------------------------------------------------------------
                | Funders
                |--------------------------------------------------------------------------
                */

                let fundersHtml = '';

                if (funders.length) {

                    funders.forEach(function (funder) {

                        const name =
                            funder.organization_name ||
                            funder.name ||
                            funder.funder_name ||
                            '-';

                        fundersHtml += `
                            <div class="mb-2">
                                ${escapeHtml(String(name))}
                            </div>
                        `;
                    });

                } else {
                    fundersHtml = '-';
                }

                document.getElementById('entityFunders').innerHTML =
                    fundersHtml;

                /*
                |--------------------------------------------------------------------------
                | Profile Completion
                |--------------------------------------------------------------------------
                */

                const profileComplete =
                    Object.keys(profile).length > 0 &&
                    Object.keys(address).length > 0 &&
                    Object.keys(operationalDetail).length > 0;

                document.getElementById('entityCompletion').innerHTML =
                    profileComplete
                        ? '<span class="badge bg-success-subtle text-success">Complete</span>'
                        : '<span class="badge bg-warning-subtle text-warning">Incomplete</span>';
            });
        });
    });
</script>

<div class="modal fade" id="entityModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header border-0" style="border-bottom:1px solid rgb(0 0 0 / 10%) !important;">
                <div class="d-flex align-items-center gap-3">
                    <div class="FD-text"><h2 class="gradient-text mb-0" id="entityShort">-</h2></div>
                    <div>
                        <h3 class="mb-0 modal-heading" id="entityName">-</h3>
                        <small class="text-muted" id="entityType">Entity Details</small>
                    </div>
                </div>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <div class="row g-4">

                    <!-- LEFT -->
                    <div class="col-lg-8">

                        <h5 class="mb-3">Organization Information</h5>
                        <div class="row row-cols-2 g-3 mb-4">
                            <div class="app-detail-col">
                                <p class="text-muted mb-0 small">Organization Name</p>
                                <div class="detail-title" id="entityOrganizationName">-</div>
                            </div>
                            <div class="app-detail-col">
                                <p class="text-muted mb-0 small">Work Email</p>
                                <div class="detail-title" id="entityEmail">-</div>
                            </div>
                            <div class="app-detail-col">
                                <p class="text-muted mb-0 small">Type</p>
                                <div class="detail-title" id="entityRole">-</div>
                            </div>
                            <div class="app-detail-col">
                                <p class="text-muted mb-0 small">Referral Source</p>
                                <div class="detail-title" id="entityReferralSource">-</div>
                            </div>
                            <div class="app-detail-col">
                                <p class="text-muted mb-0 small">Profile Status</p>
                                <div class="detail-title" id="entityProfileStatus">-</div>
                            </div>
                            <div class="app-detail-col">
                                <p class="text-muted mb-0 small">Address Status</p>
                                <div class="detail-title" id="entityAddressStatus">-</div>
                            </div>
                        </div>

                        <h5 class="mb-2">Address</h5>
                        <div class="snapshot-box mb-4">
                            <div id="entityAddress" style="font-size:14px;">-</div>
                        </div>

                        <h5 class="mb-2">Operational Details</h5>
                        <div class="snapshot-box">
                            <div id="entityOperationalDetails" style="font-size:14px;">-</div>
                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-4">

                        <h5 class="mb-3">Entity Information</h5>

                        <div class="app-detail-col mb-2">
                            <p class="text-muted mb-0 small">Entity ID</p>
                            <div class="detail-title" id="entityId">-</div>
                        </div>
                        <div class="app-detail-col mb-2">
                            <p class="text-muted mb-0 small">Type</p>
                            <div class="detail-title" id="entityTypeValue">-</div>
                        </div>
                        <div class="app-detail-col mb-2">
                            <p class="text-muted mb-0 small">Profile</p>
                            <div class="detail-title" id="entityProfile">-</div>
                        </div>
                        <div class="app-detail-col mb-2">
                            <p class="text-muted mb-0 small">Created At</p>
                            <div class="detail-title" id="entityCreatedAt">-</div>
                        </div>
                        <div class="app-detail-col mb-4">
                            <p class="text-muted mb-0 small">Updated At</p>
                            <div class="detail-title" id="entityUpdatedAt">-</div>
                        </div>

                        <div class="snapshot-box mb-3">
                            <p class="fw-semibold mb-2">Funders</p>
                            <div id="entityFunders" style="font-size:14px;">-</div>
                        </div>

                        <div class="snapshot-box">
                            <p class="fw-semibold mb-2">Profile Completion</p>
                            <div id="entityCompletion">-</div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection