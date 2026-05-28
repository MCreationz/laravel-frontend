<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\ClientAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientAdmins = ClientAdmin::latest()->paginate(10);

        return view('superadmin.client-admins.index', compact('clientAdmins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_type' => 'required|string|max:255',
            'primary_contact_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:client_admins,email',
            'state' => 'required|string|max:255',
            'status' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        $validated['status'] = $validated['status'] ?? 'verified';

        /*
        |--------------------------------------------------------------------------
        | Password Handling
        |--------------------------------------------------------------------------
        |
        | If super admin does not provide password,
        | generate a temporary one automatically.
        |
        */

        $plainPassword = $validated['password'] ?? Str::random(10);

        $validated['password'] = Hash::make($plainPassword);

        $clientAdmin = ClientAdmin::create($validated);

        /*
        |--------------------------------------------------------------------------
        | Optional:
        |--------------------------------------------------------------------------
        |
        | Send email with temporary password here.
        |
        */

        // Mail::to($clientAdmin->email)->send(new ClientAdminCredentialsMail($plainPassword));

        return redirect()
            ->route('super-admin.client-admins.index')
            ->with('success', 'Client Admin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientAdmin $clientAdmin)
    {
        return view('superadmin.client-admins.show', compact('clientAdmin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientAdmin $clientAdmin)
    {
        $validated = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_type' => 'required|string|max:255',
            'primary_contact_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:client_admins,email,'.$clientAdmin->id,
            'state' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update password only if provided
        |--------------------------------------------------------------------------
        */

        if (! empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $clientAdmin->update($validated);

        return redirect()
            ->route('super-admin.client-admins.index')
            ->with('success', 'Client Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientAdmin $clientAdmin)
    {
        $clientAdmin->delete();

        return redirect()
            ->route('super-admin.client-admins.index')
            ->with('success', 'Client Admin deleted successfully.');
    }
}
