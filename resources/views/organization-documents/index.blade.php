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
            {{-- <button class="btn btn-primary btn-sm d-none" data-bs-toggle="modal" data-bs-target="#docModal"
                onclick="openAddModal()">
                + Add Document
            </button> --}}

        </div>

        <!-- TABLE -->
        <div class="p-3">

          <div class="table-responsive">

    <table class="table align-middle">

        <thead class="table-light">
            <tr>
                <th class="text-nowrap">Document Name</th>
                <th class="text-center text-nowrap">View</th>
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
                                <td class="text-center">
                                    <a href="{{ asset('storage/' . $file) }}"
                                       target="_blank"
                                       class="btn btn-primary btn-sm">
                                        View
                                    </a>
                                </td>

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