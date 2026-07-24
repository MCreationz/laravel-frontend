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

           <form method="GET"
      action="{{ route('superadmin.funds.index') }}"
      class="col-12 col-lg-10 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">

    <!-- Search -->
<div class="search-bar input-group flex-nowrap position-relative" style="max-width:273px;">
    <input type="text"
           id="searchInput"
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
        <select name="status"
                class="form-control"
                onchange="this.form.submit()">
            <option value="">All Status</option>
            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>


{{-- 
    <a href="{{ route('client-admin.funds.overview') }}"
       class="btn btn-primary add-btn">
        + Create Fund
    </a> --}}

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

                        <!-- Fund Name -->
                     <td>
    <div class="d-flex align-items-center gap-2">

        @if($fund->fund_logo)
            <img src="{{ Storage::url($fund->fund_logo) }}"
                 alt="{{ $fund->fund_name }}"
                 style="width:40px;height:40px;object-fit:cover;border-radius:50%;">
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
    @if($fund->snapshot?->is_npo)
        NPO
    @elseif($fund->snapshot?->is_startup)
        Startup
    @else
        -
    @endif
</td>

                        <!-- Outlay -->
                        <td class="text-center text-nowrap">
                            ₹{{ number_format($fund->outlay ?? 0) }}
                        </td>

                        <!-- Cap -->
                        <td class="text-center text-nowrap">
                            ₹{{ number_format($fund->cap_amount ?? 0) }}
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
                                <a href="{{ route('client-admin.funds.edit', $fund->id) }}"
                                   class="edit-btn">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="16"
                                         height="16"
                                         viewBox="0 0 16 16"
                                         fill="none">
                                        <path d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z"
                                              stroke="#07CCB5"
                                              stroke-width="1.2"/>
                                    </svg>

                                </a>

                                <!-- Delete -->
                                <form action="{{ route('client-admin.funds.delete', $fund->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this fund?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="trash-btn">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="13"
                                             height="15"
                                             viewBox="0 0 13 15"
                                             fill="none">
                                            <path d="M1.3 3L2 12.2C2.1 13 2.7 13.6 3.5 13.6H8.7C9.5 13.6 10.1 13 10.2 12.2L10.9 3"
                                                  stroke="#E74C3C"
                                                  stroke-width="1.2"/>
                                            <path d="M0.6 3.1C4 2.5 8.2 2.5 11.6 3.1"
                                                  stroke="#E74C3C"
                                                  stroke-width="1.2"/>
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
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchInput');

    let debounceTimer;

    searchInput.addEventListener('input', function () {

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