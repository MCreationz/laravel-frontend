@extends('superadmin.layouts.app')

@section('title', 'Sectors')
@section('page-title', 'Sectors')

@section('content')

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Sectors List</h5>
        <a href="{{ route('superadmin.sectors.create') }}" class="btn btn-primary btn-sm">
            + Add Sector
        </a>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($sectors as $sector)
                    <tr>
                        <td>{{ $sector->id }}</td>
                        <td>{{ $sector->name }}</td>
                        <td>
                            <span class="badge {{ $sector->status ? 'bg-success' : 'bg-secondary' }}">
                                {{ $sector->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('superadmin.sectors.edit', $sector->id) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('superadmin.sectors.destroy', $sector->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            No sectors found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($sectors->hasPages())
        <div class="card-footer">
            {{ $sectors->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

@endsection
