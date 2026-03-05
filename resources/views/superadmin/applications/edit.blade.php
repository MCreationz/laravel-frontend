@extends('superadmin.layouts.app')

@section('title', 'Approve Application')
@section('page-title', 'Approve Application')

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('superadmin.applications.update', $application->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Read-only fields -->
                <div class="mb-3">
                    <label class="form-label">Application Title</label>
                    <input type="text" class="form-control" value="{{ $application->title }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Submitted By</label>
                    <input type="text" class="form-control" value="{{ $application->user->name }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Company</label>
                    <input type="text" class="form-control" value="{{ $application->company->name ?? '-' }}" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Funding Category</label>
                    <input type="text" class="form-control" value="{{ $application->fundingCategory->name }}" readonly>
                </div>

                <!-- Status selection -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="draft" {{ $application->status == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="submitted" {{ $application->status == 'submitted' ? 'selected' : '' }}>Submitted</option>
                        <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update Status</button>
                <a href="{{ route('superadmin.applications.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

</div>
@endsection
