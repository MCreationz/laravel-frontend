@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h2>Step 1: Organization Details</h2>
        <p class="text-muted">Provide basic information about your organization.</p>
    </div>

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('onboarding.step1.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Organization Name</label>
                    <input type="text"
                        name="organization_name"
                        class="form-control"
                        placeholder="Enter organization name"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Website</label>
                    <input type="text"
                        name="website"
                        class="form-control"
                        placeholder="https://example.com">
                </div>

                <div class="mb-3">
                    <label class="form-label">Organization Description</label>
                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                        placeholder="Brief description of your organization"></textarea>
                </div>

                <div class="d-flex justify-content-end">

                    <button type="submit" class="btn btn-primary">
                        Next Step
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection