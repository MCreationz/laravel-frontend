@extends('layouts.dashboard')

@section('content')
    <div class="card p-4">
        <div class="mb-4">
            <h2>Organization Details</h2>
        </div>
        <div class="card-body p-0">

            <form method="POST" action="{{ route('onboarding.step1.store') }}">
                @csrf
                <div class="row mb-3 flex-wrap row-gap-4">
                    <div class="col-6 col-xl-4 px-2">
                        <label class="form-label">Enter your organization PAN<span>*</span></label>
                        <input type="text" name="pan-Number" class="form-control" placeholder="Enter PAN number" required>
                    </div>
                    <div class="col-6 col-xl-4 px-2">
                        <label class="form-label">Legal name of organization<span>*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Legal name" required>
                    </div>
                    <div class="col-6 col-xl-4 px-2">
                        <label class="form-label">Date of Incorporation / Registration as per PAN<span>*</span></label>
                        <input type="text" name="pan" class="form-control" placeholder="Enter PAN number" required>
                    </div>
                    <div class="col-6 col-xl-4 px-2">
                        <label class="form-label">Brand / Operating Name (if different)<span>*</span></label>
                        <input type="text" name="brand-name" class="form-control" placeholder="Enter your brand name"
                            required>
                    </div>
                    <div class="col-6 col-xl-4 px-2">
                        <label class="form-label">Website<span>*</span></label>
                        <input type="url" name="website" class="form-control" placeholder="Type here" required>
                    </div>
                    <div class="col-6 col-xl-4 px-2">
                        <label class="form-label">LinkedIn Links (optional)</label>
                        <input type="url" name="linkdin" class="form-control" placeholder="Type here">
                    </div>
                </div>

            </form>

        </div>
    </div>
    <div class="d-flex justify-content-end gap-3 mt-4 pe-4 me-3 steps-btn">
        <div class="btn-wrap">
            <button type="submit" class="btn simple-btn">Cancel</button>
        </div>
        <div class="btn-wrap">
            <button type="submit" class="btn btn-primary">Next</button>
        </div>
    </div>
@endsection
