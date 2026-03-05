@extends('superadmin.layouts.app')

@section('title', 'Add Funding Category')
@section('page-title', 'Add Funding Category')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm p-4">

        <form method="POST" action="{{ route('superadmin.funding-categories.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="max_amount" class="form-label">Max Amount</label>
                <input type="number" name="max_amount" id="max_amount" class="form-control" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle me-1"></i> Save
            </button>
            <a href="{{ route('superadmin.funding-categories.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </form>

    </div>
</div>
@endsection
