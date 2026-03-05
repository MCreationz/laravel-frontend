@extends('superadmin.layouts.app')

@section('title', 'Add Application')
@section('page-title', 'Add Application')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('superadmin.applications.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Application Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select name="user_id" id="user_id" class="form-select" required>
                        <option value="">Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="company_id" class="form-label">Company</label>
                    <select name="company_id" id="company_id" class="form-select">
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="funding_category_id" class="form-label">Funding Category</label>
                    <select name="funding_category_id" id="funding_category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach($fundingCategories as $category)
                            <option value="{{ $category->id }}" {{ old('funding_category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="submitted" {{ old('status') == 'submitted' ? 'selected' : '' }}>Submitted</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save Application</button>
                <a href="{{ route('superadmin.applications.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

</div>
@endsection
