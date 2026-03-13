@extends('layouts.dashboard')

@section('content')
    <div class="">

        <div class="card-body p-0">
            <form method="POST" action="{{ route('onboarding.step1.store') }}">
                @csrf
                <div class="card p-4 border-0">
                    <div class="mb-4">
                        <h2>Organization Details</h2>
                    </div>
                    <div class="row mb-3 flex-wrap row-gap-4">
                        <div class="col-12 col-md-6 col-xl-4 px-2">
                            <label class="form-label">Enter your organization PAN<span>*</span></label>
                            <input type="text" name="pan_number" class="form-control" placeholder="ABCDE1234F" required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-2">
                            <label class="form-label">Legal name of organization<span>*</span></label>
                            <input type="text" name="legal_name" class="form-control"
                                placeholder="Enter legal organization name" required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-2">
                            <label class="form-label">Date of Incorporation / Registration as per PAN<span>*</span></label>
                            <input type="date" name="date_of_incorporation" class="form-control"
                                placeholder="Select date" required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-2">
                            <label class="form-label">Brand / Operating Name (if different)</label>
                            <input type="text" name="brand_name" class="form-control"
                                placeholder="Enter brand or operating name">
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-2">
                            <label class="form-label">Website<span>*</span></label>
                            <input type="url" name="website" class="form-control" placeholder="https://example.com"
                                required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-2">
                            <label class="form-label">LinkedIn Links (optional)</label>
                            <input type="url" name="linkedin" class="form-control"
                                placeholder="https://linkedin.com/company/...">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 mt-4 steps-btn pe-lg-4 flex-wrap">
                    <div class="btn-wrap">
                        <button type="button" class="btn simple-btn">Cancel</button>
                    </div>
                    <div class="btn-wrap">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
