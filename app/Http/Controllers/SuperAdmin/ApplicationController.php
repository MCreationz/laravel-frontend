<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use App\Models\Company;
use App\Models\FundingCategory;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::with(['user', 'company', 'fundingCategory'])
            ->paginate(10);

        return view('superadmin.applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $companies = Company::all();
        $fundingCategories = FundingCategory::all();

        return view('superadmin.applications.create', compact('users', 'companies', 'fundingCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'company_id' => 'required|exists:companies,id',
            'funding_category_id' => 'required|exists:funding_categories,id',
            'title' => 'required|string|max:255',
            'status' => 'required|string|in:draft,submitted',
            'submitted_at' => 'nullable|date',
        ]);

        Application::create($request->all());

        return redirect()->route('superadmin.applications.index')
            ->with('success', 'Application created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        $users = User::all();
        $companies = Company::all();
        $fundingCategories = FundingCategory::all();

        return view('superadmin.applications.edit', compact('application', 'users', 'companies', 'fundingCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $request->validate([

            'status' => 'required|string',

        ]);

        $application->update($request->all());

        return redirect()->route('superadmin.applications.index')
            ->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('superadmin.applications.index')
            ->with('success', 'Application deleted successfully.');
    }
}
