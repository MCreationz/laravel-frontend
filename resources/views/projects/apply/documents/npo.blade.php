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
        // dd($document);
    @endphp

    <div class="card-body p-0">
        <form class="step2Form" method="POST" action="{{ route('projects.apply.documents.npo.store', $fund->id) }}"
            enctype="multipart/form-data">
            @csrf
            @csrf
            <div style="border-radius:8px;" class="card p-3 p-md-4 border-0">
                <div class="mb-4">
                    <h1 class="top-heading mb-0">Organizational Details</h1>
                </div>
                <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    <div class="col-12 px-md-2">
                        <label class="form-label">Name of the Organization<span>*</span></label>
                        <input type="text" name="organization_name" class="form-control"
                            placeholder="Name of the Organization" required
                            value="{{ old('organization_name', $document?->organization_name) }}">
                    </div>

                    <div class="col-12 px-md-2">
                        <label class="form-label">Upload Registration Certificate <span class="text-danger">*</span></label>

                        <input type="file" id="registration-certificate" name="registration_certificate" hidden>
                        <label for="registration-certificate" class="upload-label">
                            <div class="upload-content">
                                <p>Upload pdf/JPG upto 5 MB</p>
                                <small id="registration-certificate"></small>
                            </div>
                        </label>
                    </div>
                    <div class="col-12 px-md-2">
                        <label class="form-label">Registration Number<span>*</span></label>
                        <input type="text" name="registration_number" class="form-control"
                            placeholder="Enter Registration Number"
                            value="{{ old('registration_number', $document?->registration_number) }}">
                    </div>
                    <div class="px-md-2">
                        <hr class="mb-0">
                    </div>
                    <div class="col-12 px-md-2">
                        <label class="form-label">Upload 12A Certificate<span class="text-danger">*</span></label>

                        <input type="file" id="certificate-12a" name="certificate_12a" hidden>
                        <label for="certificate-12a" class="upload-label">
                            <div class="upload-content">
                                <p>Upload pdf/JPG upto 5 MB</p>
                                <small id="registration-certificate"></small>
                            </div>
                        </label>
                    </div>

                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">12A Registration Number<span>*</span></label>
                        <input type="text" name="registration_number_12a" class="form-control" placeholder="Enter here"
                            value="{{ old('registration_number_12a', $document?->registration_number_12a) }}">
                    </div>
                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">12 A Registration Validity<span>*</span></label>
                        <input type="date" name="validity_12a" class="form-control"
                            value="{{ old('validity_12a', $document?->validity_12a) }}">
                    </div>
                    <div class="col-12 px-md-2">
                        <label class="form-label">Upload 80G Certificate<span class="text-danger">*</span></label>

                        <input type="file" id="certificate-80g" name="certificate_80g" hidden>
                        <label for="certificate-80g" class="upload-label">
                            <div class="upload-content">
                                <p>Upload pdf/JPG upto 5 MB</p>
                                <small id="80g-certificate"></small>
                            </div>
                        </label>
                    </div>

                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">80G Registration Number<span>*</span></label>
                        <input type="text" name="registration_number_80g" class="form-control" placeholder="Enter here"
                            value="{{ old('registration_number_80g', $document?->registration_number_80g) }}">
                    </div>
                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">80G Registration Validity<span>*</span></label>
                        <input type="date" name="validity_80g" class="form-control"
                            value="{{ old('validity_80g', $document?->validity_80g) }}">
                    </div>


                    <div class="col-12 px-md-2">
                        <label class="form-label">Upload FCRA Certificate<span class="text-danger">*</span></label>

                        <input type="file" id="certificate-fcra" name="certificate_fcra" hidden>

                        <label for="certificate-fcra" class="upload-label">
                            <div class="upload-content">
                                <p>Upload pdf/JPG upto 5 MB</p>
                                <small>
                                    {{ $document?->certificate_fcra ? basename($document->certificate_fcra) : '' }}
                                </small>
                            </div>
                        </label>
                    </div>

                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">FCRA Registration Number<span>*</span></label>
                        <input type="text" name="registration_number_fcra" class="form-control" placeholder="Enter here"
                            value="{{ old('registration_number_fcra', $document?->registration_number_fcra) }}">
                    </div>

                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">FCRA Registration Validity<span>*</span></label>
                        <input type="date" name="validity_fcra" class="form-control"
                            value="{{ old('validity_fcra', $document?->validity_fcra) }}">
                    </div>

                    <div class="col-12 px-md-2">
                        <label class="form-label">Upload CSR-1 Certificate<span class="text-danger">*</span></label>

                        <input type="file" id="certificate-csr1" name="certificate_csr1" hidden>

                        <label for="certificate-csr1" class="upload-label">
                            <div class="upload-content">
                                <p>Upload pdf/JPG upto 5 MB</p>
                                <small>
                                    {{ $document?->certificate_csr1 ? basename($document->certificate_csr1) : '' }}
                                </small>
                            </div>
                        </label>
                    </div>

                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">CSR-1 Registration Number<span>*</span></label>
                        <input type="text" name="registration_number_csr1" class="form-control" placeholder="Enter here"
                            value="{{ old('registration_number_csr1', $document?->registration_number_csr1) }}">
                    </div>

                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">CSR-1 Registration Validity<span>*</span></label>
                        <input type="date" name="validity_csr1" class="form-control"
                            value="{{ old('validity_csr1', $document?->validity_csr1) }}">
                    </div>

                </div>

            </div>
            <div style="border-radius:0px 0px 8px 8px;"
                class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 steps-btn pe-lg-4 flex-wrap">
                <div class="btn-wrap">
                    <button type="button" class="btn simple-btn" onclick="">
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

@endsection