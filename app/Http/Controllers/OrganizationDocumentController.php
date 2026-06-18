<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizationDocument;
use Illuminate\Support\Facades\Storage;

class OrganizationDocumentController extends Controller
{
    public function index()
    {
        $documents = OrganizationDocument::where(
            'organization_id',
            auth('organization')->id()
        )
        ->latest()
        ->get();

        return view('organization-documents.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'document' => ['required', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:5120'],
        ]);

        $path = $request->file('document')->store('organization-documents', 'public');

        OrganizationDocument::create([
            'organization_id' => auth('organization')->id(),
            'name' => $request->name,
            'file_path' => $path,
        ]);

        return back()->with('success', 'Document uploaded successfully.');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'document' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:5120'],
    ]);

    $doc = OrganizationDocument::where('organization_id', auth('organization')->id())
        ->where('id', $id)
        ->firstOrFail();

    $data = [
        'name' => $request->name,
    ];

    if ($request->hasFile('document')) {

        $path = $request->file('document')->store('organization-documents', 'public');

        $data['file_path'] = $path;
    }

    $doc->update($data);

    return back()->with('success', 'Document updated successfully.');
}


public function destroy($id)
{
    $doc = OrganizationDocument::where('organization_id', auth('organization')->id())
        ->where('id', $id)
        ->firstOrFail();

    $doc->delete();

    return back()->with('success', 'Document deleted successfully.');
}
}