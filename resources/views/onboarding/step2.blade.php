@extends('layouts.dashboard')

@section('content')
    <div class="card-body p-0">
        <form method="POST" action="{{ route('onboarding.step2.store') }}">
            @csrf
            <div class="card p-3 p-md-4 border-0 mb-3 rounded-3">
                <div class="mb-4">
                    <h1 class="top-heading mb-0">Office Address</h1>
                </div>
                <div class="row mb-3 flex-wrap row-gap-3 row-gap-md-4 px-md-1">
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">House / Flat / Floor / Door No<span>*</span></label>
                        <input type="text" name="office_house_floor_no" class="form-control" placeholder="Enter here"
                            required>
                    </div>

                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Address Line 1<span>*</span></label>
                        <input type="text" name="office_address_line_1" class="form-control" placeholder="Enter Address"
                            required>
                    </div>

                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Address Line 2<span>*</span></label>
                        <input type="text" name="office_address_line_2" class="form-control" placeholder="Enter Address">
                    </div>
                    <hr class="mb-0">

                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Town<span>*</span></label>
                        <input type="text" name="office_town" class="form-control" placeholder="Enter town" required>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">City<span>*</span></label>
                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control">Select an option</div>
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
                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">District<span>*</span></label>
                        <div class="select-wrapper w-100 position-relative">
                            <div class="custom-select form-control">Select an option</div>
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
                    <hr class="mb-0">

                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">State<span>*</span></label>
                        <input type="text" name="office_state" class="form-control" placeholder="Type here" required>
                    </div>

                    <div class="col-12 col-md-6 col-xl-4 px-md-2">
                        <label class="form-label">Pin Code<span>*</span></label>
                        <input type="text" name="office_pin_code" class="form-control" placeholder="Enter pin code"
                            required>
                    </div>
                </div>
            </div>
            <div class="card p-3 p-md-4 border-0 rounded-3">
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="col top-heading mb-0">Portal Address</h2>
                        <div class="col-auto form-check">
                            <input class="form-check-input" type="checkbox" name="is_portal_same_as_office"
                                id="sameAsOffice" value="1">
                            <label class="form-check-label" for="sameAsOffice">
                                Same as Office Address
                            </label>
                        </div>
                    </div>

                    <div id="portal-address-fields" class="row flex-wrap row-gap-4">

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">House/Flat/Floor/Door No<span>*</span></label>
                            <input type="text" name="portal_house_floor_no" class="form-control"
                                placeholder="Enter here">
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Address Line 1<span>*</span></label>
                            <input type="text" name="portal_address_line_1" class="form-control"
                                placeholder="Enter Address">
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Address Line 2<span>*</span></label>
                            <input type="text" name="portal_address_line_2" class="form-control"
                                placeholder="Enter Address">
                        </div>
                        <hr class="mb-0">
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Town<span>*</span></label>
                            <input type="text" name="portal_town" class="form-control" placeholder="Enter town">
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">City<span>*</span></label>

                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Select an option</div>
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
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">District<span>*</span></label>
                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Select an option</div>
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
                        <hr class="mb-0">
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">State<span>*</span></label>
                            <input type="text" name="portal_state" class="form-control" placeholder="Type here">
                        </div>

                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">Pin Code<span>*</span></label>
                            <input type="text" name="portal_pin_code" class="form-control"
                                placeholder="Enter pin code">
                        </div>

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

    <script>
        document.getElementById('sameAsOffice').addEventListener('change', function() {

            const fields = [
                ['office_house_floor_no', 'portal_house_floor_no'],
                ['office_address_line_1', 'portal_address_line_1'],
                ['office_address_line_2', 'portal_address_line_2'],
                ['office_town', 'portal_town'],
                ['office_city', 'portal_city'],
                ['office_district', 'portal_district'],
                ['office_state', 'portal_state'],
                ['office_pin_code', 'portal_pin_code']
            ];

            if (this.checked) {
                fields.forEach(pair => {
                    document.querySelector(`[name="${pair[1]}"]`).value =
                        document.querySelector(`[name="${pair[0]}"]`).value;
                });
            }
        });
    </script>
@endsection
