<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\FundingCategory;
use Illuminate\Http\Request;

class FundingCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FundingCategory::paginate(10);
        return view('superadmin.funding_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.funding_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'max_amount' => 'required|numeric|min:0',
        ]);

        FundingCategory::create($request->only('name', 'max_amount'));

        return redirect()->route('superadmin.funding-categories.index')
                         ->with('success', 'Funding category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FundingCategory $fundingCategory)
    {
        return view('superadmin.funding_categories.edit', compact('fundingCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FundingCategory $fundingCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'max_amount' => 'required|numeric|min:0',
        ]);

        $fundingCategory->update($request->only('name', 'max_amount'));

        return redirect()->route('superadmin.funding-categories.index')
                         ->with('success', 'Funding category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundingCategory $fundingCategory)
    {
        $fundingCategory->delete();

        return redirect()->route('superadmin.funding-categories.index')
                         ->with('success', 'Funding category deleted successfully.');
    }
}
