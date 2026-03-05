@extends('superadmin.layouts.app')

@section('title', 'Edit Company')
@section('page-title', 'Edit Company')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">
                    Edit Company
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('superadmin.companies.update', $company->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Company Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $company->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Sector -->
                        <div class="mb-3">
                            <label class="form-label">Sector</label>
                            <select name="sector_id" class="form-select @error('sector_id') is-invalid @enderror" required>
                                <option value="">Select Sector</option>
                                @foreach ($sectors as $sector)
                                    <option value="{{ $sector->id }}" {{ old('sector_id', $company->sector_id) == $sector->id ? 'selected' : '' }}>
                                        {{ ucwords(str_replace('_', ' ', $sector->name)) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sector_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- PAN Number -->
                        <div class="mb-3">
                            <label class="form-label">PAN Number</label>
                            <input type="text" name="pan_number" class="form-control @error('pan_number') is-invalid @enderror"
                                   value="{{ old('pan_number', $company->pan_number) }}" required>
                            @error('pan_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- GST Number -->
                        <div class="mb-3">
                            <label class="form-label">GST Number</label>
                            <input type="text" name="gst_number" class="form-control @error('gst_number') is-invalid @enderror"
                                   value="{{ old('gst_number', $company->gst_number) }}">
                            @error('gst_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address', $company->address) }}</textarea>
                            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- City -->
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                                   value="{{ old('city', $company->city) }}">
                            @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- State -->
                        <div class="mb-3">
                            <label class="form-label">State</label>
                            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror"
                                   value="{{ old('state', $company->state) }}">
                            @error('state')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Pincode -->
                        <div class="mb-3">
                            <label class="form-label">Pincode</label>
                            <input type="text" name="pincode" class="form-control @error('pincode') is-invalid @enderror"
                                   value="{{ old('pincode', $company->pincode) }}">
                            @error('pincode')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Contact Person -->
                        <div class="mb-3">
                            <label class="form-label">Contact Person Name</label>
                            <input type="text" name="contact_person_name" class="form-control @error('contact_person_name') is-invalid @enderror"
                                   value="{{ old('contact_person_name', $company->contact_person_name) }}">
                            @error('contact_person_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Contact Email -->
                        <div class="mb-3">
                            <label class="form-label">Contact Email</label>
                            <input type="email" name="contact_email" class="form-control @error('contact_email') is-invalid @enderror"
                                   value="{{ old('contact_email', $company->contact_email) }}">
                            @error('contact_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Contact Mobile -->
                        <div class="mb-3">
                            <label class="form-label">Contact Mobile</label>
                            <input type="text" name="contact_mobile" class="form-control @error('contact_mobile') is-invalid @enderror"
                                   value="{{ old('contact_mobile', $company->contact_mobile) }}">
                            @error('contact_mobile')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="1" {{ old('status', $company->status) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $company->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('superadmin.companies.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Update Company</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
