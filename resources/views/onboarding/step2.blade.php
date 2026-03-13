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
                                        <li data-value="Lucknow">Lucknow</li>
                                        <li data-value="Kanpur">Kanpur</li>
                                        <li data-value="Nagpur">Nagpur</li>
                                        <li data-value="Indore">Indore</li>
                                        <li data-value="Bhopal">Bhopal</li>
                                        <li data-value="Patna">Patna</li>
                                        <li data-value="Ludhiana">Ludhiana</li>
                                        <li data-value="Amritsar">Amritsar</li>
                                        <li data-value="Surat">Surat</li>
                                        <li data-value="Vadodara">Vadodara</li>
                                        <li data-value="Rajkot">Rajkot</li>
                                        <li data-value="Coimbatore">Coimbatore</li>
                                        <li data-value="Madurai">Madurai</li>
                                        <li data-value="Visakhapatnam">Visakhapatnam</li>
                                        <li data-value="Vijayawada">Vijayawada</li>
                                        <li data-value="Thiruvananthapuram">Thiruvananthapuram</li>
                                        <li data-value="Kochi">Kochi</li>
                                        <li data-value="Guwahati">Guwahati</li>
                                        <li data-value="Ranchi">Ranchi</li>
                                        <li data-value="Dehradun">Dehradun</li>
                                    </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 px-md-2">
                            <label class="form-label">District<span>*</span></label>
                            <div class="select-wrapper w-100 position-relative">
                                <div class="custom-select form-control">Select an option</div>
                                   <ul class="select-list">
                                        <!-- Punjab -->
                                        <li data-value="Amritsar">Amritsar</li>
                                        <li data-value="Ludhiana">Ludhiana</li>
                                        <li data-value="Patiala">Patiala</li>
                                        <li data-value="Jalandhar">Jalandhar</li>
                                        <li data-value="Sahibzada Ajit Singh Nagar">Sahibzada Ajit Singh Nagar (Mohali)</li>
                                        <li data-value="Bathinda">Bathinda</li>
                                        <li data-value="Firozpur">Firozpur</li>
                                        <li data-value="Hoshiarpur">Hoshiarpur</li>
                                        <li data-value="Kapurthala">Kapurthala</li>
                                        <li data-value="Moga">Moga</li>
                                        <li data-value="Faridkot">Faridkot</li>
                                        <li data-value="Sri Muktsar Sahib">Sri Muktsar Sahib</li>
                                        <li data-value="Gurdaspur">Gurdaspur</li>
                                        <li data-value="Pathankot">Pathankot</li>
                                        <li data-value="Tarn Taran">Tarn Taran</li>
                                        <li data-value="Barnala">Barnala</li>
                                        <li data-value="Mansa">Mansa</li>
                                        <li data-value="Sangrur">Sangrur</li>
                                        <li data-value="Fatehgarh Sahib">Fatehgarh Sahib</li>
                                        <li data-value="Rupnagar">Rupnagar</li>
                                        <li data-value="Shaheed Bhagat Singh Nagar">Shaheed Bhagat Singh Nagar</li>
                                        <li data-value="Malerkotla">Malerkotla</li>

                                        <!-- Haryana -->
                                        <li data-value="Ambala">Ambala</li>
                                        <li data-value="Bhiwani">Bhiwani</li>
                                        <li data-value="Charkhi Dadri">Charkhi Dadri</li>
                                        <li data-value="Faridabad">Faridabad</li>
                                        <li data-value="Fatehabad">Fatehabad</li>
                                        <li data-value="Gurugram">Gurugram</li>
                                        <li data-value="Hisar">Hisar</li>
                                        <li data-value="Jhajjar">Jhajjar</li>
                                        <li data-value="Jind">Jind</li>
                                        <li data-value="Kaithal">Kaithal</li>
                                        <li data-value="Karnal">Karnal</li>
                                        <li data-value="Kurukshetra">Kurukshetra</li>
                                        <li data-value="Mahendragarh">Mahendragarh</li>
                                        <li data-value="Nuh">Nuh</li>
                                        <li data-value="Palwal">Palwal</li>
                                        <li data-value="Panchkula">Panchkula</li>
                                        <li data-value="Panipat">Panipat</li>
                                        <li data-value="Rewari">Rewari</li>
                                        <li data-value="Rohtak">Rohtak</li>
                                        <li data-value="Sirsa">Sirsa</li>
                                        <li data-value="Sonipat">Sonipat</li>
                                        <li data-value="Yamunanagar">Yamunanagar</li>
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
                            <div class="col form-check">
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
                                        <li data-value="Lucknow">Lucknow</li>
                                        <li data-value="Kanpur">Kanpur</li>
                                        <li data-value="Nagpur">Nagpur</li>
                                        <li data-value="Indore">Indore</li>
                                        <li data-value="Bhopal">Bhopal</li>
                                        <li data-value="Patna">Patna</li>
                                        <li data-value="Ludhiana">Ludhiana</li>
                                        <li data-value="Amritsar">Amritsar</li>
                                        <li data-value="Surat">Surat</li>
                                        <li data-value="Vadodara">Vadodara</li>
                                        <li data-value="Rajkot">Rajkot</li>
                                        <li data-value="Coimbatore">Coimbatore</li>
                                        <li data-value="Madurai">Madurai</li>
                                        <li data-value="Visakhapatnam">Visakhapatnam</li>
                                        <li data-value="Vijayawada">Vijayawada</li>
                                        <li data-value="Thiruvananthapuram">Thiruvananthapuram</li>
                                        <li data-value="Kochi">Kochi</li>
                                        <li data-value="Guwahati">Guwahati</li>
                                        <li data-value="Ranchi">Ranchi</li>
                                        <li data-value="Dehradun">Dehradun</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-4 px-md-2">
                                <label class="form-label">District<span>*</span></label>
                                <div class="select-wrapper w-100 position-relative">
                                    <div class="custom-select form-control">Select an option</div>
                                    <ul class="select-list">
                                        <!-- Punjab -->
                                        <li data-value="Amritsar">Amritsar</li>
                                        <li data-value="Ludhiana">Ludhiana</li>
                                        <li data-value="Patiala">Patiala</li>
                                        <li data-value="Jalandhar">Jalandhar</li>
                                        <li data-value="Sahibzada Ajit Singh Nagar">Sahibzada Ajit Singh Nagar (Mohali)</li>
                                        <li data-value="Bathinda">Bathinda</li>
                                        <li data-value="Firozpur">Firozpur</li>
                                        <li data-value="Hoshiarpur">Hoshiarpur</li>
                                        <li data-value="Kapurthala">Kapurthala</li>
                                        <li data-value="Moga">Moga</li>
                                        <li data-value="Faridkot">Faridkot</li>
                                        <li data-value="Sri Muktsar Sahib">Sri Muktsar Sahib</li>
                                        <li data-value="Gurdaspur">Gurdaspur</li>
                                        <li data-value="Pathankot">Pathankot</li>
                                        <li data-value="Tarn Taran">Tarn Taran</li>
                                        <li data-value="Barnala">Barnala</li>
                                        <li data-value="Mansa">Mansa</li>
                                        <li data-value="Sangrur">Sangrur</li>
                                        <li data-value="Fatehgarh Sahib">Fatehgarh Sahib</li>
                                        <li data-value="Rupnagar">Rupnagar</li>
                                        <li data-value="Shaheed Bhagat Singh Nagar">Shaheed Bhagat Singh Nagar</li>
                                        <li data-value="Malerkotla">Malerkotla</li>

                                        <!-- Haryana -->
                                        <li data-value="Ambala">Ambala</li>
                                        <li data-value="Bhiwani">Bhiwani</li>
                                        <li data-value="Charkhi Dadri">Charkhi Dadri</li>
                                        <li data-value="Faridabad">Faridabad</li>
                                        <li data-value="Fatehabad">Fatehabad</li>
                                        <li data-value="Gurugram">Gurugram</li>
                                        <li data-value="Hisar">Hisar</li>
                                        <li data-value="Jhajjar">Jhajjar</li>
                                        <li data-value="Jind">Jind</li>
                                        <li data-value="Kaithal">Kaithal</li>
                                        <li data-value="Karnal">Karnal</li>
                                        <li data-value="Kurukshetra">Kurukshetra</li>
                                        <li data-value="Mahendragarh">Mahendragarh</li>
                                        <li data-value="Nuh">Nuh</li>
                                        <li data-value="Palwal">Palwal</li>
                                        <li data-value="Panchkula">Panchkula</li>
                                        <li data-value="Panipat">Panipat</li>
                                        <li data-value="Rewari">Rewari</li>
                                        <li data-value="Rohtak">Rohtak</li>
                                        <li data-value="Sirsa">Sirsa</li>
                                        <li data-value="Sonipat">Sonipat</li>
                                        <li data-value="Yamunanagar">Yamunanagar</li>
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
                                <input type="text" name="portal_pin_code" class="form-control" placeholder="Enter pin code">
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