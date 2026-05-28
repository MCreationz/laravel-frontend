@extends('layouts.dashboard')

@section('page_title', '')

@section('header_extra')
    <span class="header-org-chip">Non - Profit Organisation</span>
@endsection

@section('content')
    <div class="dashboard-v2">
        <div class="dashboard-v2-table-card my-apps-card">
            <div class="dashboard-v2-table-head">
                <h3 class="mb-0">My Applications</h3>
                <div class="dashboard-v2-filters">
                    <div class="select-wrapper dashboard-v2-select small">
                        <div class="custom-select form-control">Type</div>
                        <input type="hidden" class="hidden-select" value="">
                        <ul class="select-list">
                            <li data-value="all">All</li>
                            <li data-value="npo">NPO</li>
                            <li data-value="startup">Startup</li>
                        </ul>
                    </div>
                    <div class="select-wrapper dashboard-v2-select small">
                        <div class="custom-select form-control">Fund</div>
                        <input type="hidden" class="hidden-select" value="">
                        <ul class="select-list">
                            <li data-value="all">All</li>
                            <li data-value="seed">Seed</li>
                            <li data-value="growth">Growth</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table dashboard-v2-table my-apps-table mb-0">
                    <thead>
                        <tr>
                            <th>Fund</th>
                            <th>Funder</th>
                            <th>Applied on</th>
                            <th>Current Stage</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $statusList = ['Under Review', 'Waitlist', 'Draft', 'Rejected', 'Shortlisted', 'Submitted'];
                        @endphp
                        @for ($i = 0; $i < 8; $i++)
                            @php
                                $status = $statusList[$i % count($statusList)];
                            @endphp
                            <tr>
                                <td>
                                    <div class="dashboard-v2-name-cell">
                                        <span class="hc-badge">HC</span>
                                        <span>Empowering Minds Initiative</span>
                                    </div>
                                </td>
                                <td>VSM Foundation</td>
                                <td>{{ now()->subDays($i + 5)->format('d/m/Y') }}</td>
                                <td>Application Evaluation</td>
                                <td>
                                    <span class="application-status-chip {{ \Illuminate\Support\Str::slug($status, '-') }}">{{ $status }}</span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('projects.details') }}" class="btn btn-primary dashboard-v2-view-btn">View</a>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection