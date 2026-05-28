@extends('layouts.dashboard')

@section('page_title', 'Application Form')
@section('header_back_url', route('dashboard'))

@section('header_extra')
    <div class="header-first-time d-flex align-items-center gap-2">
        <span class="header-first-time-label">First Time User</span>
        <label class="switch mb-0">
            <input type="checkbox" checked>
            <span class="slider"></span>
        </label>
    </div>
    <a href="#" class="icon px-2 px-lg-3 header-refresh" title="Refresh">
        <i class="bi bi-arrow-clockwise"></i>
    </a>
@endsection

@section('content')
    @php
        $organization = auth('organization')->user();
        $orgName = $organization->organization_name ?? 'Organization';
        $sections = [
            [
                'title' => 'Problem Statement & Project Overview',
                'name' => 'problem_statement',
                'limit' => 500,
                'questions' => 'What problem are you solving? Describe your project goals and expected outcomes.',
            ],
            [
                'title' => 'Target Beneficiaries & Outreach Strategy',
                'name' => 'target_beneficiaries',
                'limit' => 500,
                'questions' => 'Who will benefit? How will you reach and engage them?',
            ],
            [
                'title' => 'Action',
                'name' => 'action',
                'limit' => 500,
                'questions' => 'What activities will you implement to achieve your objectives?',
            ],
            [
                'title' => 'Budget',
                'name' => 'budget',
                'limit' => 500,
                'questions' => 'How will funds be allocated across key cost heads?',
            ],
            [
                'title' => 'Change',
                'name' => 'change',
                'limit' => 500,
                'questions' => 'What measurable change do you expect in the community?',
            ],
            [
                'title' => 'Inclusiveness',
                'name' => 'inclusiveness',
                'limit' => 500,
                'questions' => 'How does your project promote equity and inclusion?',
            ],
            [
                'title' => 'Innovation',
                'name' => 'innovation',
                'limit' => 500,
                'questions' => 'What is novel or differentiated about your approach?',
            ],
            [
                'title' => 'Impact',
                'name' => 'impact',
                'limit' => 500,
                'questions' => 'What short-term and long-term impact do you anticipate?',
            ],
            [
                'title' => 'Monitoring, Evaluation & Sustainability',
                'name' => 'monitoring_evaluation',
                'limit' => 500,
                'questions' => 'How will you track progress and ensure sustainability beyond funding?',
            ],
        ];
    @endphp

    <div class="application-form-page">
        <form method="POST" action="#" id="applicationForm">
            @csrf

            <div class="card application-form-card border-0 mb-3">
                <div class="application-hero">
                    <div class="application-hero-banner"></div>
                    <div class="application-hero-body px-3 px-md-4 pb-3">
                        <div class="row align-items-end g-3">
                            <div class="col-auto">
                                <div class="application-hero-logo">
                                    <span class="application-hero-logo-text">HC</span>
                                </div>
                            </div>
                            <div class="col">
                                <h1 class="application-hero-title mb-1">
                                    Health Care Project
                                    <img src="{{ asset('img/checkmark.png') }}" alt="Verified" class="verified-badge" width="20" height="20">
                                </h1>
                                <p class="application-hero-org mb-0">{{ $orgName }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="application-form-fields px-3 px-md-4 pb-4">
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label">Select Theme<span>*</span></label>
                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Theme A</div>
                                <ul class="select-list">
                                    <li data-value="theme_a">Theme A</li>
                                    <li data-value="theme_b">Theme B</li>
                                    <li data-value="theme_c">Theme C</li>
                                </ul>
                                <input type="hidden" name="theme" class="hidden-select" value="theme_a">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Select Sub-theme<span>*</span></label>
                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Sub-theme</div>
                                <ul class="select-list">
                                    <li data-value="sub_theme_a">Sub-theme A</li>
                                    <li data-value="sub_theme_b">Sub-theme B</li>
                                    <li data-value="sub_theme_c">Sub-theme C</li>
                                </ul>
                                <input type="hidden" name="sub_theme" class="hidden-select" value="sub_theme_a">
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label">Project Duration<span>*</span></label>
                            <input type="number" name="project_duration" class="form-control" placeholder="Enter months" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Total Budget<span>*</span></label>
                            <input type="number" name="total_budget" class="form-control" placeholder="Rupees in Lakh" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card application-form-card border-0 mb-3">
                <div class="application-sections px-3 px-md-4 py-4">
                    @foreach ($sections as $section)
                        <div class="application-section-row row g-3 g-md-4 {{ $loop->last ? '' : 'mb-4 pb-4 application-section-divider' }}">
                            <div class="col-12 col-lg-4">
                                <h2 class="application-section-title mb-2">{{ $section['title'] }}</h2>
                                <p class="application-section-hint mb-0">Suggested Questions</p>
                                <p class="application-section-questions mb-0">{{ $section['questions'] }}</p>
                            </div>
                            <div class="col-12 col-lg-8">
                                <div class="application-textarea-wrap">
                                    <div class="d-flex justify-content-end mb-2">
                                        <span class="application-word-limit">Word Limit: {{ $section['limit'] }}</span>
                                    </div>
                                    <textarea
                                        name="{{ $section['name'] }}"
                                        rows="6"
                                        class="form-control application-textarea"
                                        data-word-limit="{{ $section['limit'] }}"
                                        placeholder="Write your response here..."
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card application-form-card border-0 mb-3">
                <div class="px-3 px-md-4 py-4">
                    <label class="form-label application-additional-label mb-3">
                        Anything else you want to share specific to the organization or proposed project...
                    </label>
                    <div class="application-textarea-wrap">
                        <div class="d-flex justify-content-end mb-2">
                            <span class="application-word-limit">Word Limit: 100</span>
                        </div>
                        <textarea
                            name="additional_info"
                            rows="5"
                            class="form-control application-textarea"
                            data-word-limit="100"
                            placeholder="Write in 100 words"
                        ></textarea>
                    </div>
                </div>
            </div>

            <div class="application-form-footer d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 flex-wrap">
                <button type="button" class="btn btn-secondary application-btn-cancel">Cancel</button>
                <button type="submit" class="btn gradient-btn application-btn-continue">
                    Continue
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="8" viewBox="0 0 17 8" fill="none" aria-hidden="true">
                        <path d="M12.625 7L15.75 3.875L12.625 0.75M15.75 3.875H0.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.application-textarea[data-word-limit]').forEach(function (textarea) {
                const maxWords = parseInt(textarea.dataset.wordLimit, 10);

                textarea.addEventListener('input', function () {
                    const words = this.value.trim().split(/\s+/).filter(Boolean);

                    if (words.length > maxWords) {
                        this.value = words.slice(0, maxWords).join(' ');
                    }
                });
            });

            document.querySelector('.application-btn-cancel')?.addEventListener('click', function () {
                window.location.href = @json(route('dashboard'));
            });
        });
    </script>
@endsection
