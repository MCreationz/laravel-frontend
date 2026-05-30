<?php

namespace App\Http\Controllers\ClientAdmin;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use Illuminate\Http\Request;

class FundController extends Controller
{
    /**
     * Fund Listing
     */
    public function index()
    {
        return view('client-admin.funds.index');
    }

    /**
     * Create Fund Page
     */
    public function create()
    {
        return view('client-admin.funds.create');
    }

    /**
     * Store Fund
     */
    public function store(Request $request)
    {
        return redirect()
            ->route('client-admin.funds.index')
            ->with('success', 'Fund created successfully.');
    }

    /**
     * Show Fund
     */
    public function show($id)
    {
        return view('client-admin.funds.show', compact('id'));
    }

    /**
     * Edit Fund
     */
    public function edit($id)
    {
        return view('client-admin.funds.edit', compact('id'));
    }

    /**
     * Update Fund
     */
    public function update(Request $request, $id)
    {
        return redirect()
            ->route('client-admin.funds.index')
            ->with('success', 'Fund updated successfully.');
    }

    /**
     * Delete Fund
     */
    public function destroy($id)
    {
        return redirect()
            ->route('client-admin.funds.index')
            ->with('success', 'Fund deleted successfully.');
    }

    /**
     * Fund Overview Step
     */
/**
 * Fund Overview Step
 */
public function overview()
{
    $fund = null;

    if (session()->has('current_fund_id')) {
        $fund = Fund::where(
            'client_id',
            auth('client_admin')->id()
        )->find(session('current_fund_id'));
    }

    return view(
        'client-admin.funds.steps.overview',
        compact('fund')
    );
}


/**
 * Store Fund Overview (Step 1)
 */
public function storeOverview(Request $request)
{
    $request->validate([
        'fund_name'                => 'required|string|max:255',
        'fund_owner'               => 'required|string|max:255',
        'fund_owner_email'         => 'required|email|max:255',
        'about_fund'               => 'nullable|string',
        'project_start'            => 'nullable|date',
        'project_end'              => 'nullable|date|after_or_equal:project_start',
        'maximum_project_duration' => 'nullable|integer|min:1',
        'fund_logo'                => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        'fund_banner'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
    ]);

    $fund = null;

    if (session()->has('current_fund_id')) {
        $fund = Fund::where(
            'client_id',
            auth('client_admin')->id()
        )->find(session('current_fund_id'));
    }

    if (!$fund) {
        $fund = new Fund();
        $fund->client_id = auth('client_admin')->id();
    }

    $fund->fund_name = $request->fund_name;
    $fund->fund_owner = $request->fund_owner;
    $fund->fund_owner_email = $request->fund_owner_email;
    $fund->about_fund = $request->about_fund;
    $fund->project_start = $request->project_start;
    $fund->project_end = $request->project_end;
    $fund->maximum_project_duration = $request->maximum_project_duration;
    $fund->current_step = 'snapshot';
    $fund->status = 'active';

    if ($request->hasFile('fund_logo')) {
        $fund->fund_logo = $request->file('fund_logo')
            ->store('funds/logos', 'public');
    }

    if ($request->hasFile('fund_banner')) {
        $fund->fund_banner = $request->file('fund_banner')
            ->store('funds/banners', 'public');
    }

    $fund->save();

    session([
        'current_fund_id' => $fund->id,
    ]);

    return redirect()
        ->route('client-admin.funds.funding-snapshot')
        ->with('success', 'Fund overview saved successfully.');
}


/**
 * Funding Snapshot Step
 */
public function fundingSnapshot()
{
    $fundId = session('current_fund_id');

    if (!$fundId) {
        return redirect()
            ->route('client-admin.funds.overview')
            ->with('error', 'Please complete the overview step first.');
    }

    $fund = Fund::findOrFail($fundId);

    return view('client-admin.funds.steps.funding-snapshot', compact('fund'));
}

/**
 * Questionnaire Step
 */
public function questionnaire()
{
    return view('client-admin.funds.steps.questionnaire');
}

}