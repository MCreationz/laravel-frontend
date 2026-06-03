@extends('layouts.dashboard')

@section('page_title', '')

@section('header_extra')
    <span class="header-org-chip">Non - Profit Organisation</span>
@endsection

@section('content')


    <div class="card-box bg-white rounded">

        <!-- Header -->
        <div class="top-search-wrap p-3 mb-2">
            <div class="row justify-content-between align-items-center row-gap-2">

                <div class="col-auto">
                    <div class="mb-0 fw-bold table-heading">
                        Applicants
                    </div>

                    <p class="text-muted mb-0">
                       5 Applicants Found
                    </p>
                </div>

                <form method="GET" action="http://127.0.0.1:8000/client-admin/funds"
                    class="col-12 col-lg-10 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">

                    <!-- Search -->
                    <div class="search-bar input-group flex-nowrap position-relative" style="max-width:273px;">
                        <input type="text" id="searchInput" name="search" class="form-control search-input w-100"
                            placeholder="Search Fund" value="">
                    </div>

                    <!-- Type -->
                    <div style="max-width:140px;">
                        <select name="fund_type" class="form-control" onchange="this.form.submit()">
                            <option value="">All Types</option>
                            <option value="npo">
                                NPO
                            </option>
                            <option value="startup">
                                Startup
                            </option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div style="max-width:126px;">
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="">All Status</option>
                            <option value="draft">Draft</option>
                            <option value="active">Active</option>
                            <option value="closed">Closed</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">

            <table class="table align-middle">

                <thead class="table-light">
                    <tr>
                        <th class="first-col">Organisation</th>
                        <th class="text-center text-nowrap">Type</th>
                        <th class="text-center text-nowrap">Contact</th>
                        <th class="text-center text-nowrap">PAN</th>
                        <th class="text-center">Vintage</th>

                        <th class="text-center">Turnover</th>
                        <th class="text-center">Applications</th>
                        <th class="text-center">Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="dashboard-v2-name-cell">
                                    <span class="hc-badge">
                                        HC
                                    </span>
                                    <span>Empowering Minds Initiative</span>
                                </div>

                            </div>
                        </td>
                        <!-- Client -->
                        <td class="text-center text-nowrap">
                            CVS Foundation
                        </td>
                        <!-- Type -->
                        <td class="text-center text-nowrap">
                            Ramesh Gupta
                            <br> +91 441549878
                        </td>
                        <!-- Outlay -->
                        <td class="text-center text-nowrap">
                            545452
                        </td>
                        <!-- Cap -->
                        <td class="text-center text-nowrap">
                            1 yr
                        </td>
                        <!-- Open Date -->
                        <td class="text-center">
                            ₹2.5 Cr
                        </td>
                        <!-- Applications -->
                        <td class="text-center">
                            2
                        </td>
                        <!-- Status -->
                        <td class="text-center">
                            <span class="badge bg-success-subtle text-success">
                                Verified
                            </span>
                        </td>
                        <!-- Actions -->
                        <td class="action-btn">
                            <div class="btn-group gap-1">
                                <!-- Edit -->
                                <a href="http://127.0.0.1:8000/client-admin/funds/edit/1" class="edit-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z"
                                            stroke="#07CCB5" stroke-width="1.2"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                                        <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="dashboard-v2-name-cell">
                                    <span class="hc-badge">
                                        HC
                                    </span>
                                    <span>Empowering Minds Initiative</span>
                                </div>

                            </div>
                        </td>
                        <!-- Client -->
                        <td class="text-center text-nowrap">
                            CVS Foundation
                        </td>
                        <!-- Type -->
                        <td class="text-center text-nowrap">
                            Ramesh Gupta
                            <br> +91 441549878
                        </td>
                        <!-- Outlay -->
                        <td class="text-center text-nowrap">
                            545452
                        </td>
                        <!-- Cap -->
                        <td class="text-center text-nowrap">
                            1 yr
                        </td>
                        <!-- Open Date -->
                        <td class="text-center">
                            ₹2.5 Cr
                        </td>
                        <!-- Applications -->
                        <td class="text-center">
                            2
                        </td>
                        <!-- Status -->
                        <td class="text-center">
                            <span class="badge bg-primary-subtle">
                                Pending
                            </span>
                        </td>
                        <!-- Actions -->
                        <td class="action-btn">
                            <div class="btn-group gap-1">
                                <!-- Edit -->
                                <a href="http://127.0.0.1:8000/client-admin/funds/edit/1" class="edit-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z"
                                            stroke="#07CCB5" stroke-width="1.2"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
