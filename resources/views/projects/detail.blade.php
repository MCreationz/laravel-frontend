@extends('layouts.dashboard')

@section('page_title', 'Project Details')
@section('header_back_url', route('dashboard'))

@section('content')

    <div class="main">
        <div class="card p-3 border-0 rounded-3">
            <div class="project-detail-wrap">

                <div class="top-profile-bannner">
                </div>

                <div class="project-detail-inner px-2 px-md-3 pb-2 pb-md-3">

                    <div class="project-content">
                        <div class="profile-banner">
                            <h1 class="gradient-text mb-0">
                                {{ strtoupper(substr($fund->fund_name, 0, 2)) }}
                            </h1>
                        </div>

                        <h2 class="project-title mt-3 mb-1">
                            {{ $fund->fund_name }}
                        </h2>

                        <p>
                            Fund Owner: {{ $fund->fund_owner }}
                        </p>
                    </div>

                    <div class="project-description">

                        <h3 class="sub-heading">About Fund</h3>

                        <p>
                            {{ $fund->about_fund }}
                        </p>

                        <h3 class="sub-heading mt-4">Eligibility</h3>

                        <ul class="d-inline-flex column-gap-5 flex-wrap">

                            @if($fund->snapshot?->eligibility_instruction)
                                <li>{{ $fund->snapshot->eligibility_instruction }}</li>
                            @endif

                            @if($fund->snapshot?->is_npo)
                                <li>NPO Eligible</li>
                            @endif

                            @if($fund->snapshot?->is_startup)
                                <li>Startup Eligible</li>
                            @endif

                            @if($fund->snapshot?->eligible_states)
                                <li>
                                    Eligible States:
                                    {{ $fund->snapshot->eligible_states }}
                                </li>
                            @endif

                        </ul>

                        <h3 class="sub-heading mt-4">Funding Domain</h3>

                        <ul class="d-inline-flex column-gap-5 flex-wrap">

                            @forelse($fund->themes as $theme)

                                <li>
                                    {{ $theme->theme_name }}

                                    @if($theme->sub_theme_name)
                                        - {{ $theme->sub_theme_name }}
                                    @endif
                                </li>

                            @empty

                                <li>No funding domains available</li>

                            @endforelse

                        </ul>

                        <h3 class="sub-heading mt-4">Funds Snapshot</h3>

                        <div class="d-flex flex-wrap gap-2 gray-box-outer">

                            <div class="col col-12">
                                <div class="gray-box">
                                    <div>Fund Outlay</div>
                                    <h4 class="mb-0">
                                        ₹{{ number_format($fund->snapshot?->fund_outlay ?? 0) }}
                                    </h4>
                                </div>
                            </div>

                            <div class="col col-12">
                                <div class="gray-box">
                                    <div>Fund Type</div>
                                    <h4 class="mb-0">
                                        {{ $fund->snapshot?->fund_type ?? '-' }}
                                    </h4>
                                </div>
                            </div>

                            <div class="col col-12">
                                <div class="gray-box">
                                    <div>Single Entity Cap:</div>
                                    <h4 class="mb-0">
                                        ₹{{ number_format($fund->snapshot?->single_entity_cap ?? 0) }}
                                    </h4>
                                </div>
                            </div>

                        </div>

                        <h3 class="sub-heading mt-4">Project Details</h3>

                        <div class="d-flex flex-wrap gap-2 gray-box-outer">

                            <div class="col col-12">
                                <div class="gray-box">
                                    <div>Maximum Project Duration:</div>
                                    <h4 class="mb-0">
                                        {{ $fund->maximum_project_duration }} Months
                                    </h4>
                                </div>
                            </div>

                            <div class="col col-12">
                                <div class="gray-box">
                                    <div>Project Start:</div>
                                    <h4 class="mb-0">
                                        {{ optional($fund->project_start)->format('d/m/Y') }}
                                    </h4>
                                </div>
                            </div>

                            <div class="col col-12">
                                <div class="gray-box">
                                    <div>Project End:</div>
                                    <h4 class="mb-0">
                                        {{ optional($fund->project_end)->format('d/m/Y') }}
                                    </h4>
                                </div>
                            </div>

                        </div>

                        <h3 class="sub-heading mt-4">Application Details</h3>

                        <div class="d-flex flex-wrap gap-2 gray-box-outer">

                            <div class="col col-12">
                                <div class="gray-box">
                                    <div>Total Questions</div>
                                    <h4 class="mb-0">
                                        {{ $fund->questionnaires->count() }}
                                    </h4>
                                </div>
                            </div>

                            <div class="col col-12">
                                <div class="gray-box">
                                    <div>Organization Type</div>
                                    <h4 class="mb-0">
                                        @if($fund->snapshot?->is_npo && $fund->snapshot?->is_startup)
                                            NPO & Startup
                                        @elseif($fund->snapshot?->is_npo)
                                            NPO
                                        @elseif($fund->snapshot?->is_startup)
                                            Startup
                                        @else
                                            Open
                                        @endif
                                    </h4>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-center justify-content-md-end gap-2 flex-wrap">

                            <div class="btn-wrap">
                                <button type="button" class="btn btn-secondary">
                                    Download Funding Guidelines
                                </button>
                            </div>

                            <div class="btn-wrap">
                                <a href="{{ route('projects.apply.questions', $fund) }}" class="btn btn-primary">
                                    Apply Now
                                </a>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>




