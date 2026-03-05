@extends('superadmin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Stats cards -->
    <div class="row g-4 mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm text-center border-0">
                <div class="card-body">
                    <i class="bi bi-people fs-2 text-primary"></i>
                    <h6 class="mt-2 text-muted">Users</h6>
                    <h3 class="fw-bold">{{ $totalUsers }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center border-0">
                <div class="card-body">
                    <i class="bi bi-buildings fs-2 text-success"></i>
                    <h6 class="mt-2 text-muted">Companies</h6>
                    <h3 class="fw-bold">{{ $totalCompanies }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center border-0">
                <div class="card-body">
                    <i class="bi bi-diagram-3 fs-2 text-warning"></i>
                    <h6 class="mt-2 text-muted">Sectors</h6>
                    <h3 class="fw-bold">{{ $totalSectors }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center border-0">
                <div class="card-body">
                    <i class="bi bi-file-earmark-text fs-2 text-danger"></i>
                    <h6 class="mt-2 text-muted">Applications</h6>
                    <h3 class="fw-bold">{{ $totalApplications }}</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- Charts -->
    <div class="row g-4">

        <!-- Applications by Status -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-semibold">
                    Applications by Status
                </div>
                <div class="card-body">
                    <canvas id="applicationsStatusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Companies by Sector -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white fw-semibold">
                    Companies by Sector
                </div>
                <div class="card-body">
                    <canvas id="companiesSectorChart"></canvas>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Charts Script -->
<script>
    // Applications Status Chart
    new Chart(document.getElementById('applicationsStatusChart'), {
        type: 'doughnut',
        data: {
            labels: ['Draft', 'Submitted', 'Approved', 'Rejected'],
            datasets: [{
                data: @json($applicationsByStatus),
                backgroundColor: ['#6c757d', '#0d6efd', '#198754', '#dc3545']
            }]
        }
    });

    // Companies by Sector Chart
    new Chart(document.getElementById('companiesSectorChart'), {
        type: 'bar',
        data: {
            labels: @json($sectorNames),
            datasets: [{
                label: 'Companies',
                data: @json($companiesBySector),
                backgroundColor: '#0d6efd'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endsection
