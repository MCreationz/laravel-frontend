<?php

namespace App\Http\Controllers\ClientAdmin;

use App\Http\Controllers\Controller;
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
    return view('client-admin.funds.steps.overview');
}

/**
 * Funding Snapshot Step
 */
public function fundingSnapshot()
{
    return view('client-admin.funds.steps.funding-snapshot');
}

/**
 * Questionnaire Step
 */
public function questionnaire()
{
    return view('client-admin.funds.steps.questionnaire');
}

}