@endsection


{{-- <div class="main">
    <div class="card p-3 border-0 rounded-3">
        <div class="project-detail-wrap">
            <div class="top-profile-bannner">
            </div>yy
            <div class="project-detail-inner px-2 px-md-3 pb-2 pb-md-3">
                <div class="project-content">
                    <div class="profile-banner">
                        <h1 class="gradient-text mb-0">FD</h1>
                    </div>
                    <h2 class="project-title mt-3 mb-1">Health care Project</h2>
                    <p class="">Fund Owner: mcM Founder</p>
                </div>
                <div class="project-description">
                    <h3 class="sub-heading">About Fund</h3>
                    <p>Office ipsum you must be muted. Turn close must vec tiger scope baked time. Wider back-end
                        identify able bells ipsum dunder wheel language. I hear reach if viral conversation canatics
                        loop panel pivot. Be parking eye data do. Unit box supervisor helicopter what's model eat
                        developing. </p>
                    <h3 class="sub-heading mt-4">Eligibility</h3>
                    <ul class="d-inline-flex column-gap-5 flex-wrap">
                        <li>Must have 3 years of vintage</li>
                        <li>Must have more than ₹5 crore turnover</li>
                        <li>Must be operational in (State)</li>
                    </ul>
                    <h3 class="sub-heading mt-4">Funding Domain</h3>
                    <ul class="d-inline-flex column-gap-5 flex-wrap">
                        <li>Must have 3 years of vintage</li>
                        <li>Must have more than ₹5 crore turnover</li>
                        <li>Must be operational in (State)</li>
                    </ul>
                    <h3 class="sub-heading mt-4">Funds Snapshot</h3>
                    <div class="d-flex flex-wrap gap-2 gray-box-outer">
                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Fund Outlay</div>
                                <h4 class="mb-0">₹2.5 Cr</h4>
                            </div>
                        </div>
                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Fund Type</div>
                                <h4 class="mb-0">Multi-portion</h4>
                            </div>
                        </div>
                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Single Entitiy Cap:</div>
                                <h4 class="mb-0">Upto ₹1 Cr.</h4>
                            </div>
                        </div>
                    </div>
                    <h3 class="sub-heading mt-4">Project Details</h3>
                    <div class="d-flex flex-wrap gap-2 gray-box-outer">
                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Maximum Project Duration:</div>
                                <h4 class="mb-0">1 years</h4>
                            </div>
                        </div>
                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Project Start:</div>
                                <h4 class="mb-0">01/05/2026</h4>
                            </div>
                        </div>
                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Project End:</div>
                                <h4 class="mb-0">31/05/2027</h4>
                            </div>
                        </div>
                    </div>
                    <h3 class="sub-heading mt-4">Application Details</h3>
                    <div class="d-flex flex-wrap gap-2 gray-box-outer">
                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Application Open Date:</div>
                                <h4 class="mb-0">02/03/2026</h4>
                            </div>
                        </div>
                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Application Close Date:</div>
                                <h4 class="mb-0">04/05/2026</h4>
                            </div>
                        </div>
                    </div>
                    <div style="" class="d-flex justify-content-center justify-content-md-end gap-2 flex-wrap">
                        <div class="btn-wrap">
                            <button type="button" class="btn btn-secondary">Download Funding Guidelines</button>
                        </div>
                        <div class="btn-wrap">
                            <button type="submit" class="btn btn-primary">Apply Now </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}