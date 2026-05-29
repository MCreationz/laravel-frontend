@extends('superadmin.layouts.app')

@section('title', 'Client Admin')

@section('content')
    <div class="card-box bg-white rounded">
        <div class="top-search-wrap p-3 mb-2">
            <div class="row justify-content-between align-items-center row-gap-2">
                <div class="col-auto">
                    <div class="mb-0 fw-bold table-heading">Client Admins</div>
                    <p class="text-muted mb-0">5 Organisations</p>
                </div>

                <div class="col-12 col-lg-10 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">
                    <div class="search-bar input-group flex-nowrap position-relative" style="max-width: 273px;">
                        <input type="text" class="form-control search-input w-100" placeholder="Search">
                    </div>
                    <div class="select-wrapper position-relative" style="max-width: 126px;">
                        <div class="custom-select form-control">
                            Type
                        </div>
                        <ul class="select-list" style="display: none;">
                            <li data-value="option">Option</li>
                        </ul>
                        <input type="hidden" name="registration_type" class="hidden-select" value="">
                    </div>

                    <div class="select-wrapper position-relative" style="max-width: 126px;">
                        <div class="custom-select form-control">
                            Status
                        </div>
                        <ul class="select-list" style="display: none;">
                            <li data-value="option">Option</li>
                        </ul>
                        <input type="hidden" name="status" class="hidden-select" value="">
                    </div>

                    <button class="btn btn-primary add-btn">
                        + Client Admin
                    </button>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="first-col">Organisation</th>
                        <th class="second-col text-center">Type</th>
                        <th class="third-col text-center">Contact</th>
                        <th>State</th>
                        <th class="text-center">Funds</th>
                        <th class="text-center">Outlay</th>
                        <th class="text-center">Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- Row -->
                    <tr>
                        <td class="">
                            <div class="d-flex align-items-center gap-2">
                                <div class="px-2 py-1 fw-bold gradient-text">HC</div>
                                <span class="fw-medium">Empowering Minds Initiative</span>
                            </div>
                        </td>
                        <td class="text-center text-nowrap">CVS Foundation</td>
                        <td class="text-center text-nowrap">
                            Ramesh Gupta <br>
                            <small class="text-muted">+91 441549878</small>
                        </td>
                        <td>Delhi</td>
                        <td class="text-center"><a href="#" class="text-decoration-none">2</a></td>
                        <td class="text-center text-nowrap">₹2.5 Cr</td>
                        <td class="text-center">
                            <span class="badge bg-success-subtle text-success">Verified</span>
                        </td>
                        <td class="action-btn">
                            <div class="btn-group gap-1">
                                <button class="view-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" viewBox="0 0 16 16" fill="none">
                                        <g clip-path="url(#clip0_4400_2140)">
                                            <path
                                                d="M1.35475 8.19903C1.30883 8.06102 1.30883 7.91184 1.35475 7.77383C2.27769 4.99704 4.89743 2.99414 7.98497 2.99414C11.0712 2.99414 13.6896 4.99505 14.6145 7.7705C14.6611 7.90824 14.6611 8.0573 14.6145 8.1957C13.6922 10.9725 11.0725 12.9754 7.98497 12.9754C4.89876 12.9754 2.27968 10.9745 1.35475 8.19903Z"
                                                stroke="#0160D6" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M9.98469 7.98453C9.98469 8.51397 9.77437 9.02172 9.4 9.39609C9.02563 9.77046 8.51788 9.98078 7.98844 9.98078C7.459 9.98078 6.95124 9.77046 6.57688 9.39609C6.20251 9.02172 5.99219 8.51397 5.99219 7.98453C5.99219 7.45509 6.20251 6.94734 6.57688 6.57297C6.95124 6.1986 7.459 5.98828 7.98844 5.98828C8.51788 5.98828 9.02563 6.1986 9.4 6.57297C9.77437 6.94734 9.98469 7.45509 9.98469 7.98453Z"
                                                stroke="#0160D6" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_4400_2140">
                                                <rect width="15.97" height="15.97" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg></button>
                                <button class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M8.8198 2.39503L3.35707 8.17714C3.1508 8.39671 2.95119 8.8292 2.91127 9.12862L2.66508 11.2844C2.57858 12.0629 3.1375 12.5952 3.90933 12.4621L6.05184 12.0962C6.35126 12.043 6.77044 11.8234 6.97671 11.5972L12.4394 5.81506C13.3843 4.81699 13.8101 3.6792 12.3396 2.28857C10.8758 0.911245 9.76463 1.39697 8.8198 2.39503Z"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.91406 3.35938C8.20017 5.19581 9.69061 6.59975 11.5404 6.78605"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 14.6387H13.9767" stroke="#07CCB5" stroke-width="1.2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></button>
                                <button class="trash-btn"><svg xmlns="http://www.w3.org/2000/svg" width="13"
                                        height="15" viewBox="0 0 13 15" fill="none">
                                        <path
                                            d="M7.91403 5.09124L7.68381 11.0796M4.498 11.0796L4.26778 5.09124M8.58606 2.69123C9.3604 2.75118 10.1323 2.83929 10.9002 2.95538C11.1278 2.98998 11.354 3.02658 11.5802 3.06584M10.9002 2.95538L10.1896 12.1928C10.1606 12.5689 9.99071 12.9201 9.71388 13.1764C9.43706 13.4326 9.07371 13.5749 8.69651 13.5748H3.4853C3.10809 13.5749 2.74475 13.4326 2.46792 13.1764C2.1911 12.9201 2.0212 12.5689 1.9922 12.1928L1.28158 2.95538M1.28158 2.95538C1.05402 2.98932 0.82779 3.02591 0.601562 3.06517M1.28158 2.95538C2.04951 2.83929 2.82141 2.75118 3.59575 2.69123M8.58606 2.69123V2.08175C8.58606 1.2966 7.98057 0.641875 7.19543 0.617256C6.45927 0.593727 5.72254 0.593727 4.98638 0.617256C4.20124 0.641875 3.59575 1.29727 3.59575 2.08175V2.69123M8.58606 2.69123C6.9251 2.56286 5.25671 2.56286 3.59575 2.69123"
                                            stroke="#E74C3C" stroke-width="1.2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row -->
                    <tr>
                        <td class="">
                            <div class="d-flex align-items-center gap-2">
                                <div class="px-2 py-1 fw-bold gradient-text">HC</div>
                                <span class="fw-medium">Empowering Minds Initiative</span>
                            </div>
                        </td>
                        <td class="text-center text-nowrap">CVS Foundation</td>
                        <td class="text-center text-nowrap">
                            Ramesh Gupta <br>
                            <small class="text-muted">+91 441549878</small>
                        </td>
                        <td>Delhi</td>
                        <td class="text-center"><a href="#" class="text-decoration-none">2</a></td>
                        <td class="text-center text-nowrap">₹2.5 Cr</td>
                        <td class="text-center">
                            <span class="badge bg-success-subtle text-success">Verified</span>
                        </td>
                        <td class="action-btn">
                            <div class="btn-group gap-1">
                                <button class="view-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" viewBox="0 0 16 16" fill="none">
                                        <g clip-path="url(#clip0_4400_2140)">
                                            <path
                                                d="M1.35475 8.19903C1.30883 8.06102 1.30883 7.91184 1.35475 7.77383C2.27769 4.99704 4.89743 2.99414 7.98497 2.99414C11.0712 2.99414 13.6896 4.99505 14.6145 7.7705C14.6611 7.90824 14.6611 8.0573 14.6145 8.1957C13.6922 10.9725 11.0725 12.9754 7.98497 12.9754C4.89876 12.9754 2.27968 10.9745 1.35475 8.19903Z"
                                                stroke="#0160D6" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M9.98469 7.98453C9.98469 8.51397 9.77437 9.02172 9.4 9.39609C9.02563 9.77046 8.51788 9.98078 7.98844 9.98078C7.459 9.98078 6.95124 9.77046 6.57688 9.39609C6.20251 9.02172 5.99219 8.51397 5.99219 7.98453C5.99219 7.45509 6.20251 6.94734 6.57688 6.57297C6.95124 6.1986 7.459 5.98828 7.98844 5.98828C8.51788 5.98828 9.02563 6.1986 9.4 6.57297C9.77437 6.94734 9.98469 7.45509 9.98469 7.98453Z"
                                                stroke="#0160D6" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_4400_2140">
                                                <rect width="15.97" height="15.97" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg></button>
                                <button class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M8.8198 2.39503L3.35707 8.17714C3.1508 8.39671 2.95119 8.8292 2.91127 9.12862L2.66508 11.2844C2.57858 12.0629 3.1375 12.5952 3.90933 12.4621L6.05184 12.0962C6.35126 12.043 6.77044 11.8234 6.97671 11.5972L12.4394 5.81506C13.3843 4.81699 13.8101 3.6792 12.3396 2.28857C10.8758 0.911245 9.76463 1.39697 8.8198 2.39503Z"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.91406 3.35938C8.20017 5.19581 9.69061 6.59975 11.5404 6.78605"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 14.6387H13.9767" stroke="#07CCB5" stroke-width="1.2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></button>
                                <button class="trash-btn"><svg xmlns="http://www.w3.org/2000/svg" width="13"
                                        height="15" viewBox="0 0 13 15" fill="none">
                                        <path
                                            d="M7.91403 5.09124L7.68381 11.0796M4.498 11.0796L4.26778 5.09124M8.58606 2.69123C9.3604 2.75118 10.1323 2.83929 10.9002 2.95538C11.1278 2.98998 11.354 3.02658 11.5802 3.06584M10.9002 2.95538L10.1896 12.1928C10.1606 12.5689 9.99071 12.9201 9.71388 13.1764C9.43706 13.4326 9.07371 13.5749 8.69651 13.5748H3.4853C3.10809 13.5749 2.74475 13.4326 2.46792 13.1764C2.1911 12.9201 2.0212 12.5689 1.9922 12.1928L1.28158 2.95538M1.28158 2.95538C1.05402 2.98932 0.82779 3.02591 0.601562 3.06517M1.28158 2.95538C2.04951 2.83929 2.82141 2.75118 3.59575 2.69123M8.58606 2.69123V2.08175C8.58606 1.2966 7.98057 0.641875 7.19543 0.617256C6.45927 0.593727 5.72254 0.593727 4.98638 0.617256C4.20124 0.641875 3.59575 1.29727 3.59575 2.08175V2.69123M8.58606 2.69123C6.9251 2.56286 5.25671 2.56286 3.59575 2.69123"
                                            stroke="#E74C3C" stroke-width="1.2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row -->
                    <tr>
                        <td class="">
                            <div class="d-flex align-items-center gap-2">
                                <div class="px-2 py-1 fw-bold gradient-text">HC</div>
                                <span class="fw-medium">Empowering Minds Initiative</span>
                            </div>
                        </td>
                        <td class="text-center text-nowrap">CVS Foundation</td>
                        <td class="text-center text-nowrap">
                            Ramesh Gupta <br>
                            <small class="text-muted">+91 441549878</small>
                        </td>
                        <td>Delhi</td>
                        <td class="text-center"><a href="#" class="text-decoration-none">2</a></td>
                        <td class="text-center text-nowrap">₹2.5 Cr</td>
                        <td class="text-center">
                            <span class="badge bg-success-subtle text-success">Verified</span>
                        </td>
                        <td class="action-btn">
                            <div class="btn-group gap-1">
                                <button class="view-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" viewBox="0 0 16 16" fill="none">
                                        <g clip-path="url(#clip0_4400_2140)">
                                            <path
                                                d="M1.35475 8.19903C1.30883 8.06102 1.30883 7.91184 1.35475 7.77383C2.27769 4.99704 4.89743 2.99414 7.98497 2.99414C11.0712 2.99414 13.6896 4.99505 14.6145 7.7705C14.6611 7.90824 14.6611 8.0573 14.6145 8.1957C13.6922 10.9725 11.0725 12.9754 7.98497 12.9754C4.89876 12.9754 2.27968 10.9745 1.35475 8.19903Z"
                                                stroke="#0160D6" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M9.98469 7.98453C9.98469 8.51397 9.77437 9.02172 9.4 9.39609C9.02563 9.77046 8.51788 9.98078 7.98844 9.98078C7.459 9.98078 6.95124 9.77046 6.57688 9.39609C6.20251 9.02172 5.99219 8.51397 5.99219 7.98453C5.99219 7.45509 6.20251 6.94734 6.57688 6.57297C6.95124 6.1986 7.459 5.98828 7.98844 5.98828C8.51788 5.98828 9.02563 6.1986 9.4 6.57297C9.77437 6.94734 9.98469 7.45509 9.98469 7.98453Z"
                                                stroke="#0160D6" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_4400_2140">
                                                <rect width="15.97" height="15.97" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg></button>
                                <button class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M8.8198 2.39503L3.35707 8.17714C3.1508 8.39671 2.95119 8.8292 2.91127 9.12862L2.66508 11.2844C2.57858 12.0629 3.1375 12.5952 3.90933 12.4621L6.05184 12.0962C6.35126 12.043 6.77044 11.8234 6.97671 11.5972L12.4394 5.81506C13.3843 4.81699 13.8101 3.6792 12.3396 2.28857C10.8758 0.911245 9.76463 1.39697 8.8198 2.39503Z"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.91406 3.35938C8.20017 5.19581 9.69061 6.59975 11.5404 6.78605"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 14.6387H13.9767" stroke="#07CCB5" stroke-width="1.2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></button>
                                <button class="trash-btn"><svg xmlns="http://www.w3.org/2000/svg" width="13"
                                        height="15" viewBox="0 0 13 15" fill="none">
                                        <path
                                            d="M7.91403 5.09124L7.68381 11.0796M4.498 11.0796L4.26778 5.09124M8.58606 2.69123C9.3604 2.75118 10.1323 2.83929 10.9002 2.95538C11.1278 2.98998 11.354 3.02658 11.5802 3.06584M10.9002 2.95538L10.1896 12.1928C10.1606 12.5689 9.99071 12.9201 9.71388 13.1764C9.43706 13.4326 9.07371 13.5749 8.69651 13.5748H3.4853C3.10809 13.5749 2.74475 13.4326 2.46792 13.1764C2.1911 12.9201 2.0212 12.5689 1.9922 12.1928L1.28158 2.95538M1.28158 2.95538C1.05402 2.98932 0.82779 3.02591 0.601562 3.06517M1.28158 2.95538C2.04951 2.83929 2.82141 2.75118 3.59575 2.69123M8.58606 2.69123V2.08175C8.58606 1.2966 7.98057 0.641875 7.19543 0.617256C6.45927 0.593727 5.72254 0.593727 4.98638 0.617256C4.20124 0.641875 3.59575 1.29727 3.59575 2.08175V2.69123M8.58606 2.69123C6.9251 2.56286 5.25671 2.56286 3.59575 2.69123"
                                            stroke="#E74C3C" stroke-width="1.2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg></button>
                            </div>
                        </td>
                    </tr>
                    <!-- Row -->
                    <tr>
                        <td class="">
                            <div class="d-flex align-items-center gap-2">
                                <div class="px-2 py-1 fw-bold gradient-text">HC</div>
                                <span class="fw-medium">Empowering Minds Initiative</span>
                            </div>
                        </td>
                        <td class="text-center text-nowrap">CVS Foundation</td>
                        <td class="text-center text-nowrap">
                            Ramesh Gupta <br>
                            <small class="text-muted">+91 441549878</small>
                        </td>
                        <td>Delhi</td>
                        <td class="text-center"><a href="#" class="text-decoration-none">2</a></td>
                        <td class="text-center text-nowrap">₹2.5 Cr</td>
                        <td class="text-center">
                            <span class="badge bg-success-subtle text-success">Verified</span>
                        </td>
                        <td class="action-btn">
                            <div class="btn-group gap-1">
                                <button class="view-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" viewBox="0 0 16 16" fill="none">
                                        <g clip-path="url(#clip0_4400_2140)">
                                            <path
                                                d="M1.35475 8.19903C1.30883 8.06102 1.30883 7.91184 1.35475 7.77383C2.27769 4.99704 4.89743 2.99414 7.98497 2.99414C11.0712 2.99414 13.6896 4.99505 14.6145 7.7705C14.6611 7.90824 14.6611 8.0573 14.6145 8.1957C13.6922 10.9725 11.0725 12.9754 7.98497 12.9754C4.89876 12.9754 2.27968 10.9745 1.35475 8.19903Z"
                                                stroke="#0160D6" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M9.98469 7.98453C9.98469 8.51397 9.77437 9.02172 9.4 9.39609C9.02563 9.77046 8.51788 9.98078 7.98844 9.98078C7.459 9.98078 6.95124 9.77046 6.57688 9.39609C6.20251 9.02172 5.99219 8.51397 5.99219 7.98453C5.99219 7.45509 6.20251 6.94734 6.57688 6.57297C6.95124 6.1986 7.459 5.98828 7.98844 5.98828C8.51788 5.98828 9.02563 6.1986 9.4 6.57297C9.77437 6.94734 9.98469 7.45509 9.98469 7.98453Z"
                                                stroke="#0160D6" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_4400_2140">
                                                <rect width="15.97" height="15.97" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg></button>
                                <button class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" viewBox="0 0 16 16" fill="none">
                                        <path
                                            d="M8.8198 2.39503L3.35707 8.17714C3.1508 8.39671 2.95119 8.8292 2.91127 9.12862L2.66508 11.2844C2.57858 12.0629 3.1375 12.5952 3.90933 12.4621L6.05184 12.0962C6.35126 12.043 6.77044 11.8234 6.97671 11.5972L12.4394 5.81506C13.3843 4.81699 13.8101 3.6792 12.3396 2.28857C10.8758 0.911245 9.76463 1.39697 8.8198 2.39503Z"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.91406 3.35938C8.20017 5.19581 9.69061 6.59975 11.5404 6.78605"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 14.6387H13.9767" stroke="#07CCB5" stroke-width="1.2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></button>
                                <button class="trash-btn"><svg xmlns="http://www.w3.org/2000/svg" width="13"
                                        height="15" viewBox="0 0 13 15" fill="none">
                                        <path
                                            d="M7.91403 5.09124L7.68381 11.0796M4.498 11.0796L4.26778 5.09124M8.58606 2.69123C9.3604 2.75118 10.1323 2.83929 10.9002 2.95538C11.1278 2.98998 11.354 3.02658 11.5802 3.06584M10.9002 2.95538L10.1896 12.1928C10.1606 12.5689 9.99071 12.9201 9.71388 13.1764C9.43706 13.4326 9.07371 13.5749 8.69651 13.5748H3.4853C3.10809 13.5749 2.74475 13.4326 2.46792 13.1764C2.1911 12.9201 2.0212 12.5689 1.9922 12.1928L1.28158 2.95538M1.28158 2.95538C1.05402 2.98932 0.82779 3.02591 0.601562 3.06517M1.28158 2.95538C2.04951 2.83929 2.82141 2.75118 3.59575 2.69123M8.58606 2.69123V2.08175C8.58606 1.2966 7.98057 0.641875 7.19543 0.617256C6.45927 0.593727 5.72254 0.593727 4.98638 0.617256C4.20124 0.641875 3.59575 1.29727 3.59575 2.08175V2.69123M8.58606 2.69123C6.9251 2.56286 5.25671 2.56286 3.59575 2.69123"
                                            stroke="#E74C3C" stroke-width="1.2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
