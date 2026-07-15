<?php

namespace App\Http\Controllers\ClientAdmin;

use App\Http\Controllers\Controller;
use App\Models\FundDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FundDocumentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | List
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $documents = FundDocument::latest()->get();

        return response()->json([
            'success' => true,
            'data' => $documents
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */
   public function store(Request $request)
{

    $request->validate([
        'documents' => 'required|array',
        'documents.*.document_name'   => 'required|string|max:255',
        'documents.*.instruction'     => 'nullable|string',
        'documents.*.document_type'   => 'required|string|max:50',
        'documents.*.max_file_size_mb'=> 'required|integer|min:1',
        'documents.*.uploaded_file'   => 'nullable|file|max:5120',
    ]);

   

    $created = [];

    foreach ($request->documents as $doc) {

        $data = [
            'document_name'    => $doc['document_name'],
            'instruction'      => $doc['instruction'] ?? null,
            'document_type'    => $doc['document_type'],
            'max_file_size_mb' => $doc['max_file_size_mb'],
        ];

        if (isset($doc['uploaded_file'])) {
            $data['uploaded_file'] = $doc['uploaded_file']
                ->store('fund-documents', 'public');
        }

        $created[] = FundDocument::create($data);
    }

    return response()->json([
        'success' => true,
        'message' => 'Documents created successfully',
        'data'    => $created
    ]);
}

    /*
    |--------------------------------------------------------------------------
    | Show (Edit Data)
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $document = FundDocument::find($id);

        if (!$document) {
            return response()->json([
                'success' => false,
                'message' => 'Document not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $document
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */
  /*
|--------------------------------------------------------------------------
| Edit (Get Data For Edit)
|--------------------------------------------------------------------------
*/
public function edit($id)
{
    $document = FundDocument::find($id);

    if (!$document) {
        return response()->json([
            'success' => false,
            'message' => 'Document not found'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'data' => $document
    ]);
}


/*
|--------------------------------------------------------------------------
| Update
|--------------------------------------------------------------------------
*/
public function update(Request $request, $id)
{
    $document = FundDocument::find($id);

    if (!$document) {
        return response()->json([
            'success' => false,
            'message' => 'Document not found'
        ], 404);
    }

    $validator = Validator::make($request->all(), [
        'document_name'      => 'required|string|max:255',
        'instruction'        => 'nullable|string',
        'document_type'      => 'required|string|max:50',
        'max_file_size_mb'   => 'required|integer|min:1',
        'is_required'        => 'nullable|boolean',
        'uploaded_file'      => 'nullable|file|max:5120',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }


    $data = [
        'document_name'    => $request->document_name,
        'instruction'      => $request->instruction,
        'document_type'    => $request->document_type,
        'max_file_size_mb' => $request->max_file_size_mb,
        'is_required'      => $request->is_required ?? false,
    ];


    if ($request->hasFile('uploaded_file')) {

        $data['uploaded_file'] = $request->file('uploaded_file')
            ->store('fund-documents', 'public');
    }


    $document->update($data);


    return response()->json([
        'success' => true,
        'message' => 'Document updated successfully',
        'data' => $document->fresh()
    ]);
}
    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $document = FundDocument::find($id);

        if (!$document) {
            return response()->json([
                'success' => false,
                'message' => 'Document not found'
            ], 404);
        }

        $document->delete();

        return response()->json([
            'success' => true,
            'message' => 'Document deleted successfully'
        ]);
    }
}