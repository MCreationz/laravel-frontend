<?php

namespace App\Http\Controllers;

use App\Models\FundApplicationFinancialDocument;
use App\Models\FundApplicationNpoDocument;
use App\Models\FundApplicationStartupDocument;
use App\Models\OrganizationDocument;
use Illuminate\Http\Request;

class OrganizationDocumentController extends Controller
{
    public function index()
    {
        $organizationId = auth('organization')->id();

        $documents = collect();

        /*
        |--------------------------------------------------------------------------
        | Startup Documents
        |--------------------------------------------------------------------------
        */
        $startupDocs = FundApplicationStartupDocument::whereHas('fundApplication', function ($q) use ($organizationId) {
            $q->where('organization_id', $organizationId);
        })->latest()->get();

        foreach ($startupDocs as $doc) {
            $documents->push([
                'type' => 'Startup Documents',
                'organization' => $doc->organization_name,
                'fund_application_id' => $doc->fund_application_id,
                'meta' => [
                    'DPIIT No' => $doc->dpiit_registration_number,
                    'MSME No' => $doc->msme_registration_number,
                    'Patent Available' => $doc->patent_available ? 'Yes' : 'No',
                ],
                'items' => [
                    'Registration Certificate' => $doc->registration_certificate,
                    'DPIIT Certificate' => $doc->dpiit_certificate,
                    'GST Certificate' => $doc->gst_certificate,
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | NPO Documents
        |--------------------------------------------------------------------------
        */
        $npoDocs = FundApplicationNpoDocument::whereHas('fundApplication', function ($q) use ($organizationId) {
            $q->where('organization_id', $organizationId);
        })->latest()->get();

        foreach ($npoDocs as $doc) {
            $documents->push([
                'type' => 'NPO Documents',
                'organization' => $doc->organization_name,
                'fund_application_id' => $doc->fund_application_id,
                'meta' => [
                    '12A No' => $doc->registration_number_12a,
                    '80G No' => $doc->registration_number_80g,
                    'FCRA No' => $doc->registration_number_fcra,
                    'CSR1 No' => $doc->registration_number_csr1,
                ],
                'items' => [
                    'Registration Certificate' => $doc->registration_certificate,
                    '12A Certificate' => $doc->certificate_12a,
                    '80G Certificate' => $doc->certificate_80g,
                    'FCRA Certificate' => $doc->certificate_fcra,
                    'CSR1 Certificate' => $doc->certificate_csr1,
                ],
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Financial Documents (COMMON FOR BOTH)
        |--------------------------------------------------------------------------
        */
        $financialDocs = FundApplicationFinancialDocument::whereHas('fundApplication', function ($q) use ($organizationId) {
            $q->where('organization_id', $organizationId);
        })->latest()->get();

        foreach ($financialDocs as $doc) {
            $documents->push([
                'type' => 'Financial Documents',
                'organization' => null,
                'fund_application_id' => $doc->fund_application_id,
                'meta' => [
                    'Last Year Turnover' => $doc->last_year_turnover,
                    'Last to Last Year Turnover' => $doc->last_to_last_year_turnover,
                ],
                'items' => [
                    'Last Year Balance Sheet' => $doc->last_year_balance_sheet,
                    'Last to Last Year Balance Sheet' => $doc->last_to_last_year_balance_sheet,
                    'Last Year ITR' => $doc->last_year_itr,
                    'Last to Last Year ITR' => $doc->last_to_last_year_itr,
                ],
            ]);
        }

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
