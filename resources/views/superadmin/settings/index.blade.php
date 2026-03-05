@extends('superadmin.layouts.app')

@section('title', 'Settings')
@section('page-title', 'Settings')

@section('content')
<div class="container-fluid">

    <div class="row g-4">

        <!-- General Settings -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-gear me-2"></i> General
                    </h5>
                    <p class="text-muted mb-3">
                        Application-wide configurations and defaults.
                    </p>
                    <button class="btn btn-sm btn-outline-primary" disabled>
                        Manage
                    </button>
                </div>
            </div>
        </div>

        <!-- User & Roles -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-people me-2"></i> Users & Roles
                    </h5>
                    <p class="text-muted mb-3">
                        Role mappings, permissions, and access control.
                    </p>
                    <button class="btn btn-sm btn-outline-primary" disabled>
                        Manage
                    </button>
                </div>
            </div>
        </div>

        <!-- Funding Configuration -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-cash-coin me-2"></i> Funding
                    </h5>
                    <p class="text-muted mb-3">
                        Funding categories, limits, and thresholds.
                    </p>
                    <button class="btn btn-sm btn-outline-primary" disabled>
                        Manage
                    </button>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
