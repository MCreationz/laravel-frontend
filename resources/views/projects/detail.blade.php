@extends('layouts.dashboard')

@section('page_title', 'Project Details')
@section('header_back_url', route('dashboard'))

@section('content')

<div class="main">
    <div class="card p-3 border-0 rounded-3">
        <div class="project-detail-wrap">

            {{-- Fund Banner --}}
            <div class="top-profile-bannner">
                @if($fund->fund_banner)
                <img
                    src="{{ Storage::url($fund->fund_banner) }}"
                    alt="{{ $fund->fund_name ?? 'Fund' }} Banner"
                    class="img-fluid w-100 h-100 object-fit-cover">
                @endif
            </div>

            <div class="project-detail-inner px-2 px-md-3 pb-2 pb-md-3">

                {{-- Fund Header --}}
                <div class="project-content">

                    <div class="profile-banner">
                        @if($fund->fund_logo)
                        <img
                            src="{{ Storage::url($fund->fund_logo) }}"
                            alt="{{ $fund->fund_name ?? 'Fund' }} Logo"
                            class="img-fluid w-100 h-100 object-fit-cover">
                        @else
                        <h1 class="gradient-text mb-0">
                            {{ strtoupper(substr($fund->fund_name ?? 'F', 0, 2)) }}
                        </h1>
                        @endif
                    </div>

                    <h2 class="project-title mt-3 mb-1">
                        {{ $fund->fund_name ?? '-' }}
                    </h2>

                    <p>
                        Fund Owner: {{ $fund->fund_owner ?? '-' }}
                    </p>

                </div>

                <div class="project-description">

                    {{-- About Fund --}}
                    {{-- About Fund --}}
                    <h3 class="sub-heading">About Fund</h3>

                    @if($fund->about_fund)
                    <div class="about-fund-content">
                        {!! $fund->about_fund !!}
                    </div>
                    @else
                    <p>-</p>
                    @endif

                    {{-- Fund Scope --}}
                    <h3 class="sub-heading mt-4">Fund Scope</h3>

                    <p>
                        @if($fund->fund_scope === 'outside')
                        Outside
                        @elseif($fund->fund_scope === 'in_house')
                        In house
                        @else
                        -
                        @endif
                    </p>


                    {{-- Eligibility --}}
                    <h3 class="sub-heading mt-4">Eligibility</h3>

                    @if($fund->snapshot?->eligibility_instruction)
                    <div class="eligibility-content">
                        {!! $fund->snapshot->eligibility_instruction !!}
                    </div>
                    @else
                    <p>-</p>
                    @endif

                    <ul class="d-inline-flex column-gap-5 flex-wrap">

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

                        @if(
                        ! $fund->snapshot?->is_npo &&
                        ! $fund->snapshot?->is_startup &&
                        ! $fund->snapshot?->eligible_states
                        )
                        <li>-</li>
                        @endif

                    </ul>


                    {{-- Funding Domain --}}
                    <h3 class="sub-heading mt-4">Funding Domain</h3>

                    <ul class="d-inline-flex column-gap-5 flex-wrap">

                        @forelse($fund->themes as $theme)

                        @if($theme->theme_name)
                        <li>
                            {{ $theme->theme_name }}

                            @if($theme->sub_theme_name)
                            - {{ $theme->sub_theme_name }}
                            @endif
                        </li>
                        @endif

                        @empty

                        <li>-</li>

                        @endforelse

                    </ul>


                    {{-- Funds Snapshot --}}
                    <h3 class="sub-heading mt-4">Funds Snapshot</h3>

                    <div class="d-flex flex-wrap gap-2 gray-box-outer">

                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Fund Outlay</div>
                                <h4 class="mb-0">
                                    @if($fund->snapshot?->fund_outlay !== null)
                                    ₹{{ number_format($fund->snapshot->fund_outlay) }}
                                    @else
                                    -
                                    @endif
                                </h4>
                            </div>
                        </div>

                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Fund Type</div>
                                <h4 class="mb-0">
                                    {{ $fund->snapshot?->fund_type ?: '-' }}
                                </h4>
                            </div>
                        </div>

                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Single Entity Cap</div>
                                <h4 class="mb-0">
                                    @if($fund->snapshot?->single_entity_cap !== null)
                                    ₹{{ number_format($fund->snapshot->single_entity_cap) }}
                                    @else
                                    -
                                    @endif
                                </h4>
                            </div>
                        </div>

                    </div>


                    {{-- Project Details --}}
                    @if($fund->fund_scope !== 'outside')

                    <h3 class="sub-heading mt-4">Project Details</h3>

                    <div class="d-flex flex-wrap gap-2 gray-box-outer">

                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Maximum Project Duration</div>
                                <h4 class="mb-0">
                                    @if($fund->maximum_project_duration)
                                    {{ $fund->maximum_project_duration }} Months
                                    @else
                                    -
                                    @endif
                                </h4>
                            </div>
                        </div>

                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Project Start</div>
                                <h4 class="mb-0">
                                    @if($fund->project_start)
                                    {{ $fund->project_start->format('d/m/Y') }}
                                    @else
                                    -
                                    @endif
                                </h4>
                            </div>
                        </div>

                        <div class="col col-12">
                            <div class="gray-box">
                                <div>Project End</div>
                                <h4 class="mb-0">
                                    @if($fund->project_end)
                                    {{ $fund->project_end->format('d/m/Y') }}
                                    @else
                                    -
                                    @endif
                                </h4>
                            </div>
                        </div>

                    </div>

                    @endif

                    {{-- Application Details --}}
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


                    {{-- Application --}}
                    @php
                    $hasApplied = auth('organization')->check()
                    && \App\Models\FundApplication::where('fund_id', $fund->id)
                    ->where('organization_id', auth('organization')->user()->id)
                    ->exists();
                    @endphp

                    <div class="d-flex justify-content-center justify-content-md-end gap-2 flex-wrap">

                        <div class="btn-wrap">
                            <button type="button" class="btn btn-secondary">
                                Download Funding Guidelines
                            </button>
                        </div>

                        <div class="btn-wrap">

                            @if($fund->fund_scope === 'outside' && $fund->redirection_link)

                            <a
                                href="{{ $fund->redirection_link }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="btn btn-primary">
                                Apply Now
                            </a>

                            @else

                            <a
                                href="{{ route('projects.apply.questions', $fund) }}"
                                class="btn btn-primary">
                                {{ $hasApplied ? 'Apply Again' : 'Apply Now' }}
                            </a>

                            @endif

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>



@endsection