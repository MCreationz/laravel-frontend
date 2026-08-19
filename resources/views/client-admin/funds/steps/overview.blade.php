@extends('client-admin.layouts.app')

@section('title', 'Funds')

@section('content')

    <div class="step-section position-relative mb-3">
        <div class="bg-image position-absolute top-0 start-0 w-100 h-100">
            <img src="{{ asset('img/dasboard-bg.png') }}" class="img-fluid" alt="steps section" width="100%" height="100%">
        </div>
        <div
            class="step-wrapper d-flex flex-wrap justify-content-center justify-content-sm-between align-items-center py-3 py-md-4 py-xl-5 px-2 row-gap-2">
            <div class="col-6 col-sm-4 step bold active position-relative">
                <div class="step-inner">
                    <div class="step-circle active d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/direction.png') }}" class="object-fit-contain" alt="steps section"
                            width="15px" height="11px">
                    </div>
                    <p>Fund Detail Overview</p>
                </div>
                <div class="progress-dots position-absolute">
                    <span class="dot one"></span>
                    <span class="dot two"></span>
                    <span class="dot three"></span>
                    <span class="dot four"></span>
                    <span class="dot five"></span>
                    <span class="dot five"></span>
                    <span class="dot six"></span>
                    <span class="dot seven"></span>
                    <span class="dot nine"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
            <div class="col-6 col-sm-4 step bold">
                <div class="step-inner">
                    <div class="step-circle d-flex justify-content-center align-items-center">
                        <span></span>
                    </div>
                    <p>Funding Snapshot</p>
                </div>

                <div class="progress-dots position-absolute">
                    <span class="dot one"></span>
                    <span class="dot two"></span>
                    <span class="dot three"></span>
                    <span class="dot four"></span>
                    <span class="dot five"></span>
                    <span class="dot five"></span>
                    <span class="dot six"></span>
                    <span class="dot seven"></span>
                    <span class="dot nine"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>

            <div class="col-6 col-sm-4 step">
                <div class="step-circle d-flex justify-content-center align-items-center">
                    <span></span>
                </div>
                <p>Questionnaire</p>
            </div>

        </div>
    </div>


    <div class="">
        <div class="card-body p-0">
            <form id="step1Form" method="POST" action="{{ route('client-admin.funds.overview.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div style="border-radius:8px 8px 0px 0px;" class="card p-3 p-md-4 border-0">
                    <div class="mb-4">
                        <h1 class="top-heading mb-0">New Fund Details</h1>
                    </div>
                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 px-md-2">
                            <label class="form-label">Fund Name</label>
                            <input type="text" name="fund_name" class="form-control" placeholder="Enter Fund Name"
                                value="{{ old('fund_name', $fund?->fund_name) }}">
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Fund Owner</label>
                            <input type="text" name="fund_owner" class="form-control" placeholder="Enter Fund Owner"
                                value="{{ old('fund_owner', $fund?->fund_owner) }}" >

                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Fund Owner Email</label>
                            <input type="email" name="fund_owner_email" class="form-control"
                                placeholder="Fund Owner Email"
                                value="{{ old('fund_owner_email', $fund?->fund_owner_email) }}" >

                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>

                        <div class="col-12 px-md-2">
                            <label class="form-label">About Fund</label>
                            <textarea name="about_fund" placeholder="Write Fund description" class="form-control" style="min-height: 136px">{{ old('about_fund', $fund?->about_fund) }}</textarea>
                        </div>

                    </div>

                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

<div class="col-12 col-md-6 px-md-2">
    <label class="form-label">Fund Scope</label>

    <div class="select-wrapper w-100 position-relative">
        <div class="custom-select form-control">
            {{ old('fund_scope', $fund?->fund_scope ?? 'in_house') === 'outside' ? 'Outside' : 'In house' }}
        </div>

        <input
            type="hidden"
            name="fund_scope"
            id="fund_scope"
            class="hidden-select"
            value="{{ old('fund_scope', $fund?->fund_scope ?? 'in_house') }}"
        >

        <ul class="select-list" style="display: none;">
            <li data-value="in_house">In house</li>
            <li data-value="outside">Outside</li>
        </ul>
    </div>

    <div class="error-message text-danger" style="display:none;"></div>
