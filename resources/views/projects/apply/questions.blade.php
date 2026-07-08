@extends('layouts.dashboard')

@section('page_title', 'Application Form')
@section('header_back_url', route('dashboard'))

@section('header_extra')


@endsection

@section('content')

    @php
        $answers = $application?->answers?->keyBy('fund_questionnaire_id') ?? collect();
    @endphp

    <div class="application-form-page">
        <form method="POST" id="applicationForm">
            @csrf

            <div class="card application-form-card border-0 mb-3">
                <div class="application-hero">
                    <div class="application-hero-banner"></div>

                    <div class="application-hero-body px-3 px-md-4 pb-3">
                        <div class="row align-items-end g-3">
                            <div class="col-auto">
                                <div class="application-hero-logo">
                                    <span class="application-hero-logo-text">
                                        {{ strtoupper(substr($fund->fund_name, 0, 2)) }}
                                    </span>
                                </div>
                            </div>

                            <div class="col">
                                <h1 class="application-hero-title mb-1">
                                    {{ $fund->fund_name }}

                                    <img src="{{ asset('img/checkmark.png') }}" alt="Verified" class="verified-badge"
                                        width="20" height="20">
                                </h1>

                                <p class="application-hero-org mb-0">
                                    {{ $fund->client->organization_name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="application-form-fields px-3 px-md-4 pb-4">

                    <div class="row g-3 mb-3">

                        <div class="col-12 col-md-6">
                            <label class="form-label">
                                Select Theme<span>*</span>
                            </label>

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">
                                    {{ optional($fund->themes->firstWhere('id', $application?->theme_id))->theme_name ?? 'Select Theme' }}
                                </div>

                                <ul class="select-list">
                                    @foreach($fund->themes->unique('theme_name') as $theme)
                                        <li data-value="{{ $theme->id }}" data-theme="{{ $theme->theme_name }}">
                                            {{ $theme->theme_name }}
                                        </li>
                                    @endforeach
                                </ul>

                                <input type="hidden" name="theme_id" class="hidden-select"
                                    value="{{ $application?->theme_id }}">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">
                                Select Sub-theme<span>*</span>
                            </label>

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">
                                    {{ optional($fund->themes->firstWhere('id', $application?->sub_theme_id))->sub_theme_name ?? 'Select Sub-theme' }}
                                </div>

                                <ul class="select-list">
                                    @foreach($fund->themes as $theme)
                                        <li data-value="{{ $theme->id }}" data-theme="{{ $theme->theme_name }}">
                                            {{ $theme->sub_theme_name }}
                                        </li>
                                    @endforeach
                                </ul>
                                <input type="hidden" name="sub_theme_id" class="hidden-select"
                                    value="{{ $application?->sub_theme_id }}">
                            </div>
                        </div>

                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label">
                                Project Duration<span>*</span>
                            </label>

                            <input type="number" name="project_duration" class="form-control"
                                max="{{ $fund->maximum_project_duration }}"
                                placeholder="Maximum {{ $fund->maximum_project_duration }} months"
                                value="{{ $application?->project_duration }}" required>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label">
                                Total Budget<span>*</span>
                            </label>

                            <input type="text" inputmode="numeric" name="total_budget" class="form-control"
                                placeholder="Rupees in Lakh" value="{{ $application?->total_budget }}" required>
                        </div>
                    </div>

                </div>

            </div>

            <div class="card application-form-card border-0 mb-3">
                <div class="application-sections px-3 px-md-4 py-4">

                    @foreach ($fund->questionnaires as $question)

                        <div
                            class="application-section-row row g-3 g-md-4 {{ $loop->last ? '' : 'mb-4 pb-4 application-section-divider' }}">

                            <div class="col-12 col-lg-4">
                                <h2 class="application-section-title mb-2">
                                    Question {{ $loop->iteration }}
                                </h2>

                                @if($question->description)
                                    <p class="application-section-hint mb-0">
                                        {{ $question->description }}
                                    </p>
                                @endif

                                <p class="application-section-questions mb-0">
                                    {{ $question->question }}
                                </p>
                            </div>

                            <div class="col-12 col-lg-8">
                                <div class="application-textarea-wrap">

                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <small class="text-muted word-counter">
                                            0 / {{ $question->word_limit }} words
                                        </small>

                                        <span class="application-word-limit">
                                            Word Limit: {{ $question->word_limit }}
                                        </span>
                                    </div>

                                    <small class="text-danger word-error d-none">
                                        Reduce your answer to {{ $question->word_limit }} words or fewer.
                                    </small>
                                    <textarea name="answers[{{ $question->id }}]" rows="6" required
                                        class="form-control application-textarea" data-word-limit="{{ $question->word_limit }}"
                                        placeholder="Write your response here...">{{ $answers[$question->id]->answer ?? '' }}</textarea>

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
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted word-counter">
                                0 / 100 words
                            </small>

                            <span class="application-word-limit">
                                Word Limit: 100
                            </span>
                        </div>

                        <small class="text-danger word-error d-none">
                            Reduce your answer to 100 words or fewer.
                        </small>

                        <textarea name="additional_info" rows="5" class="form-control application-textarea"
                            data-word-limit="100"
                            placeholder="Write in 100 words">{{ $application?->additional_info }}</textarea>
                    </div>
                </div>
            </div>

            <div
                class="application-form-footer d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 flex-wrap">
                <button type="button" class="btn btn-secondary application-btn-cancel">Cancel</button>

                <button type="submit" class="btn gradient-btn application-btn-continue">
                    Continue
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="8" viewBox="0 0 17 8" fill="none"
                        aria-hidden="true">
                        <path d="M12.625 7L15.75 3.875L12.625 0.75M15.75 3.875H0.75" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('applicationForm');
            const action = @json(route('projects.apply.questions.store', $fund));

            const textareas = document.querySelectorAll('.application-textarea');

            function countWords(text) {
                return text.trim() === ''
                    ? 0
                    : text.trim().split(/\s+/).length;
            }

            function validateTextarea(textarea) {

                const limit = parseInt(textarea.dataset.wordLimit);

                const words = countWords(textarea.value);

                const wrapper = textarea.closest('.application-textarea-wrap');

                const counter = wrapper.querySelector('.word-counter');

                const error = wrapper.querySelector('.word-error');
                console.log({
                    words,
                    limit,
                    valid: words <= limit
                });

                counter.textContent = `${words} / ${limit} words`;

                if (words > limit) {

                    textarea.classList.add('is-invalid');
                    counter.classList.add('text-danger');
                    counter.classList.remove('text-muted');

                    error.classList.remove('d-none');

                    return false;

                } else {

                    textarea.classList.remove('is-invalid');

                    counter.classList.remove('text-danger');
                    counter.classList.add('text-muted');

                    error.classList.add('d-none');

                    return true;
                }
            }

            textareas.forEach(textarea => {

                validateTextarea(textarea);

                textarea.addEventListener('input', function () {
                    validateTextarea(this);
                });

            });

            form.addEventListener('submit', function (e) {

                e.preventDefault();

                let valid = true;

                textareas.forEach(textarea => {
                    if (!validateTextarea(textarea)) {
                        valid = false;
                    }
                });
                console.log('Form valid:', valid);

                if (!valid) {

                    document.querySelector('.is-invalid')?.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });

                    return;
                }

                // Everything is valid, submit the form
                form.action = action;
                form.submit();

            });

        });
    </script>

    <script>
        const fundThemes = @json($fund->themes);
    </script>

    <script>
