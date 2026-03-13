@extends('layouts.dashboard')

@section('content')
    <div class="card-body p-0">
        <form method="POST" action="{{ route('onboarding.step2.store') }}">
            @csrf
            <div class="card p-3 p-md-4 border-0 mb-3 rounded-3">
                <div class="mb-4">
                    <h1 class="top-heading mb-0">Organization type</h1>
                </div>
                <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Are you a:<span>*</span></label>

                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control @error('role') is-invalid @enderror">
                                {{ old('role') ? ucfirst(str_replace('_', ' ', old('role'))) : 'Select an option' }}
                            </div>

                            <ul class="select-list">
                                <li data-value="funder">Non-profit Organization</li>
                                <li data-value="funder">Non-profit Organization</li>
                                <li data-value="funder">Non-profit Organization</li>
                            </ul>

                            <input type="hidden" name="role" class="hidden-select" value="{{ old('role') }}">
                        </div>

                        @error('role')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">State<span>*</span></label>
                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control">Select State</div>
                            <ul class="select-list">
                                <li data-value="Delhi">Delhi</li>
                                <li data-value="Mumbai">Mumbai</li>
                                <li data-value="Bengaluru">Bengaluru</li>
                                <li data-value="Hyderabad">Hyderabad</li>
                                <li data-value="Chennai">Chennai</li>
                                <li data-value="Kolkata">Kolkata</li>
                                <li data-value="Pune">Pune</li>
                                <li data-value="Ahmedabad">Ahmedabad</li>
                                <li data-value="Jaipur">Jaipur</li>
                                <li data-value="Chandigarh">Chandigarh</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                {{--  --}}
                <div class="inner-fields mt-4">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Non-profit Organization</h2>
                    </div>
                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 col-xl-5 px-md-2">
                            <label class="form-label">Registration Type<span>*</span></label>

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control @error('role') is-invalid @enderror">
                                    {{ old('role') ? ucfirst(str_replace('_', ' ', old('role'))) : 'Select' }}
                                </div>

                                <ul class="select-list">
                                    <li data-value="funder">Non-profit Organization</li>
                                    <li data-value="funder">Non-profit Organization</li>
                                    <li data-value="funder">Non-profit Organization</li>
                                </ul>

                                <input type="hidden" name="role" class="hidden-select" value="{{ old('role') }}">
                            </div>

                            @error('role')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 col-xl-5 px-md-2">
                            <label class="form-label">Domain of Expertise<span>*</span></label>
                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Select</div>
                                <ul class="select-list">
                                    <li data-value="Delhi">Delhi</li>
                                    <li data-value="Mumbai">Mumbai</li>
                                    <li data-value="Bengaluru">Bengaluru</li>
                                    <li data-value="Hyderabad">Hyderabad</li>
                                    <li data-value="Chennai">Chennai</li>
                                    <li data-value="Kolkata">Kolkata</li>
                                    <li data-value="Pune">Pune</li>
                                    <li data-value="Ahmedabad">Ahmedabad</li>
                                    <li data-value="Jaipur">Jaipur</li>
                                    <li data-value="Chandigarh">Chandigarh</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                {{--  --}}
                <div class="inner-fields mt-4">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Track Record</h2>
                    </div>
                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Years of Operation<span>*</span></label>
                            <input type="date" name="year_of_operation" class="form-control"
                                placeholder="Enter in months " required>
                        </div>
                        <div class="col-12 col-md-6 px-md-2">
                            <label class="form-label">Total Beneficiaries Served<span>*</span></label>
                            <input type="text" name="Total_Beneficiaries" class="form-control"
                                placeholder="Only numbers shall be taken as input..." required>
                        </div>
                        <div class="col-12 px-md-2">
                            <div class="textarea-label d-flex justify-content-between gap-1">
                                <label class="form-label ">Key Achievements<span>*</span> </label>
                                <p class="font-small">Word Limit: 100</p>
                            </div>

                            <textarea maxlength="500" rows="5" cols="50" class="form-control" placeholder="Enter Achievements"></textarea>
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                {{--  --}}
                <div class="inner-fields mt-4 small-label">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Financial Record</h2>
                    </div>
                    <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Lifetime Turnover since Incorporation (₹ Lakh)<span>*</span></label>
                            <input type="number" name="Incorporation" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Ongoing Year Turnover (till last month) (₹
                                Lakh)<span>*</span></label>
                            <input type="number" name="Year_Turnover" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Last Year Turnover (₹ Lakh)<span>*</span></label>
                            <input type="number" name="Total_Beneficiaries" class="form-control"
                                placeholder="Enter Amount" required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Last to Last Year Turnover (₹ Lakh)<span>*</span></label>
                            <input type="number" name="Last_Year_Turnover" class="form-control"
                                placeholder="Enter Amount" required>
                        </div>
                    </div>
                </div>

            </div>
            {{-- second card --}}
            <div class="card p-3 p-md-4 border-0 rounded-3">
                <div class="inner-fields mt-md-4 small-label">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Donation summary</h2>
                    </div>
                    <div class="row mb-md-2 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Government Grants Received<span>*</span></label>
                            <input type="number" name="Government" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Foreign Donation Received (Institutional only)<span>*</span></label>
                            <input type="number" name="Foreign" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Promoters Money Donated<span>*</span></label>
                            <input type="number" name="Promoters" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 px-md-2">
                            <label class="form-label">Individual Donation<span>*</span></label>
                            <input type="number" name="Individual" class="form-control" placeholder="Enter Amount"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row two-col-text justify-content-md-between align-items-center mt-4 mb-2">
                    <div class="col-12 col-md-6 text-center text-md-start">
                        <p class="mb-0">Total Funding Received Till Date (₹ Lakh)</p>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-end">
                        <p>0000.00 Lakh</p>
                    </div>
                </div>
            </div>

            {{-- third card --}}
            <div class="card p-3 p-md-4 border-0 rounded-3">
                <div class="inner-fields mt-md-4">
                    <div class="mb-4">
                        <h2 class="inner-title mb-0">Major Institutional Funders</h2>
                    </div>
                     <div class="btn-wrap">
                    <button type="submit" class="btn btn-primary">Next</button>
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
@endsection
