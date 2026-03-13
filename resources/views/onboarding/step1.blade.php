@extends('layouts.dashboard')

@section('content')
    <div class="">

        <div class="card-body p-0">
            <form method="POST" action="{{ route('onboarding.step1.store') }}">
                @csrf

                <div class="card p-3 p-md-4 border-0 rounded-3">
                    <div class="mb-4">
                        <h1 class="top-heading mb-0">Organization Details</h1>
                    </div>

                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Enter your organization PAN<span>*</span></label>
                            <input type="text" name="pan_number" class="form-control" placeholder="ABCDE1234F"
                                value="{{ old('pan_number', optional($profile)->pan_number) }}" required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Legal name of organization<span>*</span></label>
                            <input type="text" name="legal_name" class="form-control"
                                placeholder="Enter legal organization name"
                                value="{{ old('legal_name', optional($profile)->legal_name) }}" required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Date of Incorporation / Registration as per PAN<span>*</span></label>
                            <input type="date" name="date_of_incorporation" class="form-control"
                                value="{{ old('date_of_incorporation', optional($profile)->date_of_incorporation) }}"
                                required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Brand / Operating Name (if different)</label>
                            <input type="text" name="brand_name" class="form-control"
                                placeholder="Enter brand or operating name"
                                value="{{ old('brand_name', optional($profile)->brand_name) }}">
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Website<span>*</span></label>
                            <input type="url" name="website_url" class="form-control" placeholder="https://example.com"
                                value="{{ old('website_url', optional($profile)->website_url) }}" required>
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">LinkedIn Profile URL (optional)</label>
                            <input type="url" name="linkedin_url" class="form-control"
                                placeholder="https://linkedin.com/company/..."
                                value="{{ old('linkedin_url', optional($profile)->linkedin_url) }}">
                        </div>

                    </div>
                </div>

                <div
                    class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 mt-4 steps-btn pe-lg-4 flex-wrap">
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