document.addEventListener('DOMContentLoaded', function () {

    const themeWrapper = document.querySelector('input[name="theme_id"]').closest('.select-wrapper');
    const subThemeWrapper = document.querySelector('input[name="sub_theme_id"]').closest('.select-wrapper');

    const themeInput = themeWrapper.querySelector('.hidden-select');
    const subThemeInput = subThemeWrapper.querySelector('.hidden-select');
    const subThemeDisplay = subThemeWrapper.querySelector('.custom-select');

function filterSubThemes(themeName, reset = true) {

    const items = subThemeWrapper.querySelectorAll('.select-list li');

    items.forEach(item => {
        item.style.display = item.dataset.theme === themeName ? '' : 'none';
    });

    // Only clear when user changes the theme
    if (reset) {
        subThemeInput.value = '';
        subThemeDisplay.innerText = 'Select Sub-theme';
    }
}

   // Theme changed by user
themeWrapper.querySelectorAll('.select-list li').forEach(li => {
    li.addEventListener('click', function () {
        setTimeout(() => {
            filterSubThemes(this.dataset.theme, true);
        }, 0);
    });
});

// Page load
if (themeInput.value) {
    const selectedTheme = fundThemes.find(x => x.id == themeInput.value);

    if (selectedTheme) {
        filterSubThemes(selectedTheme.theme_name, false);
    }
}

});
</script>
@endsection

@section('scripts')
    {{--
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
    </script> --}}


@endsection












{{-- <div class="card application-form-card border-0 mb-3">
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
                        <img src="{{ asset('img/checkmark.png') }}" alt="Verified" class="verified-badge" width="20"
                            height="20">
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
</div> --}}
{{-- <div class="card application-form-card border-0 mb-3">
    <div class="application-sections px-3 px-md-4 py-4">
        @foreach ($sections as $section)
        <div
            class="application-section-row row g-3 g-md-4 {{ $loop->last ? '' : 'mb-4 pb-4 application-section-divider' }}">
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
                    <textarea name="{{ $section['name'] }}" rows="6" class="form-control application-textarea"
                        data-word-limit="{{ $section['limit'] }}" placeholder="Write your response here..."></textarea>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div> --}}