</div>

    <div class="col-12 col-md-6 px-md-2"
         id="redirection-link-wrapper"
         style="{{ old('fund_scope', $fund?->fund_scope) === 'outside' ? '' : 'display:none;' }}">

        <label class="form-label">Redirection Link</label>

        <input
            type="url"
            name="redirection_link"
            id="redirection_link"
            class="form-control"
            placeholder="https://example.com"
            value="{{ old('redirection_link', $fund?->redirection_link) }}"
        >

        <div class="error-message text-danger" style="display:none;"></div>
    </div>

</div>
                    <div class="mt-4 mb-4">
                        <h2 class="top-heading mb-0">Fund Timelines</h2>
                    </div>
                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Application Starts On:</label>
                            <input type="date" name="project_start" class="form-control"
                                placeholder="Enter project start date"
                                value="{{ old('project_start', $fund?->project_start?->format('Y-m-d')) }}" >
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Application Closes On:</label>
                            <input type="date" name="project_end" class="form-control"
                                placeholder="Enter project end date"
                                value="{{ old('project_end', $fund?->project_end?->format('Y-m-d')) }}" >
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>
                        <div class="col-12 px-md-2">
                            <label class="form-label">Maximum Project Duration:</label>
                            <input type="number" name="maximum_project_duration" class="form-control"
                                placeholder="Enter in months"
                                value="{{ old('maximum_project_duration', $fund?->maximum_project_duration) }}">
                            <div class="error-message text-danger" style="display:none;"></div>
                        </div>
                    </div>

                    <div class="mt-4 mb-4">
                        <h3 class="top-heading mb-0">Fund Branding</h3>
                    </div>
                    <div class="row flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 px-md-2">
                            <div class="upload-box">
                                <label class="form-label">Fund Logo</label>

                                <input type="file" id="fund_logo" name="fund_logo" hidden>

                                <label for="fund_logo" class="upload-label mb-0">
                                    <div class="upload-content">
                                        <div class="upload-icon mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                viewBox="0 0 26 26" fill="none">
                                                <g opacity="0.2">
                                                    <path d="M9.75 11.916V18.416L11.9167 16.2493" stroke="#292D32"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M9.7526 18.4167L7.58594 16.25" stroke="#292D32"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M23.8307 10.8327V16.2493C23.8307 21.666 21.6641 23.8327 16.2474 23.8327H9.7474C4.33073 23.8327 2.16406 21.666 2.16406 16.2493V9.74935C2.16406 4.33268 4.33073 2.16602 9.7474 2.16602H15.1641"
                                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M23.8307 10.8327H19.4974C16.2474 10.8327 15.1641 9.74935 15.1641 6.49935V2.16602L23.8307 10.8327Z"
                                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                            </svg>
                                        </div>

                                        <p class="">Upload image up to 5 MB</p>

                                        {{-- <small id="fund_logo_name" class="d-block mt-2"></small> --}}
                                    </div>
                                </label>
                                @if (!empty($fund->fund_logo))
                                    <a href="{{ Storage::url($fund->fund_logo) }}" target="_blank"
                                        class="text-success d-block mt-2 ">
                                        <img src="{{ Storage::url($fund->fund_logo) }}" alt="Fund Logo" width="40"
                                            height="40" class="me-2 rounded">
                                        View Fund Logo
                                    </a>
                                @endif

                            </div>
                        </div>
                        <div class="col-12 px-md-2">
                            <div class="upload-box">
                                <label class="form-label">Fund Banner</label>

                                <input type="file" id="fund_banner" name="fund_banner" hidden>

                                <label for="fund_banner" class="upload-label mb-0">
                                    <div class="upload-content">
                                        <div class="upload-icon mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                viewBox="0 0 26 26" fill="none">
                                                <g opacity="0.2">
                                                    <path d="M9.75 11.916V18.416L11.9167 16.2493" stroke="#292D32"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M9.7526 18.4167L7.58594 16.25" stroke="#292D32"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M23.8307 10.8327V16.2493C23.8307 21.666 21.6641 23.8327 16.2474 23.8327H9.7474C4.33073 23.8327 2.16406 21.666 2.16406 16.2493V9.74935C2.16406 4.33268 4.33073 2.16602 9.7474 2.16602H15.1641"
                                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M23.8307 10.8327H19.4974C16.2474 10.8327 15.1641 9.74935 15.1641 6.49935V2.16602L23.8307 10.8327Z"
                                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                            </svg>
                                        </div>

                                        <p class="">Upload image up to 5 MB</p>

                                        {{-- <small id="fund_banner_name" class="d-block mt-2"></small> --}}
                                    </div>
                                </label>
                                @if (!empty($fund->fund_banner))
                                    <a href="{{ Storage::url($fund->fund_banner) }}" target="_blank"
                                        class="text-success d-block mt-2">
                                        <img src="{{ Storage::url($fund->fund_banner) }}" alt="Fund Banner"
                                            width="60" height="40" class="me-2 rounded">
                                        View Fund Banner
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div style="border-radius:0px 0px 8px 8px;"
                        class="d-flex justify-content-center justify-content-md-end gap-2 mt-4 steps-btn flex-wrap">
                        <button type="button" class="btn btn-secondary"
                            onclick="window.location.href='{{ route('client-admin.funds.index') }}'">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary blue-btn">Next
                            </svg></button>
                    </div>

            </form>
        </div>
    </div>

    {{--
    <script>
        document.getElementById("fund_logo").addEventListener("change", function () {
            const fileName = this.files[0]?.name;
            document.getElementById("file-name").innerText = fileName || "";
        });
    </script>
    <script>
        document.getElementById('fund_logo').addEventListener('change', function () {

            const fileName = this.files[0]?.name || 'No file selected';

            document.getElementById('fund_logo_name').textContent = fileName;
        });

        document.getElementById('fund_banner').addEventListener('change', function () {

            const fileName = this.files[0]?.name || 'No file selected';

            document.getElementById('fund_banner_name').textContent = fileName;
        });
    </script> --}}


    <script>
        document.addEventListener('DOMContentLoaded', function() {


const fundScope = document.getElementById('fund_scope');
const fundScopeSelect = fundScope.closest('.select-wrapper').querySelector('.custom-select');

const redirectionLinkWrapper = document.getElementById('redirection-link-wrapper');
const redirectionLink = document.getElementById('redirection_link');

function updateFundScopeLabel() {
    const selectedOption = fundScope
        .closest('.select-wrapper')
        .querySelector(`.select-list li[data-value="${fundScope.value}"]`);

    if (selectedOption) {
        fundScopeSelect.textContent = selectedOption.textContent.trim();
    }
}

function toggleRedirectionLink() {
    if (fundScope.value === 'outside') {
        redirectionLinkWrapper.style.display = '';
        redirectionLink.setAttribute('required', 'required');
    } else {
        redirectionLinkWrapper.style.display = 'none';
        redirectionLink.removeAttribute('required');
        redirectionLink.value = '';
    }
}

fundScope
    .closest('.select-wrapper')
    .querySelectorAll('.select-list li')
    .forEach(option => {
        option.addEventListener('click', function () {
            fundScope.value = this.dataset.value;

            fundScopeSelect.textContent = this.textContent.trim();

            toggleRedirectionLink();
        });
    });

// Set initial state when page loads
updateFundScopeLabel();
toggleRedirectionLink();


            const allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

            document.querySelectorAll('input[type="file"]').forEach(input => {

                input.setAttribute(
                    'accept',
                    'image/jpeg,image/png,image/webp,image/gif,.jpg,.jpeg,.png,.webp,.gif'
                );

                input.addEventListener('change', function() {

                    if (!this.files.length) return;

                    const file = this.files[0];
                    const ext = file.name.split('.').pop().toLowerCase();

                    if (!allowedExtensions.includes(ext)) {

                        alert('Only image files (JPG, JPEG, PNG, WEBP, GIF) are allowed.');

                        this.value = '';

                        const nameField = document.getElementById(this.id + '_name');

                        if (nameField) {
                            nameField.textContent = '';
                        }

                        return;
                    }

                    const nameField = document.getElementById(this.id + '_name');

                    if (nameField) {
                        nameField.textContent = '✓ ' + file.name;
                    }
                });
            });

        });
    </script>
@endsection
