@extends('superadmin.layouts.app')

@section('title', 'Funding Categories')
@section('page-title', 'Funding Categories')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Funding Categories</h5>
        <a href="{{ route('superadmin.funding-categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Category
        </a>
    </div>


    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Max Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $index => $category)
                        <tr>
                            <td>{{ $categories->firstItem() + $index }}</td>
                            <td>{{ ucwords(str_replace('_', ' ', $category->name)) }}</td>
                            <td>{{ number_format($category->max_amount, 2) }}</td>
                            <td>
                                <a href="{{ route('superadmin.funding-categories.edit', $category->id) }}"
                                   class="btn btn-sm btn-warning" title="Edit">
                                   <i class="bi bi-pencil-square"></i>
                                </a>

                                <form method="POST"
                                      action="{{ route('superadmin.funding-categories.destroy', $category->id) }}"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this category?')"
                                            title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">No funding categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
