<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\FundApplication;
use App\Models\FundApplicationFinancialDocument;
use Illuminate\Http\Request;

class FinancialDocumentController extends Controller
{
    public function index(Fund $fund)
    {
        $fundApplication = FundApplication::with('financialDocument')
            ->where('fund_id', $fund->id)
            ->where('organization_id', auth('organization')->id())
            ->first();

        return view('projects.apply.financial-documents', compact(
            'fund',
            'fundApplication'
        ));
    }

    public function store(Request $request, Fund $fund)
    {
        $fundApplication = FundApplication::where('fund_id', $fund->id)
            ->where('organization_id', auth('organization')->id())
            ->firstOrFail();

        $financialDocument = FundApplicationFinancialDocument::firstOrNew([
            'fund_application_id' => $fundApplication->id,
        ]);

        $financialDocument->last_year_turnover = $request->last_year_turnover;
        $financialDocument->last_to_last_year_turnover = $request->last_to_last_year_turnover;

        if ($request->hasFile('last_year_balance_sheet')) {
            $financialDocument->last_year_balance_sheet = $request
                ->file('last_year_balance_sheet')
                ->store('fund-applications/financial-documents', 'public');
        }

        if ($request->hasFile('last_to_last_year_balance_sheet')) {
            $financialDocument->last_to_last_year_balance_sheet = $request
                ->file('last_to_last_year_balance_sheet')
                ->store('fund-applications/financial-documents', 'public');
        }

        if ($request->hasFile('last_year_itr')) {
            $financialDocument->last_year_itr = $request
                ->file('last_year_itr')
                ->store('fund-applications/financial-documents', 'public');
        }

        if ($request->hasFile('last_to_last_year_itr')) {
            $financialDocument->last_to_last_year_itr = $request
                ->file('last_to_last_year_itr')
                ->store('fund-applications/financial-documents', 'public');
        }

        $financialDocument->save();

        $organization = auth('organization')->user();

        if ($organization->role === 'fund_seeker') {
            return redirect()
                ->route('dashboard')
                ->with('success', 'Application submitted successfully.');
        }

        return redirect()->route(
            'projects.apply.awards-recognition',
            $fund->id
        );

    }
}
