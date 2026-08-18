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
                        <div class="d-flex align-items-center gap-2 fund-name-trigger"
                            style="cursor: pointer;"
                            data-bs-toggle="modal"
                            data-bs-target="#fundModal"
                            data-fund='@json($fund)'>

                            @if ($fund->fund_logo)
                            <img src="{{ Storage::url($fund->fund_logo) }}"
                                alt="{{ $fund->fund_name }}"
                                style="flex: 0 0 40px ;width:40px;height:40px;object-fit:cover;border-radius:50%;">
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
                        ₹{{ number_format($fund->snapshot->fund_outlay ?? 0) }}
                    </td>

                    <!-- Cap -->
                    <td class="text-center text-nowrap">
                        ₹{{ number_format($fund->snapshot->single_entity_cap ?? 0) }}
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
                                class="edit-btn edit-fund" data-fund='@json($fund)'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z"
                                        stroke="#07CCB5" stroke-width="1.2" />
                                </svg>
                            </a>
                            <!-- Delete -->
                            <form action="{{ route('superadmin.funds.delete', $fund->id) }}" method="POST"
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

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const form = document.getElementById('reviewerForm');

        /*
        |--------------------------------------------------------------------------
        | Set normal input
        |--------------------------------------------------------------------------
        */

        function setValue(id, value) {

            const element = document.getElementById(id);

            if (!element) {
                return;
            }

            element.value = value ?? '';
        }


        /*
        |--------------------------------------------------------------------------
        | Set custom select
        |--------------------------------------------------------------------------
        */

        function setCustomSelect(inputId, value) {

            const input = document.getElementById(inputId);

            if (!input) {
                return;
            }

            input.value = value ?? '';

            const wrapper = input.closest('.select-wrapper');

            if (!wrapper) {
                return;
            }

            const display = wrapper.querySelector('.custom-select span');

            if (!display) {
                return;
            }

            const option = wrapper.querySelector(
                `.select-list li[data-value="${CSS.escape(value ?? '')}"]`
            );

            if (option) {

                display.innerText = option.innerText.trim();
                display.classList.remove('text-muted');

            } else {

                display.innerText = 'Select an option';
                display.classList.add('text-muted');

            }
        }


        /*
        |--------------------------------------------------------------------------
        | Edit Fund
        |--------------------------------------------------------------------------
        */

        /*
|--------------------------------------------------------------------------
| Edit Fund
|--------------------------------------------------------------------------
*/

        document.querySelectorAll('.edit-fund').forEach(function(button) {

            button.addEventListener('click', function(e) {

                e.preventDefault();

                let fund = {};

                try {

                    fund = JSON.parse(
                        this.dataset.fund || '{}'
                    );

                    console.log('Fund:', fund);

                } catch (error) {

                    console.error(
                        'Unable to parse fund data:',
                        error
                    );

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | Fund ID
                |--------------------------------------------------------------------------
                */

                setValue(
                    'reviewer_id',
                    fund.id
                );


                /*
                |--------------------------------------------------------------------------
                | Fund Name
                |--------------------------------------------------------------------------
                */

                setValue(
                    'full_name',
                    fund.fund_name
                );


                /*
                |--------------------------------------------------------------------------
                | Open Date
                |--------------------------------------------------------------------------
                */

                setValue(
                    'open_date',
                    formatDate(fund.project_start)
                );


                /*
                |--------------------------------------------------------------------------
                | Close Date
                |--------------------------------------------------------------------------
                */

                setValue(
                    'close_date',
                    formatDate(fund.project_end)
                );


                /*
                |--------------------------------------------------------------------------
                | Fund Outlay
                |--------------------------------------------------------------------------
                */

                setValue(
                    'fund_outlay',
                    fund.snapshot?.fund_outlay
                );


                /*
                |--------------------------------------------------------------------------
                | Entity Cap
                |--------------------------------------------------------------------------
                */

                setValue(
                    'entity_cap',
                    fund.snapshot?.single_entity_cap
                );

                /*
                |--------------------------------------------------------------------------
                | Status
                |--------------------------------------------------------------------------
                */

                setCustomSelect(
                    'status',
                    fund.status
                );


                /*
                |--------------------------------------------------------------------------
                | Fund Type
                |--------------------------------------------------------------------------
                */

                let fundType = '';

                if (fund.snapshot) {

                    if (Number(fund.snapshot.is_npo) === 1) {

                        fundType = 'npo';

                    } else if (Number(fund.snapshot.is_startup) === 1) {

                        fundType = 'startup';

                    }
                }

                setCustomSelect(
                    'fund_type',
                    fundType
                );


                /*
                |--------------------------------------------------------------------------
                | Modal title/code
                |--------------------------------------------------------------------------
                */

                document.getElementById('reviewerModalTitle').innerText =
                    'Edit Fund';

                const codeElement =
                    document.querySelector('#reviewerModal .modal-header p');

                if (codeElement) {

                    codeElement.innerText =
                        fund.fund_code ||
                        `FND-${String(fund.id).padStart(3, '0')}`;

                }


                /*
                |--------------------------------------------------------------------------
                | Form action
                |--------------------------------------------------------------------------
                */

                let updateUrl =
                    "{{ route('superadmin.funds.update', ['id' => '__ID__']) }}";

                updateUrl = updateUrl.replace(
                    '__ID__',
                    fund.id
                );

                form.action = updateUrl;


                console.log('Update URL:', form.action);
                console.log('Editing fund:', fund);

            });

        });
        /*
        |--------------------------------------------------------------------------
        | Format Date
        |--------------------------------------------------------------------------
        */

        function formatDate(date) {

            if (!date) {
                return '';
            }

            /*
             * Handles:
             * 2026-07-08
             * 2026-07-08T00:00:00.000000Z
             */

            return String(date).substring(0, 10);
        }


        /*
        |--------------------------------------------------------------------------
        | Custom Select Click
        |--------------------------------------------------------------------------
        */

        document.querySelectorAll(
            '#reviewerModal .select-wrapper'
        ).forEach(function(wrapper) {

            const select = wrapper.querySelector('.custom-select');
            const list = wrapper.querySelector('.select-list');
            const input = wrapper.querySelector('.hidden-select');

            if (!select || !list || !input) {
                return;
            }


            select.addEventListener('click', function(e) {

                e.preventDefault();
                e.stopPropagation();

                /*
                 * Close other dropdowns
                 */

                document.querySelectorAll(
                    '#reviewerModal .select-list'
                ).forEach(function(otherList) {

                    if (otherList !== list) {
                        otherList.style.display = 'none';
                    }

                });

                list.style.display =
                    list.style.display === 'block' ?
                    'none' :
                    'block';

            });


            /*
             * Select option
             */

            list.querySelectorAll('li').forEach(function(option) {

                option.addEventListener('click', function(e) {

                    e.preventDefault();
                    e.stopPropagation();

                    const value =
                        this.dataset.value;

                    input.value = value;

                    const display =
                        select.querySelector('span');

                    display.innerText =
                        this.innerText.trim();

                    display.classList.remove('text-muted');

                    list.style.display = 'none';

                });

            });

        });


        /*
        |--------------------------------------------------------------------------
        | Close dropdown when clicking outside
        |--------------------------------------------------------------------------
        */

        document.addEventListener('click', function() {

            document.querySelectorAll(
                '#reviewerModal .select-list'
            ).forEach(function(list) {

                list.style.display = 'none';

            });

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

                    <p class="small mb-0" id="fundCode">
                        FND001
                    </p>
                </div>

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>


            <!-- Body -->
            <div class="modal-body p-0">

                <form id="reviewerForm"

                    method="POST">

                    @csrf

                    @method('PUT')


                    <div class="p-4">

                        <!-- Fund ID -->
                        <input type="hidden"
                            name="reviewer_id"
                            id="reviewer_id">


                        <!-- Fund Name -->
                        <div class="row g-3 mb-3">

                            <div class="col-12">

                                <label class="form-label fw-semibold">
                                    Fund Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                    class="form-control py-2"
                                    id="full_name"
                                    name="full_name"
                                    placeholder="Impact Innovation Fund"
                                    required>

                            </div>

                        </div>


                        <!-- Open Date + Close Date -->
                        <div class="row g-3 mb-3">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Open Date
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="date"
                                    class="form-control py-2"
                                    id="open_date"
                                    name="open_date"
                                    required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Close Date
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="date"
                                    class="form-control py-2"
                                    id="close_date"
                                    name="close_date"
                                    required>

                            </div>

                        </div>


                        <!-- Fund Outlay + Entity Cap -->
                        <div class="row g-3 mb-3">

                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Fund Outlay
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="number"
                                    class="form-control py-2"
                                    id="fund_outlay"
                                    name="fund_outlay"
                                    placeholder="₹1 Cr"
                                    min="0"
                                    required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Entity Cap
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="number"
                                    class="form-control py-2"
                                    id="entity_cap"
                                    name="entity_cap"
                                    placeholder="₹1 Cr"
                                    min="0"
                                    required>

                            </div>

                        </div>


                        <!-- Status + Fund Type -->
                        <div class="row g-3">

                            <!-- Status -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Status
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="select-wrapper w-100 position-relative">

                                    <div class="custom-select form-control py-2
                d-flex justify-content-between align-items-center">

                                        <span class="text-muted">
                                            Select an option
                                        </span>

                                    </div>

                                    <input type="hidden"
                                        name="status"
                                        id="status"
                                        required
                                        class="hidden-select">

                                    <ul class="select-list"
                                        style="display: none;">

                                        <li data-value="active">
                                            Active
                                        </li>

                                        <li data-value="suspended">
                                            Suspended
                                        </li>

                                    </ul>

                                </div>

                            </div>


                            <!-- Fund Type -->
                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    Fund Type
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="select-wrapper w-100 position-relative">

                                    <div class="custom-select form-control py-2
                d-flex justify-content-between align-items-center">

                                        <span class="text-muted">
                                            Select an option
                                        </span>

                                    </div>

                                    <input type="hidden"
                                        name="fund_type"
                                        id="fund_type"
                                        required
                                        class="hidden-select">

                                    <ul class="select-list"
                                        style="display: none;">

                                        <li data-value="npo">
                                            NPO
                                        </li>

                                        <li data-value="startup">
                                            Startup
                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- Footer -->
                    <div style="border-radius:0px 0px 8px 8px;"
                        class="modal-footer border-0
                        d-flex justify-content-center
                        justify-content-md-end gap-2
                        steps-btn pe-lg-4 flex-wrap">


                        <button type="button"
                            class="btn simple-btn m-0"
                            data-bs-dismiss="modal">

                            Cancel

                        </button>


                        <button type="submit"
                            id="reviewerSubmitBtn"
                            class="btn gradient-btn m-0">

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
                        <img id="viewFundLogo"
                            src="{{ asset('img/view-fund-logo.png') }}"
                            alt="view fund logo"
                            width="90"
                            height="58"
                            style="object-fit:contain;">
                    </div>

                    <div>

                        <h2 class="modal-title mb-0 h3"
                            id="viewFundName">
                            -
                        </h2>

                        <p class="small mb-0"
                            id="viewFundOwner">
                            -
                        </p>

                    </div>

                </div>

                <div class="d-flex align-items-center gap-2">

                    <a href="#"
                        class="linkdin"
                        id="viewFundLinkedin"
                        target="_blank"
                        style="display:none;">

                        <img src="{{ asset('img/linkdin.png') }}"
                            alt="LinkedIn"
                            width="28"
                            height="28">

                    </a>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>

                </div>

            </div>


            <!-- Body -->
            <div class="modal-body px-1 py-3 px-md-2 py-md-4">


                <!-- New Fund Details -->
                <section class="mb-3">

                    <h3 class="inner-title">
                        New Fund Details
                    </h3>

                    <div class="details-table">

                        <div class="detail-row">

                            <div class="detail-label">
                                Fund Name
                            </div>

                            <div class="detail-value"
                                id="viewFundNameDetail">
                                -
                            </div>

                        </div>


                        <div class="detail-row">

                            <div class="detail-label">
                                Fund Owner
                            </div>

                            <div class="detail-value"
                                id="viewFundOwnerDetail">
                                -
                            </div>

                        </div>


                        <div class="detail-row">

                            <div class="detail-label">
                                Fund Owner Email
                            </div>

                            <div class="detail-value"
                                id="viewFundOwnerEmail">
                                -
                            </div>

                        </div>


                        <div class="detail-row align-items-start">

                            <div class="detail-label pt-2">
                                About Fund
                            </div>

                            <div class="detail-value"
                                id="viewAboutFund">
                                -
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

                        <div class="detail-value"
                            id="viewProjectStart">
                            -
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Application Closes On:
                        </div>

                        <div class="detail-value"
                            id="viewProjectEnd">
                            -
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Maximum Project Duration:
                        </div>

                        <div class="detail-value"
                            id="viewMaximumProjectDuration">
                            -
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

                        <div class="detail-value"
                            id="viewEligibleStates">
                            -
                        </div>

                    </div>


                    <div class="detail-row align-items-start">

                        <div class="detail-label">
                            Eligibility Instruction
                        </div>

                        <div class="detail-value"
                            id="viewEligibilityInstruction">
                            -
                        </div>

                    </div>

                </section>


                <!-- Funds Snapshot -->
                <section class="details-table mb-3">

                    <h3 class="inner-title">
                        Funds Snapshot
                    </h3>


                    <div class="detail-row">

                        <div class="detail-label">
                            Fund Outlay
                        </div>

                        <div class="detail-value"
                            id="viewFundOutlay">
                            -
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Fund Type
                        </div>

                        <div class="detail-value"
                            id="viewFundType">
                            -
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Single Entity Cap
                        </div>

                        <div class="detail-value"
                            id="viewSingleEntityCap">
                            -
                        </div>

                    </div>


                    <div class="detail-row">

                        <div class="detail-label">
                            Status
                        </div>

                        <div class="detail-value"
                            id="viewFundStatus">
                            -
                        </div>

                    </div>

                </section>
                <section class="details-table upload-document mb-3">

                    <h3 class="inner-title">
                        Required Documents
                    </h3>

                    <div id="viewDocumentsContainer">

                        <div class="document-row">
                            <div class="detail-label">
                                -
                            </div>

                            <div class="upload-file">
                            </div>
                        </div>

                    </div>

                </section>


                <!-- Funding Domain -->
                <section class="details-table mb-3">

                    <h3 class="inner-title">
                        Funding Domain
                    </h3>


                    <div id="viewThemesContainer">

                        <div class="detail-row">

                            <div class="detail-label">
                                Theme Name
                            </div>

                            <div class="detail-value"
                                id="viewThemeName">
                                -
                            </div>

                        </div>


                        <div class="detail-row">

                            <div class="detail-label">
                                Sub Theme
                            </div>

                            <div class="detail-value"
                                id="viewSubTheme">
                                -
                            </div>

                        </div>


                        <div class="detail-row">

                            <div class="detail-label">
                                Description
                            </div>

                            <div class="detail-value"
                                id="viewThemeDescription">
                                -
                            </div>

                        </div>

                    </div>

                </section>


                <!-- Questions -->
                <section class="details-table">

                    <h3 class="inner-title">
                        Questions
                    </h3>


                    <div id="viewQuestionsContainer">

                        <div class="detail-row">

                            <div class="detail-label">
                                Question:
                            </div>

                            <div class="detail-value"
                                id="viewQuestion">
                                -
                            </div>

                        </div>


                        <div class="detail-row">

                            <div class="detail-label">
                                Description
                            </div>

                            <div class="detail-value"
                                id="viewQuestionDescription">
                                -
                            </div>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        /*
        |--------------------------------------------------------------------------
        | Helper: Set text safely
        |--------------------------------------------------------------------------
        */

        function setText(id, value) {

            const element = document.getElementById(id);

            if (!element) {
                return;
            }

            element.textContent =
                value !== null &&
                value !== undefined &&
                value !== '' ?
                value :
                '-';
        }


        /*
        |--------------------------------------------------------------------------
        | Helper: Format date
        |--------------------------------------------------------------------------
        */

        function formatDate(date) {

            if (!date) {
                return '-';
            }

            const value = String(date).substring(0, 10);

            if (!value || value === 'null') {
                return '-';
            }

            const parts = value.split('-');

            if (parts.length !== 3) {
                return value;
            }

            return `${parts[2]}/${parts[1]}/${parts[0]}`;
        }


        /*
        |--------------------------------------------------------------------------
        | Helper: Format money
        |--------------------------------------------------------------------------
        */

        function formatMoney(value) {

            if (
                value === null ||
                value === undefined ||
                value === ''
            ) {
                return '-';
            }

            const number = Number(value);

            if (isNaN(number)) {
                return value;
            }

            return '₹ ' + number.toLocaleString('en-IN', {
                maximumFractionDigits: 2
            });
        }


        /*
        |--------------------------------------------------------------------------
        | Helper: Get fund type
        |--------------------------------------------------------------------------
        */

        function getFundType(snapshot) {

            if (!snapshot) {
                return '-';
            }

            if (
                snapshot.is_npo === true ||
                Number(snapshot.is_npo) === 1
            ) {
                return 'NPO';
            }

            if (
                snapshot.is_startup === true ||
                Number(snapshot.is_startup) === 1
            ) {
                return 'Startup';
            }

            /*
             * Fallback in case fund_type itself
             * contains a useful value.
             */

            if (snapshot.fund_type) {
                return snapshot.fund_type;
            }

            return '-';
        }


        /*
        |--------------------------------------------------------------------------
        | Populate Themes
        |--------------------------------------------------------------------------
        */
        function populateDocuments(documents) {

            const container =
                document.getElementById('viewDocumentsContainer');

            if (!container) {
                return;
            }

            container.innerHTML = '';

            if (
                !documents ||
                !Array.isArray(documents) ||
                documents.length === 0
            ) {

                container.innerHTML = `
            <div class="document-row">
                <div class="detail-label">
                    No documents required
                </div>
            </div>
        `;

                return;
            }

            documents.forEach(function(document) {

                const documentName =
                    document.document_name ?? '-';

                const documentType =
                    document.document_type ?? '-';

                const maxSize =
                    document.max_file_size_mb !== null &&
                    document.max_file_size_mb !== undefined ?
                    document.max_file_size_mb + ' MB' :
                    '-';

                const instruction =
                    document.instruction ?? '';

                const required =
                    Number(document.is_required) === 1 ?
                    'Required' :
                    'Optional';


                container.innerHTML += `

            <div class="detail-row">

                <div class="detail-label">
                        ${documentName}

                    <small class="text-muted d-block mt-1">
                        ${required}
                    </small>

                </div>


                <div class="detail-value upload-file">
                        <span>Upload Type:</span>
                        <strong class="text-dark">${documentType}</strong>

                    <div class="small">
                        <span>Max Size:</span>
                       <strong class="text-dark">
                            ${maxSize}
                        </strong>

                    </div>


                    ${
                        instruction
                            ? `
                                <div class="small text-muted mt-1">
                                    ${instruction}
                                </div>
                              `
                            : ''
                    }

                </div>

            </div>

        `;

            });
        }

        function populateThemes(themes) {

            const container =
                document.getElementById('viewThemesContainer');

            if (!container) {
                return;
            }

            container.innerHTML = '';


            if (!themes || !Array.isArray(themes) || themes.length === 0) {

                container.innerHTML = `
                <div class="detail-row">
                    <div class="detail-label">
                        Theme Name
                    </div>

                    <div class="detail-value">
                        -
                    </div>
                </div>
            `;

                return;
            }


            themes.forEach(function(theme, index) {

                /*
                 * Try common possible keys.
                 */

                const themeName =
                    theme.theme_name ??
                    theme.name ??
                    theme.theme ??
                    '-';

                const subTheme =
                    theme.sub_theme ??
                    theme.sub_theme_name ??
                    theme.subtheme ??
                    '-';

                const description =
                    theme.description ??
                    '-';


                container.innerHTML += `

                <div class="detail-row">

                    <div class="detail-label">
                        Theme Name
                    </div>

                    <div class="detail-value">
                        ${themeName}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="detail-label">
                        Sub Theme
                    </div>

                    <div class="detail-value">
                        ${subTheme}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="detail-label">
                        Description
                    </div>

                    <div class="detail-value">
                        ${description}
                    </div>

                </div>

            `;

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Populate Questions
        |--------------------------------------------------------------------------
        */

        function populateQuestions(questionnaires) {

            const container =
                document.getElementById('viewQuestionsContainer');

            if (!container) {
                return;
            }

            container.innerHTML = '';


            if (
                !questionnaires ||
                !Array.isArray(questionnaires) ||
                questionnaires.length === 0
            ) {

                container.innerHTML = `

                <div class="detail-row">

                    <div class="detail-label">
                        Question:
                    </div>

                    <div class="detail-value">
                        -
                    </div>

                </div>

            `;

                return;
            }


            questionnaires.forEach(function(question) {

                const questionText =
                    question.question ??
                    '-';

                const description =
                    question.description ??
                    '-';


                container.innerHTML += `

                <div class="detail-row">

                    <div class="detail-label">
                        Question:
                    </div>

                    <div class="detail-value">
                        ${questionText}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="detail-label">
                        Description
                    </div>

                    <div class="detail-value">
                        ${description}
                    </div>

                </div>

            `;

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Fund Name Click
        |--------------------------------------------------------------------------
        */

        document.querySelectorAll('.fund-name-trigger').forEach(function(trigger) {

            trigger.addEventListener('click', function() {

                let fund = {};

                try {

                    fund = JSON.parse(
                        this.dataset.fund || '{}'
                    );

                    console.log('Viewing fund:', fund);

                } catch (error) {

                    console.error(
                        'Unable to parse fund data:',
                        error
                    );

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | Header
                |--------------------------------------------------------------------------
                */

                setText(
                    'viewFundName',
                    fund.fund_name
                );

                setText(
                    'viewFundOwner',
                    fund.fund_owner
                );


                /*
                |--------------------------------------------------------------------------
                | Logo
                |--------------------------------------------------------------------------
                */

                const logo =
                    document.getElementById('viewFundLogo');

                if (logo) {

                    if (fund.fund_logo) {

                        logo.src =
                            "{{ Storage::url('') }}" +
                            fund.fund_logo;

                    } else {

                        logo.src =
                            "{{ asset('img/view-fund-logo.png') }}";

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | New Fund Details
                |--------------------------------------------------------------------------
                */

                setText(
                    'viewFundNameDetail',
                    fund.fund_name
                );

                setText(
                    'viewFundOwnerDetail',
                    fund.fund_owner
                );

                setText(
                    'viewFundOwnerEmail',
                    fund.fund_owner_email
                );


                /*
                |--------------------------------------------------------------------------
                | About Fund
                |--------------------------------------------------------------------------
                */

                const aboutFund =
                    document.getElementById('viewAboutFund');

                if (aboutFund) {

                    if (fund.about_fund) {

                        /*
                         * about_fund may contain HTML.
                         */

                        aboutFund.innerHTML =
                            fund.about_fund;

                    } else {

                        aboutFund.innerHTML = '-';

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | Fund Timelines
                |--------------------------------------------------------------------------
                */

                setText(
                    'viewProjectStart',
                    formatDate(fund.project_start)
                );

                setText(
                    'viewProjectEnd',
                    formatDate(fund.project_end)
                );


                const maximumDuration =
                    fund.maximum_project_duration ??
                    fund.snapshot?.maximum_project_duration ??
                    '-';

                setText(
                    'viewMaximumProjectDuration',
                    maximumDuration !== '-' ?
                    maximumDuration + ' Months' :
                    '-'
                );


                /*
                |--------------------------------------------------------------------------
                | Eligibility
                |--------------------------------------------------------------------------
                */

                const snapshot =
                    fund.snapshot || {};


                setText(
                    'viewEligibleStates',
                    snapshot.eligible_states
                );


                const eligibilityInstruction =
                    document.getElementById(
                        'viewEligibilityInstruction'
                    );

                if (eligibilityInstruction) {

                    if (snapshot.eligibility_instruction) {

                        /*
                         * This field contains HTML
                         * in your API response.
                         */

                        eligibilityInstruction.innerHTML =
                            snapshot.eligibility_instruction;

                    } else {

                        eligibilityInstruction.innerHTML =
                            '-';

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | Funds Snapshot
                |--------------------------------------------------------------------------
                */

                setText(
                    'viewFundOutlay',
                    formatMoney(snapshot.fund_outlay)
                );


                setText(
                    'viewFundType',
                    getFundType(snapshot)
                );


                setText(
                    'viewSingleEntityCap',
                    formatMoney(snapshot.single_entity_cap)
                );


                setText(
                    'viewFundStatus',
                    fund.status
                );


                /*
                |--------------------------------------------------------------------------
                | Themes
                |--------------------------------------------------------------------------
                */

                populateThemes(
                    fund.themes
                );
                populateDocuments(fund.documents);

                /*
                |--------------------------------------------------------------------------
                | Questions
                |--------------------------------------------------------------------------
                */

                populateQuestions(
                    fund.questionnaires
                );


                /*
                |--------------------------------------------------------------------------
                | LinkedIn
                |--------------------------------------------------------------------------
                */

                const linkedin =
                    document.getElementById(
                        'viewFundLinkedin'
                    );

                if (linkedin) {

                    /*
                     * If you later have a linkedin field,
                     * it can be populated here.
                     */

                    if (fund.linkedin_url) {

                        linkedin.href =
                            fund.linkedin_url;

                        linkedin.style.display =
                            'inline-block';

                    } else {

                        linkedin.style.display =
                            'none';

                    }

                }

            });

        });

    });
</script>
@endsection