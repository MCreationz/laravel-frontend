@extends('layouts.dashboard')

@section('page_title', 'Organization Documents')

@section('header_extra')
    <span class="header-org-chip">
        @if(auth('organization')->check() && auth('organization')->user()->role === 'funder')
            Non - Profit Organisation
        @else
            Startup
        @endif
    </span>
@endsection

@section('content')

    <div class="card-box bg-white rounded">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">

            <h2 class="mb-0 fw-semi table-heading">My Documents</h2>

            <!-- ADD BUTTON -->
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#docModal"
                onclick="openAddModal()">
                + Add Document
            </button>

        </div>

        <!-- TABLE -->
        <div class="p-3">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead class="table-light">
                        <tr>
                            <th class="w-auto text-nowrap">Name</th>
                            <th class="text-center text-nowrap">Uploaded On</th>
                            <th class="text-nowrap">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($documents as $doc)

                            <tr>

                                <!-- NAME -->
                                <td>
                                    <strong>{{ $doc->name }}</strong>
                                </td>

                                <!-- UPLOADED ON -->
                                <td class="text-center text-nowrap">
                                    {{ $doc->created_at->format('d M Y') }}
                                </td>

                                <!-- ACTIONS -->
                                <td class="">

                                    <div class="d-flex align-items-center justify-content-center gap-2">

                                        <!-- VIEW -->
                                        <a href="{{ Storage::url($doc->file_path) }}" target="_blank"
                                            class="btn btn-primary view-btn">
                                            View
                                        </a>

                                        <!-- EDIT -->
                                        <button type="button" class="border-0 bg-transparent p-1 d-flex align-items-center"
                                            data-id="{{ $doc->id }}" data-name="{{ $doc->name }}"
                                            data-file="{{ Storage::url($doc->file_path) }}" data-bs-toggle="modal"
                                            data-bs-target="#docModal" onclick="openEditModal(this)">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                                fill="none">

                                                <path
                                                    d="M8.8198 2.39503L3.35707 8.17714C3.1508 8.39671 2.95119 8.8292 2.91127 9.12862L2.66508 11.2844C2.57858 12.0629 3.1375 12.5952 3.90933 12.4621L6.05184 12.0962C6.35126 12.043 6.77044 11.8234 6.97671 11.5972L12.4394 5.81506C13.3843 4.81699 13.8101 3.6792 12.3396 2.28857C10.8758 0.911245 9.76463 1.39697 8.8198 2.39503Z"
                                                    stroke="#07CCB5" stroke-width="1.2" />

                                                <path d="M2 14.6387H13.9767" stroke="#07CCB5" stroke-width="1.2" />
                                            </svg>

                                        </button>

                                        <!-- DELETE -->
                                        <form method="POST" action="{{ route('organization.documents.destroy', $doc->id) }}"
                                            onsubmit="return confirm('Delete this document?')" class="m-0">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="border-0 bg-transparent p-1 d-flex align-items-center justify-content-center"
                                                style="width:28px;height:28px;">


                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15"
                                                    viewBox="0 0 13 15" fill="none">

                                                    <path
                                                        d="M7.91403 5.09124L7.68381 11.0796M4.498 11.0796L4.26778 5.09124M8.58606 2.69123C9.3604 2.75118 10.1323 2.83929 10.9002 2.95538C11.1278 2.98998 11.354 3.02658 11.5802 3.06584M10.9002 2.95538L10.1896 12.1928C10.1606 12.5689 9.99071 12.9201 9.71388 13.1764C9.43706 13.4326 9.07371 13.5749 8.69651 13.5748H3.4853C3.10809 13.5749 2.74475 13.4326 2.46792 13.1764C2.1911 12.9201 2.0212 12.5689 1.9922 12.1928L1.28158 2.95538M1.28158 2.95538C1.05402 2.98932 0.82779 3.02591 0.601562 3.06517M1.28158 2.95538C2.04951 2.83929 2.82141 2.75118 3.59575 2.69123M8.58606 2.69123V2.08175C8.58606 1.2966 7.98057 0.641875 7.19543 0.617256C6.45927 0.593727 5.72254 0.593727 4.98638 0.617256C4.20124 0.641875 3.59575 1.29727 3.59575 2.08175V2.69123M8.58606 2.69123C6.9251 2.56286 5.25671 2.56286 3.59575 2.69123"
                                                        stroke="#E74C3C" stroke-width="1.2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">
                                    No documents uploaded yet.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- MODAL (ADD + EDIT) -->
    <div class="modal fade" id="docModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="modalTitle">Add Document</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form id="docForm" method="POST" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" id="methodField">

                    <div class="modal-body">

                        <!-- NAME -->
                        <div class="mb-3">
                            <label class="form-label">Document Name</label>
                            <input type="text" name="name" id="doc_name" class="form-control" required>
                        </div>

                        <!-- EXISTING FILE (EDIT ONLY) -->
                        <div class="mb-3 d-none" id="existingFileBox">
                            <label class="form-label">Current File</label><br>
                            <a href="#" target="_blank" id="existingFileLink"></a>
                        </div>

                        <!-- FILE -->
                        <div class="mb-3">
                            <label class="form-label">Upload File</label>
                            <input type="file" name="document" class="form-control">
                            <small class="text-muted">Leave empty while editing to keep current file</small>
                        </div>

                    </div>

                    <div class="modal-footer border-0">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

<script>
    let mode = 'add';
    let editId = null;

    function openAddModal() {

        mode = 'add';
        editId = null;

        document.getElementById('modalTitle').innerText = "Add Document";

        const form = document.getElementById('docForm');
        form.action = "{{ route('organization.documents.store') }}";

        document.getElementById('doc_name').value = "";

        document.getElementById('existingFileBox').classList.add('d-none');
    }

    function openEditModal(el) {

        mode = 'edit';
        editId = el.dataset.id;

        document.getElementById('modalTitle').innerText = "Edit Document";

        const form = document.getElementById('docForm');
        form.action = `/organization-documents/${editId}`;

        // add PUT method
        if (!document.getElementById('methodField')) {
            const input = document.createElement('input');
            input.type = "hidden";
            input.name = "_method";
            input.value = "PUT";
            input.id = "methodField";
            form.appendChild(input);
        } else {
            document.getElementById('methodField').value = "PUT";
        }

        document.getElementById('doc_name').value = el.dataset.name;

        // show existing file
        const fileBox = document.getElementById('existingFileBox');
        const fileLink = document.getElementById('existingFileLink');

        fileBox.classList.remove('d-none');
        fileLink.href = el.dataset.file;
        fileLink.innerText = "View Current Document";
    }
</script>