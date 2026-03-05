@extends('superadmin.layouts.app')

@section('title', 'Applications')
@section('page-title', 'Applications')

@section('content')
    <div class="container-fluid">

        <!-- Header actions -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Applications List</h5>
            <a href="{{ route('superadmin.applications.create') }}" class="btn btn-primary">
                Add Application
            </a>
        </div>



        <!-- Applications table -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0 align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">#</th>
                                <th>Title</th>
                                <th>User</th>
                                <th>Company</th>
                                <th>Funding Category</th>
                                <th>Status</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($applications as $index => $application)
                                <tr>
                                    <td>{{ $applications->firstItem() + $index }}</td>
                                    <td>{{ $application->title }}</td>
                                    <td>{{ $application->user->name ?? '-' }}</td>
                                    <td>{{ $application->company->name ?? '-' }}</td>
                                    <td>{{ $application->fundingCategory->name ?? '-' }}</td>
                                    <td>
                                        @switch($application->status)
                                            @case('submitted')
                                                <span class="badge bg-primary">Submitted</span>
                                            @break

                                            @case('approved')
                                                <span class="badge bg-success">Approved</span>
                                            @break

                                            @case('rejected')
                                                <span class="badge bg-danger">Rejected</span>
                                            @break

                                            @default
                                                <span class="badge bg-secondary">Draft</span>
                                        @endswitch
                                    </td>

                                    <td>
                                        <a href="{{ route('superadmin.applications.edit', $application->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form method="POST"
                                            action="{{ route('superadmin.applications.destroy', $application->id) }}"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this application?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            No applications found.
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
                {{ $applications->links('pagination::bootstrap-5') }}
            </div>

        </div>
    @endsection
