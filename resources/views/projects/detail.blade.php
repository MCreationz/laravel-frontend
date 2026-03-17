@extends('layouts.dashboard')

@section('content')
    <div class="project-detail p-3 rounded-3">
        <div class="project-detail-banner mb-3">
            <div class="card">
                <div class="bg-image">
                    <img src="/img/project-banner.png" class="rounded-2" width="100%" height="127px">
                </div>
                <div class="single-project-details mb-3 px-3 px-lg-4">
                    <div class="row justify-content-between align-items-end row-gap-3">
                        <div class="col-12 col-md-4 d-flex flex-wrap align-items-end">
                            <div class="col-sm-auto col-md-12 project-thumbnail mb-md-3">
                                <img src="/img/project-thumbnail.png" class="img-fluid" width="135px" height="128px">
                            </div>
                            <div class="col-md-12 project-text-wrap ms-md-0 ms-2 ms-0">
                                <div class="status ongoing">Ongoing</div>
                                <p class="project-title mt-1 mb-0">Project Name <img src="/img/check.png" width="21.125px"
                                        height="">
                                </p>
                                <div class="id">Application ID</div>
                            </div>
                        </div>
                        <div class="col-md-7 col-xl-5 grow-1">
                            <div class="row justify-content-between">
                                <div class="col px-1">
                                    <div class="boxes rounded-3 px-2 pt-4 pb-2 h-100">
                                        <p class="text mb-0">Total Backers</p>
                                        <p class="number">100</p>
                                    </div>
                                </div>
                                <div class="col px-1">
                                    <div class="boxes rounded-3 px-2 pt-4 pb-2 h-100">
                                        <p class="text mb-0">Investors</p>
                                        <p class="number">05</p>
                                    </div>
                                </div>
                                <div class="col px-1">
                                    <div class="boxes rounded-3 px-2 pt-4 pb-2 h-100">
                                        <p class="text mb-0">Project Status</p>
                                        <p class="number">On Track</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card p-2 p-md-3 p-lg-4">
            <div class="short-desc-title mb-3">
                <h1 class="project-title mb-1">Project Name
                </h1>
                <div class="id">Short Description</div>
            </div>
            <div class="description-wrapper p-2 p-md-3 p-lg-4 rounded-3">
                <h2 class="sub-heading">Description</h2>
                <p class="mb-4">Office ipsum you must be muted. Turn close must vec tiger scope baked time. Wider back-end
                    identify able
                    bells ipsum dunder wheel language. I hear reach if viral conversation canatics loop panel pivot. Be
                    parking eye data do. Unit box supervisor helicopter what's model eat developing. </p>
                <h2 class="sub-heading">CSR Categories</h2>
                <ul class="d-flex row-gap-2 column-gap-5 ps-3 mb-4 flex-wrap">
                    <li>Healthcare</li>
                    <li>Renewable Energy</li>
                    <li>Rural Development</li>
                </ul>
                <h2 class="sub-heading">Project Performance Snapshot</h2>
                <div class="row justify-content-center row-gap-2 mb-4">
                    <div class="col-6 col-md-4 five-col grow-1 px-1">
                        <div class="boxes rounded-3 px-2 pt-4 pb-2 h-100">
                            <p class="text mb-0">Funding Target</p>
                            <p class="number">₹2.5 Cr</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 five-col grow-1 px-1">
                        <div class="boxes rounded-3 px-2 pt-4 pb-2 h-100">
                            <p class="text mb-0">Funds Committed</p>
                            <p class="number">₹1.6 Cr</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 five-col grow-1 px-1">
                        <div class="boxes rounded-3 px-2 pt-4 pb-2 h-100">
                            <p class="text mb-0">Funding Gap</p>
                            <p class="number">₹90 L</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 five-col grow-1 px-1">
                        <div class="boxes rounded-3 px-2 pt-4 pb-2 h-100">
                            <p class="text mb-0">Interested Funders</p>
                            <p class="number">12 Corporates</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 five-col grow-1 px-1">
                        <div class="boxes rounded-3 px-2 pt-4 pb-2 h-100">
                            <p class="text mb-0">Project Status</p>
                            <p class="number">On Track</p>
                        </div>
                    </div>
                </div>
                <h2 class="sub-heading mb-2">Monitoring & Reporting</h2>
                <p class="mb-3">Transparency You Can Trust</p>
                <div class="row justify-content-center row-gap-2">
                    <div class="col-6 col-md-4 five-col grow-1 px-1">
                        <div class="boxes rounded-3 px-3 pt-4 pb-3 h-100">
                            <p class="large-text pt-1">Real-time progress updates</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 five-col grow-1 px-1">
                        <div class="boxes rounded-3 px-3 pt-4 pb-3 h-100">
                            <p class="large-text pt-1">Periodic impact reports</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 five-col grow-1 px-1">
                        <div class="boxes rounded-3 px-3 pt-4 pb-3 h-100">
                            <p class="large-text pt-1">Financial utilization tracking</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 five-col grow-1 px-1">
                        <div class="boxes rounded-3 px-3 pt-4 pb-3 h-100">
                            <p class="large-text pt-1">Periodic impact reports</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 five-col grow-1 px-1">
                        <div class="boxes rounded-3 px-3 pt-4 pb-3 h-100">
                            <p class="large-text pt-1">Photo & field verification</p>
                        </div>
                    </div>
                </div>
                <div
                    class="d-flex justify-content-center justify-content-md-end gap-2 mt-4 pt-md-2 steps-btn flex-wrap">
                    <div class="btn-wrap">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
