@extends('superadmin.layouts.app')

@section('title', 'Companies')
@section('page-title', 'Companies')

@section('content')
    <div class="container-fluid">

        <!-- Header actions -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Companies List</h5>
            <a href="{{ route('superadmin.companies.create') }}" class="btn btn-primary">
                Add Company
            </a>
        </div>



        <!-- Companies table -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0 align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">#</th>
                                <th>Name</th>
                                <th>Sector</th>
                                <th>PAN</th>
                                <th>GST</th>
                                <th>Status</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $index => $company)
                                <tr>
                                    <td>{{ $companies->firstItem() + $index }}</td>
                                    <td>{{ $company->name }}</td>

                                    <!-- Sector -->
                                    <td>
                                        @if ($company->sector)
                                            <span class="badge bg-info text-dark">
                                                {{ ucwords(str_replace('_', ' ', $company->sector->name)) }}
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">No Sector</span>
                                        @endif
                                    </td>

                                    <!-- PAN & GST -->
                                    <td>{{ $company->pan_number }}</td>
                                    <td>{{ $company->gst_number ?? '-' }}</td>

                                    <!-- Status -->
                                    <td>
                                        @if ($company->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td>
                                        <!-- Edit button -->
                                        <a href="{{ route('superadmin.companies.edit', $company->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Assign Admin button -->
                                        <a href="{{ route('superadmin.companies.assign_admin', $company->id) }}"
                                            class="btn btn-sm btn-info" title="Assign Admin">
                                            <i class="bi bi-person-badge"></i>
                                        </a>

                                        <!-- Delete button -->
                                        <form method="POST"
                                            action="{{ route('superadmin.companies.destroy', $company->id) }}"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this company?')"
                                                title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        No companies found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $companies->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
