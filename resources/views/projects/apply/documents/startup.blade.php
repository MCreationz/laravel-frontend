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

    <div class="card-body p-0">
        <form class="step2Form" method="POST" action="{{ route('onboarding.step2.store') }}">
            @csrf
            <div style="border-radius:8px;" class="card p-3 p-md-4 border-0">
                <div class="mb-4">
                    <h1 class="top-heading mb-0">Organizational Details</h1>
                </div>
                <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    <div class="col-12 px-md-2">
                        <label class="form-label">Name of the Organization<span>*</span></label>
                        <input type="text" name="" class="form-control" placeholder="Name of the Organization" required
                            value="">
                    </div>

                    <div class="col-12 px-md-2">
                        <label class="form-label">Upload Registration Certificate <span class="text-danger">*</span></label>

                        <input type="file" id="registration-certificate" name="registration-certificate" hidden>

                        <label for="registration-certificate" class="upload-label">
                            <div class="upload-content">
                                <p>Upload pdf/JPG upto 5 MB</p>
                                <small id="registration-certificate"></small>
                            </div>
                        </label>
                    </div>
                    <div class="col-12 px-md-2">
                        <label class="form-label">Registration Number<span>*</span></label>
                        <input type="number" name="" class="form-control" placeholder="Enter Registration Number" value="">
                    </div>
                    <div class="px-md-2">
                        <hr class="mb-0">
                    </div>
                    <div class="col-12 px-md-2">
                        <label class="form-label">Upload DPIIT Certificate<span class="text-danger">*</span></label>

                        <input type="file" id="DPIIT-certificate" name="DPIIT-certificate" hidden>

                        <label for="DPIIT-certificate" class="upload-label">
                            <div class="upload-content">
                                <p>Upload pdf/JPG upto 5 MB</p>
                                <small id="registration-certificate"></small>
                            </div>
                        </label>
                    </div>

                    <div class="col-12 px-md-2">
                        <label class="form-label">DPIIT Registration Number<span>*</span></label>
                        <input type="number" name="" class="form-control" placeholder="Enter here"
                            value="">
                    </div>
                    {{-- radio --}}



                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">Patent No<span>*</span></label>
                        <input type="number" name="" class="form-control" placeholder="Enter here"
                            value="">
                    </div>
                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">Application No<span>*</span></label>
                        <input type="number" name="" class="form-control" placeholder="Enter here"
                            value="">
                    </div>
                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">Date of Filling<span>*</span></label>
                        <input type="date" name="" class="form-control" placeholder="Enter here"
                            value="">
                    </div>
                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">Patentee Name<span>*</span></label>
                        <input type="date" name="" class="form-control" placeholder="Enter here"
                            value="">
                    </div>
                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">Validity of the Patent<span>*</span></label>
                        <input type="date" name="" class="form-control" placeholder="Enter here"
                            value="">
                    </div>
                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">GST Registration No<span>*</span></label>
                        <input type="date" name="" class="form-control" placeholder="Enter here"
                            value="">
                    </div>



                    <div class="col-12 px-md-2">
                        <label class="form-label">Upload GST Certificate<span class="text-danger">*</span></label>

                        <input type="file" id="80g-certificate" name="80g-certificate" hidden>

                        <label for="80g-certificate" class="upload-label">
                            <div class="upload-content">
                                <p>Upload pdf/JPG upto 5 MB</p>
                                <small id="80g-certificate"></small>
                            </div>
                        </label>
                    </div>

                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">MSME Registration Number<span>*</span></label>
                        <input type="number" name="" class="form-control" placeholder="Enter here"
                            value="">
                    </div>
                    <div class="col-12 col-md-6 px-md-2">
                        <label class="form-label">MSME Registration Validity<span>*</span></label>
                        <input type="date" name="" class="form-control" placeholder="Enter here"
                            value="">
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