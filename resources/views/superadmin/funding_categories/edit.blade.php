@extends('superadmin.layouts.app')

@section('title', 'Edit Funding Category')
@section('page-title', 'Edit Funding Category')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm p-4">

        <form method="POST" action="{{ route('superadmin.funding-categories.update', $fundingCategory->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control"
                       value="{{ $fundingCategory->name }}" required>
            </div>

            <div class="mb-3">
                <label for="max_amount" class="form-label">Max Amount</label>
                <input type="number" name="max_amount" id="max_amount" class="form-control"
                       value="{{ $fundingCategory->max_amount }}" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle me-1"></i> Update
            </button>
            <a href="{{ route('superadmin.funding-categories.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </form>

    </div>
</div>
@endsection
