<?php

namespace App\Http\Controllers\ClientAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $clientAdmin = Auth::guard('client_admin')->user();

        return view('client-admin.dashboard', compact('clientAdmin'));
    }

    public function profile()
    {
        $clientAdmin = Auth::guard('client_admin')->user();

        return view('client-admin.profile', compact('clientAdmin'));
    }

    public function updateProfile(Request $request)
    {
        $clientAdmin = Auth::guard('client_admin')->user();

        $validated = $request->validate([
            'primary_contact_name' => 'required|string|max:255',
            'phone_number'         => 'required|string|max:20',
            'state'                => 'required|string|max:255',
        ]);

        $clientAdmin->update($validated);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function changePassword()
    {
        return view('client-admin.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|min:8|confirmed',
        ]);

        $clientAdmin = Auth::guard('client_admin')->user();

        if (!Hash::check($request->current_password, $clientAdmin->password)) {

            return back()->withErrors([
                'current_password' => 'Current password is incorrect.',
            ]);
        }

        $clientAdmin->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}