<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of companies.
     */
    public function index()
    {
        $companies = Company::with('sector')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('superadmin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        $sectors = Sector::orderBy('name')->get();

        return view('superadmin.companies.create', compact('sectors'));
    }

    /**
     * Store a newly created company in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'                  => 'required|string|max:255',
            'pan_number'            => 'required|string|max:20',
            'gst_number'            => 'nullable|string|max:20',
            'sector_id'             => 'required|exists:sectors,id',
            'address'               => 'nullable|string',
            'city'                  => 'nullable|string|max:100',
            'state'                 => 'nullable|string|max:100',
            'pincode'               => 'nullable|string|max:10',
            'contact_person_name'   => 'nullable|string|max:255',
            'contact_email'         => 'nullable|email',
            'contact_mobile'        => 'nullable|string|max:15',
            'status'                => 'required|boolean',
        ]);

        Company::create($validated);

        return redirect()
            ->route('superadmin.companies.index')
            ->with('success', 'Company created successfully.');
    }

    /**
     * Show the form for editing the specified company.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        $sectors = Sector::orderBy('name')->get();

        return view('superadmin.companies.edit', compact('company', 'sectors'));
    }

    /**
     * Update the specified company in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);

        $validated = $request->validate([
            'name'                  => 'required|string|max:255',
            'pan_number'            => 'required|string|max:20',
            'gst_number'            => 'nullable|string|max:20',
            'sector_id'             => 'required|exists:sectors,id',
            'address'               => 'nullable|string',
            'city'                  => 'nullable|string|max:100',
            'state'                 => 'nullable|string|max:100',
            'pincode'               => 'nullable|string|max:10',
            'contact_person_name'   => 'nullable|string|max:255',
            'contact_email'         => 'nullable|email',
            'contact_mobile'        => 'nullable|string|max:15',
            'status'                => 'required|boolean',
        ]);

        $company->update($validated);

        return redirect()
            ->route('superadmin.companies.index')
            ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified company from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()
            ->route('superadmin.companies.index')
            ->with('success', 'Company deleted successfully.');
    }

    public function assignAdmin($companyId)
    {
        $company = Company::with('users')->findOrFail($companyId);

        // Current admin is the user with role_id = 3
        $currentAdmin = $company->users()->whereHas('role', function ($q) {
            $q->where('roles.id', 3); // Role ID 3 is Company Admin
        })->first();

        return view('superadmin.companies.assign_admin', compact('company', 'currentAdmin'));
    }


    public function updateAdmin(Request $request, $companyId)
    {
        $request->validate([
            'admin_user_id' => 'required|exists:users,id',
        ]);

        $company = Company::with('users')->findOrFail($companyId);

        foreach ($company->users as $user) {

            // Assign selected user as Company Admin (role_id = 3)
            if ($user->id == $request->admin_user_id) {
                DB::table('role_user')->updateOrInsert(
                    ['user_id' => $user->id],
                    ['role_id' => 3]
                );
            } else {
                // All other users get role_id = 6
                DB::table('role_user')->updateOrInsert(
                    ['user_id' => $user->id],
                    ['role_id' => 6]
                );
            }
        }

        return redirect()->route('superadmin.companies.index')
            ->with('success', 'Admin assigned successfully.');
    }
}
