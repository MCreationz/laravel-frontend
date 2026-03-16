@extends('layouts.dashboard')

@section('content')
    <div class="project-status-sec">
        <div class="row">
            <div class="col-md-4 ongoing">
                <div class="card dashboard-card">
                    <div class="card-inner d-flex justify-content-between align-items-start">
                        <!-- Left Content -->
                        <div class="pt-5">
                            <div class="number-wrap d-flex align-items-end gap-2">
                                <h2 class="mb-0">14</h2>
                                <span class="badge ms-1">+11.01% <img src="img/grow.png" alt="grow"
                                        width="11.83607292175293px" height="7.575087070465088px"></span>
                            </div>
                            <p class="mb-0 mt-2 title">Ongoing Projects</p>
                            <p class="text">2 more than last month</p>
                        </div>
                        <!-- Circular Progress -->
                        <div class="progress-circle">
                            <span>15%</span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 completed">
                <div class="card dashboard-card">
                    <div class="card-inner d-flex justify-content-between align-items-start">
                        <div class="pt-5">
                            <div class="number-wrap d-flex align-items-end gap-2">
                                <h2 class="mb-0">08</h2>
                                <span class="badge ms-1">+11.01% <img src="img/grow.png" alt="grow"
                                        width="11.83607292175293px" height="7.575087070465088px"></span>
                            </div>
                            <p class="mb-0 mt-2 title">Completed Projects</p>
                            <p class="text">2 more than last month</p>
                        </div>
                        <div class="progress-circle">
                            <span>15%</span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 rejected">
                <div class="card dashboard-card">
                    <div class="card-inner d-flex justify-content-between align-items-start">
                        <div class="pt-5">
                            <div class="number-wrap d-flex align-items-end gap-2">
                                <h2 class="mb-0">02</h2>
                                <span class="badge ms-1">-11.01% <img src="img/reject.png" alt="grow"
                                        width="11.83607292175293px" height="7.575087070465088px"></span>
                            </div>
                            <p class="mb-0 mt-2 title">Rejected Projects</p>
                            <p class="text">2 more than last month</p>
                        </div>
                        <div class="progress-circle">
                            <span>15%</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                Logout
            </button>
        </form>
    </div>

    <div class="card">
        <div class="card-body">

            <h5>
                Welcome {{ auth('organization')->user()->organization_name }}
            </h5>

            <p class="mb-0">
                This is your organization dashboard.
            </p>

        </div>
    @endsection
