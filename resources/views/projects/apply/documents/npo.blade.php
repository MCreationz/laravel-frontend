@extends('layouts.dashboard')

@section('page_title', 'Application Form')
@section('header_back_url', route('dashboard'))

@section('header_extra')


@endsection

@section('content')
    <div class="step-section position-relative mb-3">
        <div class="bg-image position-absolute top-0 start-0 w-100 h-100">
            <img src="{{ asset('img/dasboard-bg.png') }}" class="img-fluid" alt="steps section" width="100%" height="100%">
        </div>
        <div
            class="step-wrapper d-flex flex-wrap justify-content-center justify-content-md-between align-items-center py-3 py-md-4 py-xl-5 px-2 row-gap-2">
            <div class="col-6 col-md-3 step bold active position-relative">
                <div class="step-inner">
                    <div class="step-circle active d-flex justify-content-center align-items-center done">
                        <img src="{{ asset('img/checkmark.png') }}" class="object-fit-contain" alt="steps section"
                            width="15px" height="11px">
                    </div>
                    <p>Senior Management Details</p>
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

                </div>
            </div>
            <div class="col-6 col-md-3 step bold active">
                <div class="step-inner">
                    <div class="step-circle active d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/direction.png') }}" class="object-fit-contain" alt="steps section"
                            width="15px" height="11px">
                    </div>
                    <p>Documents</p>
                </div>

                <div class="progress-dots position-absolute d-none d-md-flex">
                    <span class="dot one"></span>
                    <span class="dot two"></span>
                    <span class="dot three"></span>
                    <span class="dot four"></span>
                    <span class="dot five"></span>
                    <span class="dot five"></span>
                    <span class="dot six"></span>
                    <span class="dot seven"></span>
                    <span class="dot nine"></span>

                </div>
            </div>

            <div class="col-6 col-md-3 step">
                <div class="step-inner">
                    <div class="step-circle d-flex justify-content-center align-items-center">
                        <span></span>
                    </div>
                    <p>Financial Documents</p>
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

                </div>
            </div>

            <div class="col-6 col-md-3 step bold">

                <div class="step-inner">
                    <div class="step-circle d-flex justify-content-center align-items-center">
                        <span></span>
                    </div>
                    <p>Awards & Recognitions</p>
                </div>


            </div>

        </div>
    </div>
    @php
        $document = $fundApplication->npoDocument ?? null;
        $organization = auth('organization')->user();
        $op = $organization->operationalDetail;
    @endphp

    <div class="card-body p-0">
        <form class="step2Form" method="POST" action="{{ route('projects.apply.documents.npo.store', $fund->id) }}"
            enctype="multipart/form-data">
            @csrf
            @csrf
            <div class="card p-3 p-md-4 border-0 mb-3">
                <div class="mb-4">
                    <h1 class="top-heading mb-0">Organizational Details</h1>
                </div>
                <div class="row flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    <div class="col-12 col-md-4 px-md-2">
                        <label class="form-label">Name of the Organization<span>*</span></label>

                        <input type="text" name="organization_name" class="form-control"
                            placeholder="Name of the Organization"
                            value="{{ old('organization_name', auth('organization')->user()->profile->legal_name) }}"
                            readonly required>
                    </div>
                    <div class="col-12 col-md-4 px-md-2">
                        <label class="form-label">Registration Number<span>*</span></label>
                        <input type="text" name="registration_number" class="form-control"
                            placeholder="Enter Registration Number"
                            value="{{ old('registration_number', $document?->registration_number) }}" required>
                    </div>
                    <div class="col-12 col-md-4 px-md-2">
                        <label class="form-label">PAN Card Number<span>*</span></label>
                        <input type="text" name="pan_number" class="form-control"
                            placeholder="2346EBNH1J"
                            value="{{ old('registration_number', $document?->registration_number) }}" required>
                    </div>
                    <div class="col-12 col-md-6 px-md-2 position-relative pb-5">
                        <label class="form-label">Upload Registration Certificate <span class="text-danger">*</span></label>

                        <input type="file" id="registration-certificate" name="registration_certificate" hidden required>
                        <label for="registration-certificate" class="upload-label">
                            <div class="upload-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"
                                    fill="none">
                                    <g opacity="0.2">
                                        <path d="M9.75 11.917V18.417L11.9167 16.2503" stroke="#292D32" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.7526 18.4167L7.58594 16.25" stroke="#292D32" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M23.8307 10.8337V16.2503C23.8307 21.667 21.6641 23.8337 16.2474 23.8337H9.7474C4.33073 23.8337 2.16406 21.667 2.16406 16.2503V9.75032C2.16406 4.33366 4.33073 2.16699 9.7474 2.16699H15.1641"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M23.8307 10.8337H19.4974C16.2474 10.8337 15.1641 9.75033 15.1641 6.50033V2.16699L23.8307 10.8337Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                </svg>
                                <p class="mt-2">Upload pdf/JPG upto 5 MB</p>
                                <small id="registration-certificate"></small>


                            </div>
                        </label>
                        @if ($document?->registration_certificate)
                            @php
                                $extension = strtolower(
                                    pathinfo($document->registration_certificate, PATHINFO_EXTENSION),
                                );

                                $icon = match ($extension) {
                                    'pdf' => asset('img/pdf-icon.png'),
                                    'doc', 'docx' => asset('img/docx.svg'),
                                    'xls', 'xlsx', 'csv' => asset('img/excel.svg'),
                                    default => asset('img/docx.svg'),
                                };
                            @endphp

                            <div class="mt-2">
                                <a href="{{ asset('storage/' . $document->registration_certificate) }}" target="_blank"
                                    class="text-success d-block mb-1 uploaded-doc">
                                    <img src="{{ $icon }}" alt="" width="20" height="20">
                                    View registration certificate
                                </a>
                            </div>
                        @endif
                    </div>
                                        <div class="col-12 col-md-6 px-md-2 position-relative pb-5">
                        <label class="form-label">Upload Your PAN Card <span class="text-danger">*</span></label>

                        <input type="file" id="registration-certificate" name="registration_certificate" hidden required>
                        <label for="registration-certificate" class="upload-label">
                            <div class="upload-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"
                                    fill="none">
                                    <g opacity="0.2">
                                        <path d="M9.75 11.917V18.417L11.9167 16.2503" stroke="#292D32" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.7526 18.4167L7.58594 16.25" stroke="#292D32" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M23.8307 10.8337V16.2503C23.8307 21.667 21.6641 23.8337 16.2474 23.8337H9.7474C4.33073 23.8337 2.16406 21.667 2.16406 16.2503V9.75032C2.16406 4.33366 4.33073 2.16699 9.7474 2.16699H15.1641"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M23.8307 10.8337H19.4974C16.2474 10.8337 15.1641 9.75033 15.1641 6.50033V2.16699L23.8307 10.8337Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                </svg>
                                <p class="mt-2">Upload pdf/JPG upto 5 MB</p>
                                <small id="registration-certificate"></small>


                            </div>
                        </label>
                        @if ($document?->registration_certificate)
                            @php
                                $extension = strtolower(
                                    pathinfo($document->registration_certificate, PATHINFO_EXTENSION),
                                );

                                $icon = match ($extension) {
                                    'pdf' => asset('img/pdf-icon.png'),
                                    'doc', 'docx' => asset('img/docx.svg'),
                                    'xls', 'xlsx', 'csv' => asset('img/excel.svg'),
                                    default => asset('img/docx.svg'),
                                };
                            @endphp

                            <div class="mt-2">
                                <a href="{{ asset('storage/' . $document->registration_certificate) }}" target="_blank"
                                    class="text-success d-block mb-1 uploaded-doc">
                                    <img src="{{ $icon }}" alt="" width="20" height="20">
                                    View registration certificate
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card p-3 p-md-4 border-0 mb-3">
                <div class="row flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    @if ($op?->status_12a)
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">12A Registration Number<span>*</span></label>
                            <input type="text" name="registration_number_12a" class="form-control"
                                placeholder="Enter here"
                                value="{{ old('registration_number_12a', $document?->registration_number_12a) }}" required>
                        </div>
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">12 A Registration Validity<span>*</span></label>
                            <input type="date" name="validity_12a" class="form-control"
                                value="{{ old('validity_12a', $document?->validity_12a) }}" required>
                        </div>
                        <div class="col-12 px-md-2 position-relative pb-5">
                            <label class="form-label">Upload 12A Certificate<span class="text-danger">*</span></label>
                            <input type="file" id="certificate-12a" name="certificate_12a" hidden required>
                            <label for="certificate-12a" class="upload-label">
                                <div class="upload-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                        viewBox="0 0 26 26" fill="none">
                                        <g opacity="0.2">
                                            <path d="M9.75 11.917V18.417L11.9167 16.2503" stroke="#292D32"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.7526 18.4167L7.58594 16.25" stroke="#292D32" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M23.8307 10.8337V16.2503C23.8307 21.667 21.6641 23.8337 16.2474 23.8337H9.7474C4.33073 23.8337 2.16406 21.667 2.16406 16.2503V9.75032C2.16406 4.33366 4.33073 2.16699 9.7474 2.16699H15.1641"
                                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M23.8307 10.8337H19.4974C16.2474 10.8337 15.1641 9.75033 15.1641 6.50033V2.16699L23.8307 10.8337Z"
                                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                    <p class="mt-2">Upload pdf/JPG upto 5 MB</p>
                                    <small id="registration-certificate"></small>


                                </div>
                            </label>
                            @if ($document?->certificate_12a)
                                @php
                                    $extension = strtolower(pathinfo($document->certificate_12a, PATHINFO_EXTENSION));

                                    $icon = match ($extension) {
                                        'pdf' => asset('img/pdf-icon.png'),
                                        'doc', 'docx' => asset('img/docx.svg'),
                                        'xls', 'xlsx', 'csv' => asset('img/excel.svg'),
                                        default => asset('img/docx.svg'),
                                    };
                                @endphp

                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $document->certificate_12a) }}" target="_blank"
                                        class="text-success d-block mb-1 uploaded-doc">
                                        <img src="{{ $icon }}" alt="" width="20" height="20">
                                        View 12A certificate
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            <div class="card p-3 p-md-4 border-0 mb-3">
                <div class="row flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    @if ($op?->status_80g)
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">80G Registration Number<span>*</span></label>
                            <input type="text" name="registration_number_80g" class="form-control"
                                placeholder="Enter here"
                                value="{{ old('registration_number_80g', $document?->registration_number_80g) }}"
                                required>
                        </div>
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">80G Registration Validity<span>*</span></label>
                            <input type="date" name="validity_80g" class="form-control"
                                value="{{ old('validity_80g', $document?->validity_80g) }}" required>
                        </div>
                        <div class="col-12 px-md-2 position-relative pb-5">
                            <label class="form-label">Upload 80G Certificate<span class="text-danger">*</span></label>

                            <input type="file" id="certificate-80g" name="certificate_80g" hidden required>
                            <label for="certificate-80g" class="upload-label">
                                <div class="upload-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                        viewBox="0 0 26 26" fill="none">
                                        <g opacity="0.2">
                                            <path d="M9.75 11.917V18.417L11.9167 16.2503" stroke="#292D32"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.7526 18.4167L7.58594 16.25" stroke="#292D32" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M23.8307 10.8337V16.2503C23.8307 21.667 21.6641 23.8337 16.2474 23.8337H9.7474C4.33073 23.8337 2.16406 21.667 2.16406 16.2503V9.75032C2.16406 4.33366 4.33073 2.16699 9.7474 2.16699H15.1641"
                                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M23.8307 10.8337H19.4974C16.2474 10.8337 15.1641 9.75033 15.1641 6.50033V2.16699L23.8307 10.8337Z"
                                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                    <p class="mt-2">Upload pdf/JPG upto 5 MB</p>
                                    <small id="80g-certificate"></small>

                                </div>
                            </label>
                            @if ($document?->certificate_80g)
                                @php
                                    $extension = strtolower(pathinfo($document->certificate_80g, PATHINFO_EXTENSION));

                                    $icon = match ($extension) {
                                        'pdf' => asset('img/pdf-icon.png'),
                                        'doc', 'docx' => asset('img/docx.svg'),
                                        'xls', 'xlsx', 'csv' => asset('img/excel.svg'),
                                        default => asset('img/docx.svg'),
                                    };
                                @endphp

                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $document->certificate_80g) }}" target="_blank"
                                        class="text-success d-block mb-1 uploaded-doc">
                                        <img src="{{ $icon }}" alt="" width="20" height="20">
                                        View 80G certificate
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <div class="card p-3 p-md-4 border-0 mb-3">
                <div class="row flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    @if ($op?->status_fcra)
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">FCRA Registration Number<span>*</span></label>
                            <input type="text" name="registration_number_fcra" class="form-control"
                                placeholder="Enter here"
                                value="{{ old('registration_number_fcra', $document?->registration_number_fcra) }}"
                                required>
                        </div>
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">FCRA Registration Validity<span>*</span></label>
                            <input type="date" name="validity_fcra" class="form-control"
                                value="{{ old('validity_fcra', $document?->validity_fcra) }}" required>
                        </div>
                        <div class="col-12 px-md-2 position-relative pb-5">
                            <label class="form-label">Upload FCRA Certificate<span class="text-danger">*</span></label>
                            <input type="file" id="certificate-fcra" name="certificate_fcra" hidden required>
                            <label for="certificate-fcra" class="upload-label">
                                <div class="upload-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                        viewBox="0 0 26 26" fill="none">
                                        <g opacity="0.2">
                                            <path d="M9.75 11.917V18.417L11.9167 16.2503" stroke="#292D32"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.7526 18.4167L7.58594 16.25" stroke="#292D32" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M23.8307 10.8337V16.2503C23.8307 21.667 21.6641 23.8337 16.2474 23.8337H9.7474C4.33073 23.8337 2.16406 21.667 2.16406 16.2503V9.75032C2.16406 4.33366 4.33073 2.16699 9.7474 2.16699H15.1641"
                                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M23.8307 10.8337H19.4974C16.2474 10.8337 15.1641 9.75033 15.1641 6.50033V2.16699L23.8307 10.8337Z"
                                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                    <p class="mt-2">Upload pdf/JPG upto 5 MB</p>

                                </div>
                            </label>
                            @if ($document?->certificate_fcra)
                                @php
                                    $extension = strtolower(pathinfo($document->certificate_fcra, PATHINFO_EXTENSION));

                                    $icon = match ($extension) {
                                        'pdf' => asset('img/pdf-icon.png'),
                                        'doc', 'docx' => asset('img/docx.svg'),
                                        'xls', 'xlsx', 'csv' => asset('img/excel.svg'),
                                        default => asset('img/docx.svg'),
                                    };
                                @endphp

                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $document->certificate_fcra) }}" target="_blank"
                                        class="text-success d-block mb-1 uploaded-doc">
                                        <img src="{{ $icon }}" alt="" width="20" height="20">
                                        View FCRA certificate
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            <div class="card p-3 p-md-4 border-0">
                <div class="row flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    @if ($op?->csr_1_registration)
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">CSR-1 Registration Number<span>*</span></label>
                            <input type="text" name="registration_number_csr1" class="form-control"
                                placeholder="Enter here"
                                value="{{ old('registration_number_csr1', $document?->registration_number_csr1) }}"
                                required>
                        </div>
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">CSR-1 Registration Validity<span>*</span></label>
                            <input type="date" name="validity_csr1" class="form-control"
                                value="{{ old('validity_csr1', $document?->validity_csr1) }}" required>
                        </div>
                        <div class="col-12 px-md-2 position-relative pb-5">
                            <label class="form-label">Upload CSR-1 Certificate<span class="text-danger">*</span></label>

                            <input type="file" id="certificate-csr1" name="certificate_csr1" hidden required>

                            <label for="certificate-csr1" class="upload-label">
                                <div class="upload-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                        viewBox="0 0 26 26" fill="none">
                                        <g opacity="0.2">
                                            <path d="M9.75 11.917V18.417L11.9167 16.2503" stroke="#292D32"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M9.7526 18.4167L7.58594 16.25" stroke="#292D32" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M23.8307 10.8337V16.2503C23.8307 21.667 21.6641 23.8337 16.2474 23.8337H9.7474C4.33073 23.8337 2.16406 21.667 2.16406 16.2503V9.75032C2.16406 4.33366 4.33073 2.16699 9.7474 2.16699H15.1641"
                                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M23.8307 10.8337H19.4974C16.2474 10.8337 15.1641 9.75033 15.1641 6.50033V2.16699L23.8307 10.8337Z"
                                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                    <p class="mt-2">Upload pdf/JPG upto 5 MB</p>

                                </div>
                            </label>
                            @if ($document?->certificate_csr1)
                                @php
                                    $extension = strtolower(pathinfo($document->certificate_csr1, PATHINFO_EXTENSION));

                                    $icon = match ($extension) {
                                        'pdf' => asset('img/pdf-icon.png'),
                                        'doc', 'docx' => asset('img/docx.svg'),
                                        'xls', 'xlsx', 'csv' => asset('img/excel.svg'),
                                        default => asset('img/docx.svg'),
                                    };
                                @endphp

                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $document->certificate_csr1) }}" target="_blank"
                                        class="text-success d-block mb-1 uploaded-doc">
                                        <img src="{{ $icon }}" alt="" width="20" height="20">
                                        View CSR-1 certificate
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            <div style="border-radius:0px 0px 8px 8px;"
                class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 steps-btn pe-lg-4 flex-wrap">
                <div class="btn-wrap">
                    <button type="button" class="btn simple-btn"
                        onclick="window.location.href='{{ route('projects.apply.senior-management', $fund->id) }}'">
                        <img src="/img/back.png" class="me-2" width="15" height="6.25">
                        Back
                    </button>
                </div>
                <div class="btn-wrap">
                    <button type="submit" class="btn gradient-btn">Continue <svg xmlns="http://www.w3.org/2000/svg"
                            width="17" height="8" viewBox="0 0 17 8" fill="none">
                            <path d="M12.625 7L15.75 3.875L12.625 0.75M15.75 3.875H0.75" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg></button>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('input[type="file"]').forEach(input => {

                input.setAttribute(
                    'accept',
                    '.pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                );

                input.addEventListener('change', function() {

                    if (!this.files.length) return;

                    const file = this.files[0];
                    const ext = file.name.split('.').pop().toLowerCase();

                    if (!['pdf', 'doc', 'docx'].includes(ext)) {

                        alert('Only PDF, DOC and DOCX files are allowed.');

                        this.value = '';

                        const fileNameEl =
                            document.getElementById(this.id + '_name');

                        if (fileNameEl) {
                            fileNameEl.textContent = '';
                        }
                    }
                });

            });

        });
    </script>

    <script>
        function toggleFileRequired(inputId, hasFile) {
            const input = document.getElementById(inputId);

            if (!input) {
                return;
            }

            if (hasFile) {
                input.removeAttribute('required');
            } else {
                input.setAttribute('required', 'required');
            }
        }

        toggleFileRequired('registration-certificate', {{ $document?->registration_certificate ? 'true' : 'false' }});
        toggleFileRequired('certificate-12a', {{ $document?->certificate_12a ? 'true' : 'false' }});
        toggleFileRequired('certificate-80g', {{ $document?->certificate_80g ? 'true' : 'false' }});
        toggleFileRequired('certificate-fcra', {{ $document?->certificate_fcra ? 'true' : 'false' }});
        toggleFileRequired('certificate-csr1', {{ $document?->certificate_csr1 ? 'true' : 'false' }});
    </script>
@endsection
