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
        <button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#docModal"
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
                        <th class="text-nowrap">Document Name</th>
                        <!-- <th class="text-center text-nowrap">View</th> -->
                        <th class="text-center text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($documents as $doc)

                    @if(!empty($doc['items']))

                    @foreach($doc['items'] as $name => $file)

                    @if(!empty($file))
                    <tr>

                        <!-- NAME -->
                        <td>
                            <strong>{{ $name }}</strong>
                        </td>

                        <!-- VIEW -->

                        <td>
                            @php
                            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                            $icon = match ($extension) {
                            'pdf' => asset('img/pdf-icon.png'),
                            'doc', 'docx' => asset('img/docx.svg'),
                            'xls', 'xlsx', 'csv' => asset('img/excel.svg'),
                            default => asset('img/docx.svg'),
                            };
                            @endphp

                            <div class="d-inline-flex align-items-center gap-2">
                                <a href="{{ asset('storage/' . $file) }}"
                                    target="_blank"
                                    class="d-inline-flex align-items-center">
                                    <img src="{{ $icon }}" alt="" width="20" height="20">
                                </a>

                                @if($doc['type'] === 'Organization Documents')
                                @php
                                $documentId = $doc['id'];
                                $documentName = array_key_first($doc['items']);
                                $documentFile = current($doc['items']);
                                @endphp

                                <form action="{{ route('organization.documents.destroy', $documentId) }}"
                                    method="POST"
                                    class="d-inline-flex m-0"
                                    onsubmit="return confirm('Delete this document?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="trash-btn border-0 bg-transparent p-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15"
                                            viewBox="0 0 13 15" fill="none">
                                            <path
                                                d="M7.91257 5.09172L7.68235 11.0801M4.49653 11.0801L4.26631 5.09172M8.58459 2.69172C9.35893 2.75167 10.1308 2.83977 10.8988 2.95587C11.1263 2.99047 11.3526 3.02707 11.5788 3.06632M10.8988 2.95587L10.1881 12.1933C10.1591 12.5694 9.98924 12.9206 9.71242 13.1769C9.43559 13.4331 9.07225 13.5754 8.69505 13.5753H3.48383C3.10663 13.5754 2.74328 13.4331 2.46646 13.1769C2.18964 12.9206 2.01973 12.5694 1.99073 12.1933L1.28011 2.95587M1.28011 2.95587C1.05255 2.98981 0.826325 3.0264 0.600098 3.06566M1.28011 2.95587C2.04804 2.83978 2.81994 2.75167 3.59428 2.69172M8.58459 2.69172V2.08223C8.58459 1.29709 7.9791 0.642363 7.19396 0.617744C6.4578 0.594215 5.72108 0.594215 4.98492 0.617744C4.19977 0.642363 3.59428 1.29776 3.59428 2.08223V2.69172M8.58459 2.69172C6.92363 2.56335 5.25524 2.56335 3.59428 2.69172"
                                                stroke="#E74C3C"
                                                stroke-width="1.2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>


                        <!-- <td class="text-center">
                            @if($doc['type'] === 'Organization Documents')

                            @php
                            $documentId = $doc['id'];
                            $documentName = array_key_first($doc['items']);
                            $documentFile = current($doc['items']);
                            @endphp

                             <button
                                type="button"
                                class="btn btn-sm btn-outline-primary"
                                onclick="openEditModal(
                {{ $documentId }},
                @js($documentName),
                @js(asset('storage/' . $documentFile))
            )">
                                Edit
                            </button> -->


                        <!-- @else
                            -
                            @endif
                        </td> -->
                    </tr>
                    @endif

                    @endforeach

                    @endif

                    @empty

                    <tr>
                        <td colspan="2" class="text-center py-4 text-muted">
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
        document.getElementById('modalTitle').innerText = 'Add Document';

        const form = document.getElementById('docForm');
        form.action = "{{ route('organization.documents.store') }}";

        document.getElementById('methodField').innerHTML = '';

        document.getElementById('doc_name').value = '';

        document.getElementById('existingFileBox').classList.add('d-none');
    }

    function openEditModal(id, name, fileUrl) {
        document.getElementById('modalTitle').innerText = 'Edit Document';

        const form = document.getElementById('docForm');
        form.action = "/organization-documents/" + id;

        document.getElementById('methodField').innerHTML =
            '<input type="hidden" name="_method" value="PUT">';

        document.getElementById('doc_name').value = name;

        document.getElementById('existingFileBox').classList.remove('d-none');

        const link = document.getElementById('existingFileLink');
        link.href = fileUrl;
        link.innerText = 'View Current File';
    }
</script>