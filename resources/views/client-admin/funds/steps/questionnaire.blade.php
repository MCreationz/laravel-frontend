@extends('client-admin.layouts.app')

@section('title', 'Funds')

@section('content')
    <div>
        <div class="step-section position-relative mb-3">
            <div class="bg-image position-absolute top-0 start-0 w-100 h-100">
                <img src="{{ asset('img/dasboard-bg.png') }}" class="img-fluid" alt="steps section" width="100%"
                    height="100%">
            </div>
            <div
                class="step-wrapper d-flex flex-wrap justify-content-center justify-content-sm-between align-items-center py-3 py-md-4 py-xl-5 px-2 row-gap-2">
                <div class="col-6 col-sm-4 step bold active position-relative done">
                    <div class="step-inner">
                        <div class="step-circle active d-flex justify-content-center align-items-center done">
                            <img src="{{ asset('img/checkmark.png') }}" class="object-fit-contain" alt="steps section"
                                width="15px" height="11px">
                        </div>
                        <p>Fund Detail Overview</p>
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
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                </div>
                <div class="col-6 col-sm-4 step bold active done">
                    <div class="step-inner">
                        <div class="step-circle active d-flex justify-content-center align-items-center active done">
                            <img src="{{ asset('img/checkmark.png') }}" class="object-fit-contain" alt="steps section"
                                width="15px" height="11px">
                        </div>
                        <p>Funding Snapshot</p>
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
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 step active">
                    <div class="step-circle active d-flex justify-content-center align-items-center active">
                        <img src="{{ asset('img/direction.png') }}" class="object-fit-contain" alt="steps section"
                            width="15px" height="11px">
                    </div>
                    <p>Questionnaire</p>
                </div>

            </div>
        </div>
    </div>


    <div class="card-box bg-white rounded">
        <div class="top-search-wrap p-3 mb-2">
            <div class="row justify-content-between align-items-center row-gap-2">
                <div class="col-auto">
                    <div class="mb-0 fw-bold table-heading">
                        Questions
                    </div>
                </div>
                <div
                    class="col-12 col-lg-10 top-fields d-flex gap-2 justify-content-md-end align-items-center flex-wrap flex-md-nowrap">

                    <!-- Search -->
                    <div class="search-bar input-group flex-nowrap position-relative" style="max-width: 273px;">

                        <input type="text" class="form-control search-input w-100" id="searchInput" placeholder="Search"
                            value="{{ request('search') }}">

                    </div>

                    <!-- Add Button -->
                    <button class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#clientAdminModal">
                        + Add Question
                    </button>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="first-col">Question:</th>
                        <th class="description-col">Question Description:</th>
                        <th class="second-col text-nowrap">Word Limit:</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Potter ipsum wand elf parchment wingardium. This.</td>
                        <td>Potter ipsum wand elf parchment wingardium. Floor owl lily headmaster floor wizard. Portkey
                            filch tart parchment scarlet the 20 spells dog.</td>
                        <td>150 Words</td>
                        <!-- Actions -->
                        <td class="action-btn">
                            <div class="btn-group gap-1">
                                <!-- Edit -->
                                <button type="button" class="edit-btn edit-client-admin">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">

                                        <path
                                            d="M8.8198 2.39503L3.35707 8.17714C3.1508 8.39671 2.95119 8.8292 2.91127 9.12862L2.66508 11.2844C2.57858 12.0629 3.1375 12.5952 3.90933 12.4621L6.05184 12.0962C6.35126 12.043 6.77044 11.8234 6.97671 11.5972L12.4394 5.81506C13.3843 4.81699 13.8101 3.6792 12.3396 2.28857C10.8758 0.911245 9.76463 1.39697 8.8198 2.39503Z"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />

                                        <path d="M7.91406 3.35938C8.20017 5.19581 9.69061 6.59975 11.5404 6.78605"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />

                                        <path d="M2 14.6387H13.9767" stroke="#07CCB5" stroke-width="1.2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />

                                    </svg>

                                </button>
                                <button type="submit" class="trash-btn">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15"
                                        viewBox="0 0 13 15" fill="none">
                                        <path
                                            d="M7.91403 5.09124L7.68381 11.0796M4.498 11.0796L4.26778 5.09124M8.58606 2.69123C9.3604 2.75118 10.1323 2.83929 10.9002 2.95538C11.1278 2.98998 11.354 3.02658 11.5802 3.06584M10.9002 2.95538L10.1896 12.1928C10.1606 12.5689 9.99071 12.9201 9.71388 13.1764C9.43706 13.4326 9.07371 13.5749 8.69651 13.5748H3.4853C3.10809 13.5749 2.74475 13.4326 2.46792 13.1764C2.1911 12.9201 2.0212 12.5689 1.9922 12.1928L1.28158 2.95538M1.28158 2.95538C1.05402 2.98932 0.82779 3.02591 0.601562 3.06517M1.28158 2.95538C2.04951 2.83929 2.82141 2.75118 3.59575 2.69123M8.58606 2.69123V2.08175C8.58606 1.2966 7.98057 0.641875 7.19543 0.617256C6.45927 0.593727 5.72254 0.593727 4.98638 0.617256C4.20124 0.641875 3.59575 1.29727 3.59575 2.08175V2.69123M8.58606 2.69123C6.9251 2.56286 5.25671 2.56286 3.59575 2.69123"
                                            stroke="#E74C3C" stroke-width="1.2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Potter ipsum wand elf parchment wingardium. This.</td>
                        <td>Potter ipsum wand elf parchment wingardium. Floor owl lily headmaster floor wizard. Portkey
                            filch tart parchment scarlet the 20 spells dog.</td>
                        <td>150 Words</td>
                        <!-- Actions -->
                        <td class="action-btn">
                            <div class="btn-group gap-1">
                                <!-- Edit -->
                                <button type="button" class="edit-btn edit-client-admin">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">

                                        <path
                                            d="M8.8198 2.39503L3.35707 8.17714C3.1508 8.39671 2.95119 8.8292 2.91127 9.12862L2.66508 11.2844C2.57858 12.0629 3.1375 12.5952 3.90933 12.4621L6.05184 12.0962C6.35126 12.043 6.77044 11.8234 6.97671 11.5972L12.4394 5.81506C13.3843 4.81699 13.8101 3.6792 12.3396 2.28857C10.8758 0.911245 9.76463 1.39697 8.8198 2.39503Z"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />

                                        <path d="M7.91406 3.35938C8.20017 5.19581 9.69061 6.59975 11.5404 6.78605"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />

                                        <path d="M2 14.6387H13.9767" stroke="#07CCB5" stroke-width="1.2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />

                                    </svg>

                                </button>
                                <button type="submit" class="trash-btn">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15"
                                        viewBox="0 0 13 15" fill="none">
                                        <path
                                            d="M7.91403 5.09124L7.68381 11.0796M4.498 11.0796L4.26778 5.09124M8.58606 2.69123C9.3604 2.75118 10.1323 2.83929 10.9002 2.95538C11.1278 2.98998 11.354 3.02658 11.5802 3.06584M10.9002 2.95538L10.1896 12.1928C10.1606 12.5689 9.99071 12.9201 9.71388 13.1764C9.43706 13.4326 9.07371 13.5749 8.69651 13.5748H3.4853C3.10809 13.5749 2.74475 13.4326 2.46792 13.1764C2.1911 12.9201 2.0212 12.5689 1.9922 12.1928L1.28158 2.95538M1.28158 2.95538C1.05402 2.98932 0.82779 3.02591 0.601562 3.06517M1.28158 2.95538C2.04951 2.83929 2.82141 2.75118 3.59575 2.69123M8.58606 2.69123V2.08175C8.58606 1.2966 7.98057 0.641875 7.19543 0.617256C6.45927 0.593727 5.72254 0.593727 4.98638 0.617256C4.20124 0.641875 3.59575 1.29727 3.59575 2.08175V2.69123M8.58606 2.69123C6.9251 2.56286 5.25671 2.56286 3.59575 2.69123"
                                            stroke="#E74C3C" stroke-width="1.2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Potter ipsum wand elf parchment wingardium. This.</td>
                        <td>Potter ipsum wand elf parchment wingardium. Floor owl lily headmaster floor wizard. Portkey
                            filch tart parchment scarlet the 20 spells dog.</td>
                        <td>150 Words</td>
                        <!-- Actions -->
                        <td class="action-btn">
                            <div class="btn-group gap-1">
                                <!-- Edit -->
                                <button type="button" class="edit-btn edit-client-admin">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">

                                        <path
                                            d="M8.8198 2.39503L3.35707 8.17714C3.1508 8.39671 2.95119 8.8292 2.91127 9.12862L2.66508 11.2844C2.57858 12.0629 3.1375 12.5952 3.90933 12.4621L6.05184 12.0962C6.35126 12.043 6.77044 11.8234 6.97671 11.5972L12.4394 5.81506C13.3843 4.81699 13.8101 3.6792 12.3396 2.28857C10.8758 0.911245 9.76463 1.39697 8.8198 2.39503Z"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />

                                        <path d="M7.91406 3.35938C8.20017 5.19581 9.69061 6.59975 11.5404 6.78605"
                                            stroke="#07CCB5" stroke-width="1.2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />

                                        <path d="M2 14.6387H13.9767" stroke="#07CCB5" stroke-width="1.2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />

                                    </svg>

                                </button>
                                <button type="submit" class="trash-btn">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15"
                                        viewBox="0 0 13 15" fill="none">
                                        <path
                                            d="M7.91403 5.09124L7.68381 11.0796M4.498 11.0796L4.26778 5.09124M8.58606 2.69123C9.3604 2.75118 10.1323 2.83929 10.9002 2.95538C11.1278 2.98998 11.354 3.02658 11.5802 3.06584M10.9002 2.95538L10.1896 12.1928C10.1606 12.5689 9.99071 12.9201 9.71388 13.1764C9.43706 13.4326 9.07371 13.5749 8.69651 13.5748H3.4853C3.10809 13.5749 2.74475 13.4326 2.46792 13.1764C2.1911 12.9201 2.0212 12.5689 1.9922 12.1928L1.28158 2.95538M1.28158 2.95538C1.05402 2.98932 0.82779 3.02591 0.601562 3.06517M1.28158 2.95538C2.04951 2.83929 2.82141 2.75118 3.59575 2.69123M8.58606 2.69123V2.08175C8.58606 1.2966 7.98057 0.641875 7.19543 0.617256C6.45927 0.593727 5.72254 0.593727 4.98638 0.617256C4.20124 0.641875 3.59575 1.29727 3.59575 2.08175V2.69123M8.58606 2.69123C6.9251 2.56286 5.25671 2.56286 3.59575 2.69123"
                                            stroke="#E74C3C" stroke-width="1.2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>

                    {{-- <tr>
                        <td colspan="8" class="text-center py-4">
                            No client admins found.
                        </td>
                    </tr> --}}


                </tbody>

            </table>
        </div>
    </div>

    <div class="modal fade" id="clientAdminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header border-0 pb-0">
                    <div>
                        <!-- MODAL TITLE -->
                        <h2 class="modal-title mb-2 inner-title" id="clientAdminModalTitle">
                            Add Questions
                        </h2>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <!-- Body -->
                <div class="modal-body p-0">
                    <form id="addQuestionForm" action="{{ route('superadmin.client-admins.store') }}" method="POST">
                        @csrf
                        <div class="p-3">
                            <input type="hidden" name="client_admin_id" id="client_admin_id">
                            <!-- Organization -->
                            <div class="row g-3 mb-3">
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Question:
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="question"
                                        name="question" placeholder="Write Question" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Question Description:
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="question"
                                        name="question" placeholder="Write Question Description" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Word Limit:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control py-2" id="question"
                                        name="question" placeholder="Write Question Description" required>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div style="border-radius:0px 0px 8px 8px;"
                            class="modal-footer border-0 d-flex justify-content-center justify-content-md-end gap-2 steps-btn pe-lg-4 flex-wrap">
                            <button type="button" class="btn simple-btn m-0" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="clientAdminSubmitBtn" class="btn gradient-btn m-0">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
