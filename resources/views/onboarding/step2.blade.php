@extends('layouts.dashboard')

@section('content')
    <div class="card p-4">
        <div class="mb-4">
            <h2>Organization Address</h2>
        </div>
        <div class="card-body p-0">
            <form method="POST" action="{{ route('onboarding.step2.store') }}">
                @csrf

                <div class="mb-5">
                    <h5 class="fw-bold mb-3">Office Address</h5>
                    <div class="row flex-wrap row-gap-4">

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">House/Flat/Floor/Door No<span>*</span></label>
                            <input type="text" name="office_house_floor_no" class="form-control" placeholder="Enter here"
                                required>
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">Address Line 1<span>*</span></label>
                            <input type="text" name="office_address_line_1" class="form-control" placeholder="Enter Address"
                                required>
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">Address Line 2<span>*</span></label>
                            <input type="text" name="office_address_line_2" class="form-control"
                                placeholder="Enter Address">
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">Town<span>*</span></label>
                            <input type="text" name="office_town" class="form-control" placeholder="Enter town" required>
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">City<span>*</span></label>
                            <select name="office_city" class="form-select form-control" required>
                                <option value="">Select an option</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Bengaluru">Bengaluru</option>
                                <option value="Hyderabad">Hyderabad</option>
                                <option value="Chennai">Chennai</option>
                                <option value="Kolkata">Kolkata</option>
                                <option value="Pune">Pune</option>
                                <option value="Ahmedabad">Ahmedabad</option>
                                <option value="Jaipur">Jaipur</option>
                                <option value="Chandigarh">Chandigarh</option>
                            </select>
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">District<span>*</span></label>
                            <select name="office_district" class="form-select form-control" required>
                                <option value="">Select an option</option>
                                <option value="New Delhi">New Delhi</option>
                                <option value="Mumbai Suburban">Mumbai Suburban</option>
                                <option value="Bangalore Urban">Bangalore Urban</option>
                                <option value="Hyderabad">Hyderabad</option>
                                <option value="Chennai">Chennai</option>
                                <option value="Kolkata">Kolkata</option>
                                <option value="Pune">Pune</option>
                                <option value="Ahmedabad">Ahmedabad</option>
                                <option value="Jaipur">Jaipur</option>
                                <option value="Chandigarh">Chandigarh</option>
                            </select>
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">State<span>*</span></label>
                            <input type="text" name="office_state" class="form-control" placeholder="Type here" required>
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">Pin Code<span>*</span></label>
                            <input type="text" name="office_pin_code" class="form-control" placeholder="Enter pin code"
                                required>
                        </div>

                    </div>
                </div>

                <hr class="my-5">

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold m-0">Portal Address</h5>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_portal_same_as_office"
                                id="sameAsOffice" value="1">
                            <label class="form-check-label" for="sameAsOffice">
                                Same as Office Address
                            </label>
                        </div>
                    </div>

                    <div id="portal-address-fields" class="row flex-wrap row-gap-4">

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">House/Flat/Floor/Door No<span>*</span></label>
                            <input type="text" name="portal_house_floor_no" class="form-control" placeholder="Enter here">
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">Address Line 1<span>*</span></label>
                            <input type="text" name="portal_address_line_1" class="form-control"
                                placeholder="Enter Address">
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">Address Line 2<span>*</span></label>
                            <input type="text" name="portal_address_line_2" class="form-control"
                                placeholder="Enter Address">
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">Town<span>*</span></label>
                            <input type="text" name="portal_town" class="form-control" placeholder="Enter town">
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">City<span>*</span></label>
                            <select name="portal_city" class="form-select form-control">
                                <option value="">Select an option</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Bengaluru">Bengaluru</option>
                                <option value="Hyderabad">Hyderabad</option>
                                <option value="Chennai">Chennai</option>
                                <option value="Kolkata">Kolkata</option>
                                <option value="Pune">Pune</option>
                                <option value="Ahmedabad">Ahmedabad</option>
                                <option value="Jaipur">Jaipur</option>
                                <option value="Chandigarh">Chandigarh</option>
                            </select>
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">District<span>*</span></label>
                            <select name="portal_district" class="form-select form-control">
                                <option value="">Select an option</option>
                                <option value="New Delhi">New Delhi</option>
                                <option value="Mumbai Suburban">Mumbai Suburban</option>
                                <option value="Bangalore Urban">Bangalore Urban</option>
                                <option value="Hyderabad">Hyderabad</option>
                                <option value="Chennai">Chennai</option>
                                <option value="Kolkata">Kolkata</option>
                                <option value="Pune">Pune</option>
                                <option value="Ahmedabad">Ahmedabad</option>
                                <option value="Jaipur">Jaipur</option>
                                <option value="Chandigarh">Chandigarh</option>
                            </select>
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">State<span>*</span></label>
                            <input type="text" name="portal_state" class="form-control" placeholder="Type here">
                        </div>

                        <div class="col-6 col-xl-4 px-2">
                            <label class="form-label">Pin Code<span>*</span></label>
                            <input type="text" name="portal_pin_code" class="form-control" placeholder="Enter pin code">
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-5 pe-4 me-3 steps-btn">
                    <div class="btn-wrap">
                        <button type="button" class="btn simple-btn">Cancel</button>
                    </div>
                    <div class="btn-wrap">
                        <button type="submit" class="btn btn-primary px-4">Next</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.getElementById('sameAsOffice').addEventListener('change', function () {

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