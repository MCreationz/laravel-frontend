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
                <tbody id="questionTableBody">




                </tbody>

            </table>
        </div>
    </div>
    <div style="border-radius:0px 0px 8px 8px;"
        class="d-flex justify-content-center justify-content-md-end gap-2 gap-md-3 mt-4 steps-btn pe-lg-4 flex-wrap">
        <div class="btn-wrap">
            <button type="button" class="btn btn-secondary"
                onclick="window.location.href='{{ route('client-admin.funds.funding-snapshot') }}'">
                Back
            </button>
            <button type="button" class="btn btn-primary"
                onclick="window.location.href='{{ route('client-admin.funds.index') }}'">
                Continue
            </button>
        </div>
    </div>



    <div class="modal fade" id="clientAdminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h2 class="modal-title mb-2 inner-title" id="clientAdminModalTitle">
                            Add Questions
                        </h2>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body -->
                <div class="modal-body p-0">

                    <form id="addQuestionForm">

                        <div class="p-3">

                            <!-- FUND ID -->
                            <input type="hidden" name="fund_id" id="fund_id" value="{{ $fundId ?? '' }}">

                            <div class="row g-3 mb-3">

                                <!-- Question -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Question:
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="question" name="question"
                                        placeholder="Write Question" required>
                                </div>

                                <!-- Description -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Question Description:
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="text" class="form-control py-2" id="description" name="description"
                                        placeholder="Write Question Description" required>
                                </div>

                                <!-- Word Limit -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Word Limit:
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input type="number" class="form-control py-2" id="word_limit" name="word_limit"
                                        placeholder="Enter Word Limit" required>
                                </div>

                            </div>
                        </div>

                        <!-- Footer -->
                        <div style="border-radius:0px 0px 8px 8px;"
                            class="modal-footer border-0 d-flex justify-content-center justify-content-md-end gap-2 steps-btn pe-lg-4 flex-wrap">

                            <button type="button" class="btn btn-secondary m-0" data-bs-dismiss="modal">
                                Cancel
                            </button>

                            <button type="submit" id="" class="btn btn-primary m-0">
                                Submit
                            </button>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const searchInput = document.getElementById('searchInput');

            let searchTimer;

            searchInput.addEventListener('keyup', function () {

                clearTimeout(searchTimer);

                searchTimer = setTimeout(() => {
                    loadQuestions();
                }, 300);

            });

            const form = document.getElementById('addQuestionForm');
            const tableBody = document.getElementById('questionTableBody');

            let editId = null;

            // ROUTES (Blade generated)
            const routes = {
                index: "{{ route('client-admin.fund-questionnaires.index') }}",
                store: "{{ route('client-admin.fund-questionnaires.store') }}",
                edit: (id) => `/client-admin/fund-questionnaires/edit/${id}`,
                update: (id) => `/client-admin/fund-questionnaires/update/${id}`,
                delete: (id) => `/client-admin/fund-questionnaires/delete/${id}`,
            };

            // LOAD QUESTIONS
            function loadQuestions() {

                const fundId = document.getElementById('fund_id').value;
                const search = document.getElementById('searchInput').value;

                fetch(
                    `${routes.index}?fund_id=${fundId}&search=${encodeURIComponent(search)}`
                )
                    .then(res => res.json())
                    .then(res => {

                        tableBody.innerHTML = '';

                        res.data.forEach(item => {
                            tableBody.innerHTML += `
                                    <tr>
                                        <td>${item.question}</td>
                                        <td>${item.description ?? '-'}</td>
                                        <td>${item.word_limit}</td>
                                        <td>
                                            <div class="action-btn d-flex align-items-center gap-2">
                                                <a href="javascript:void(0)" class="edit-btn"
                                                   onclick="editQuestion(${item.id})"
                                                   title="Edit">
                                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                        <path d="M8.8 2.4L3.3 8.2C3.1 8.4 2.9 8.8 2.9 9.1L2.7 11.3C2.6 12.1 3.1 12.6 3.9 12.5L6.1 12.1C6.3 12 6.8 11.8 7 11.6L12.4 5.8C13.4 4.8 13.8 3.7 12.3 2.3C10.9 0.9 9.8 1.4 8.8 2.4Z" stroke="#07CCB5" stroke-width="1.2"></path>
                                                    </svg>
                                                </a>

                                                <a href="javascript:void(0)" class="trash-btn"
                                                   onclick="deleteQuestion(${item.id})"
                                                   title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                                                            <path d="M1.3 3L2 12.2C2.1 13 2.7 13.6 3.5 13.6H8.7C9.5 13.6 10.1 13 10.2 12.2L10.9 3" stroke="#E74C3C" stroke-width="1.2"></path>
                                                            <path d="M0.6 3.1C4 2.5 8.2 2.5 11.6 3.1" stroke="#E74C3C" stroke-width="1.2"></path>
                                                        </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                `;
                        });

                    });
            }

            loadQuestions();

            // CREATE / UPDATE SUBMIT
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(form);

                let url = routes.store;
                let method = 'POST';

                if (editId) {
                    url = routes.update(editId);
                    formData.append('_method', 'PUT');
                }

                fetch(url, {
                    method: method,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                })
                    .then(res => res.json())
                    .then(res => {

                        form.reset();
                        editId = null;
                        const el = document.getElementById('clientAdminModal');
                        const instance = bootstrap.Modal.getInstance(el) || bootstrap.Modal.getOrCreateInstance(el);

                        instance.hide();

                        el.addEventListener('hidden.bs.modal', function () {
                            document.body.classList.remove('modal-open');
                            document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
                        }, { once: true });

                        loadQuestions();
                    });
            });

            // EDIT
            window.editQuestion = function (id) {

                fetch(routes.edit(id))
                    .then(res => res.json())
                    .then(res => {

                        editId = id;

                        document.getElementById('question').value = res.data.question;
                        document.getElementById('description').value = res.data.description;
                        document.getElementById('word_limit').value = res.data.word_limit;

                        new bootstrap.Modal(document.getElementById('clientAdminModal')).show();
                    });
            }

            // DELETE
            window.deleteQuestion = function (id) {

                if (!confirm('Delete this question?')) return;

                fetch(routes.delete(id), {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-HTTP-Method-Override': 'DELETE'
                    }
                })
                    .then(res => res.json())
                    .then(res => {
                        loadQuestions();
                    });
            }

        });
    </script>
@endsection