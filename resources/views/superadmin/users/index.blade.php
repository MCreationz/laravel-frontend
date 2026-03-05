@extends('superadmin.layouts.app')

@section('title', 'Users')
@section('page-title', 'Users')

@section('content')
    <div class="container-fluid">

        <!-- Header actions -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Users List</h5>
            <a href="{{ route('superadmin.users.create') }}" class="btn btn-primary">
                Add User
            </a>
        </div>

        <!-- Flash message -->

        <!-- Users table -->
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0 align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                                                <th>Comapany</th>

                                <th>Role</th>
                                <th>Status</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $index => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $index }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->company->name ?? 'N/A' }}</td>

                                    <!-- Role -->
                                    <td>
                                        @if ($user->role)
                                            <span class="badge bg-danger text-light">
                                                {{ ucwords(str_replace('_', ' ', $user->role->name)) }}
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                No Role
                                            </span>
                                        @endif
                                    </td>


                                    <!-- Status -->
                                    <td>
                                        @if ($user->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td>
                                        <a href="{{ route('superadmin.users.edit', $user->id) }}"
                                            class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form method="POST" action="{{ route('superadmin.users.destroy', $user->id) }}"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        No users found.
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
            {{ $users->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
