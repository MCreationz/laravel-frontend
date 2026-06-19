@extends('client-admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-v2">
        <div class="dashboard-v2-summary-card mb-3">
            <div class="dashboard-col-wrap d-flex justify-content-between align-items-center flex-wrap gap-2 gap-lg-0">
                <div class="left-content col-12 col-lg-4 col-xl-5 flex-shrink-0">
                    <p class="dashboard-v2-welcome mb-2">Super Admin</p>
                    <h2 class="dashboard-v2-name mb-1">
                        Fundlink Control Centre
                    </h2>
                    <p class="text-white text mb-0">Full platform oversight - clients, applicants, reviewers, and funds</p>
                </div>
                <div
                    class="col-12 col-lg-7 flex-grow-1 flex-wrap flex-lg-nowrap dashboar-cards-wrap d-flex gap-1 justify-content-lg-end row-cols-1 row-cols-sm-2 row-cols-md-4">
                    <div class="col">
                        <div class="dashboard-v2-kpi">
                            <p class="mb-0 value">
                                ₹{{ number_format($fundingAvailable ?? 0) }}
                            </p>
                            <p class="mb-0 label">Funding Available</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dashboard-v2-kpi">
                            <p class="mb-0 value">{{ $totalApplications ?? 0 }}</p>
                            <p class="mb-0 label">Total Applications</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dashboard-v2-kpi">
                            <p class="mb-0 value">{{ $ongoing ?? 0 }}</p>
                            <p class="mb-0 label">Ongoing</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="dashboard-v2-kpi">
                            <p class="mb-0 value">{{ $selected ?? 0 }}</p>
                            <p class="mb-0 label">Selected</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-status d-flex d-flex row-cols-2 row-cols-md-3 flex-wrap row-gap-2">
        <div class="col px-1">
            <div class="single-item">
                <div class="single-box applicants">
                    <div class="number">03</div>
                    <div class="text">verified Applicants <span>of 6 total</span></div>
                </div>
            </div>
        </div>
        <div class="col px-1">
            <div class="single-item">
                <div class="single-box reviewers">
                    <div class="number">04</div>
                    <div class="text">Active Reviewers <span>of 6 total</span></div>
                </div>
            </div>
        </div>
        <div class="col px-1">
            <div class="single-item">
                <div class="single-box funds">
                    <div class="number">03</div>
                    <div class="text">open Funding Calls <span>of 6 total</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="recent-status mt-3">
        <div class="d-flex row-cols-1 row-cols-lg-2 flex-wrap row-gap-2">
            <div class="col px-1">
                <div class="recent-col client bg-white h-100">
                    <div class="top-title-wrap px-2 px-md-3 pt-3 pt-md-4 pb-2">
                        <h3 class="top-title mb-0 font-inter h5 fw-bold">Recent Client Admins</h3>
                    </div>
                    <div class="recent-inner">
                        <div class="single-row d-flex justify-content-between px-2 px-md-3 py-2 py-md-3 align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <div class="px-2 py-1 fw-bold gradient-text bordered">
                                    HC
                                </div>
                                <div class="text-wrap">
                                    <span class="fw-bold">
                                        M3M Foundation
                                    </span>
                                    <p class="text-muted text-small">CSM Foundation • 12/03/2026</p>
                                </div>
                            </div>
                          <div class=""><a href="#" class="btn btn-primary response">Responses</a></div>
                        </div>
                        <div class="single-row d-flex justify-content-between px-2 px-md-3 py-2 py-md-3 align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <div class="px-2 py-1 fw-bold gradient-text bordered">
                                    HC
                                </div>
                                <div class="text-wrap">
                                    <span class="fw-bold">
                                        M3M Foundation
                                    </span>
                                    <p class="text-muted text-small">CSM Foundation • 12/03/2026</p>
                                </div>
                            </div>
                            <div class=""><a href="#" class="btn btn-primary response">Responses</a></div>
                        </div>
                        <div class="single-row d-flex justify-content-between px-2 px-md-3 py-2 py-md-3 align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <div class="px-2 py-1 fw-bold gradient-text bordered">
                                    HC
                                </div>
                                <div class="text-wrap">
                                    <span class="fw-bold">
                                        M3M Foundation
                                    </span>
                                    <p class="text-muted text-small">CSM Foundation • 12/03/2026</p>
                                </div>
                            </div>
                           <div class=""><a href="#" class="btn btn-primary response">Responses</a></div>
                        </div>
                        <div class="single-row d-flex justify-content-between px-2 px-md-3 py-2 py-md-3 align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <div class="px-2 py-1 fw-bold gradient-text bordered">
                                    HC
                                </div>
                                <div class="text-wrap">
                                    <span class="fw-bold">
                                        M3M Foundation
                                    </span>
                                    <p class="text-muted text-small">CSM Foundation • 12/03/2026</p>
                                </div>
                            </div>
                           <div class=""><a href="#" class="btn btn-primary response">Responses</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col px-1">
                <div class="recent-col fund-status bg-white py-3 py-md-4 px-2 px-md-3 h-100">
                    <div class="top-title-wrap">
                        <h3 class="top-title mb-0 font-inter h5 fw-bold">Fund Status Overview</h3>
                    </div>

                    <div class="recent-inner">
                        <div class="status-progress-wrap">
                            <!-- Active -->
                            <div class="status-row">
                                <div class="status-header">
                                    <span><strong>Active</strong></span>
                                    <span>03</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-active" style="width: 55%"></div>
                                </div>
                            </div>

                            <!-- Closed -->
                            <div class="status-row">
                                <div class="status-header">
                                    <span><strong>Closed</strong></span>
                                    <span>02</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-closed" style="width: 25%"></div>
                                </div>
                            </div>

                            <!-- Suspended -->
                            <div class="status-row">
                                <div class="status-header">
                                    <span><strong>Suspended</strong></span>
                                    <span>06</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-suspended" style="width: 55%"></div>
                                </div>
                            </div>

                            <!-- Draft -->
                            <div class="status-row mb-0">
                                <div class="status-header">
                                    <span><strong>Draft</strong></span>
                                    <span>08</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-draft" style="width: 75%"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection