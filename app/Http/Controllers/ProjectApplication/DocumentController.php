<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\FundApplication;
use App\Models\FundApplicationNpoDocument;
use App\Models\FundApplicationStartupDocument;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
public function npo(Fund $fund)
{
    $fundApplication = FundApplication::where('fund_id', $fund->id)
        ->where('organization_id', auth('organization')->id())
        ->first();

    return view('projects.apply.documents.npo', compact('fund', 'fundApplication'));
}

public function startup(Fund $fund)
{
    $fundApplication = FundApplication::where('fund_id', $fund->id)
        ->where('organization_id', auth('organization')->id())
        ->first();

    return view('projects.apply.documents.startup', compact('fund', 'fundApplication'));
}

    public function storeNpo(Request $request, Fund $fund)
    {
       // return $request->all();
        $fundApplication = FundApplication::where('fund_id', $fund->id)
            ->where('organization_id', auth('organization')->id())
            ->firstOrFail();

        $document = FundApplicationNpoDocument::firstOrNew([
            'fund_application_id' => $fundApplication->id,
        ]);

        $document->organization_name = $request->organization_name;
        $document->registration_number = $request->registration_number;

        $document->registration_number_12a = $request->registration_number_12a;
        $document->validity_12a = $request->validity_12a;

        $document->registration_number_80g = $request->registration_number_80g;
        $document->validity_80g = $request->validity_80g;

        $document->registration_number_fcra = $request->registration_number_fcra;
        $document->validity_fcra = $request->validity_fcra;

        $document->registration_number_csr1 = $request->registration_number_csr1;
        $document->validity_csr1 = $request->validity_csr1;

        if ($request->hasFile('registration_certificate')) {
            $document->registration_certificate = $request
                ->file('registration_certificate')
                ->store('fund-applications/npo-documents', 'public');
        }

        if ($request->hasFile('certificate_12a')) {
            $document->certificate_12a = $request
                ->file('certificate_12a')
                ->store('fund-applications/npo-documents', 'public');
        }

        if ($request->hasFile('certificate_80g')) {
            $document->certificate_80g = $request
                ->file('certificate_80g')
                ->store('fund-applications/npo-documents', 'public');
        }

        if ($request->hasFile('certificate_fcra')) {
            $document->certificate_fcra = $request
                ->file('certificate_fcra')
                ->store('fund-applications/npo-documents', 'public');
        }

        if ($request->hasFile('certificate_csr1')) {
            $document->certificate_csr1 = $request
                ->file('certificate_csr1')
                ->store('fund-applications/npo-documents', 'public');
        }

        $document->save();

        return redirect()->route(
            'projects.apply.financial-documents.npo',
            $fund->id
        );
    }

    public function storeStartup(Request $request, Fund $fund)
{

//return $request->all();
    $fundApplication = FundApplication::where('fund_id', $fund->id)
        ->where('organization_id', auth('organization')->id())
        ->firstOrFail();

    $document = FundApplicationStartupDocument::firstOrNew([
        'fund_application_id' => $fundApplication->id,
    ]);

    $document->organization_name = $request->organization_name;

    $document->registration_number = $request->registration_number;

    $document->dpiit_registration_number = $request->dpiit_registration_number;

    $document->patent_available = $request->patent_available;

    $document->patent_number = $request->patent_number;
    $document->application_number = $request->application_number;
    $document->date_of_filing = $request->date_of_filing;
    $document->patentee_name = $request->patentee_name;
    $document->patent_validity = $request->patent_validity;

    $document->gst_registration_number = $request->gst_registration_number;

    $document->msme_registration_number = $request->msme_registration_number;
    $document->msme_registration_validity = $request->msme_registration_validity;

    if ($request->hasFile('registration_certificate')) {
        $document->registration_certificate = $request
            ->file('registration_certificate')
            ->store('fund-applications/startup-documents', 'public');
    }

    if ($request->hasFile('dpiit_certificate')) {
        $document->dpiit_certificate = $request
            ->file('dpiit_certificate')
            ->store('fund-applications/startup-documents', 'public');
    }

    if ($request->hasFile('gst_certificate')) {
        $document->gst_certificate = $request
            ->file('gst_certificate')
            ->store('fund-applications/startup-documents', 'public');
    }

    $document->save();

    return redirect()->route(
        'projects.apply.financial-documents.startup',
        $fund->id
    );
}


}