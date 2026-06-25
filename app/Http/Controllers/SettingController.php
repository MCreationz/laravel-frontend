<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function show()
    {
        return view('settings');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $organization = Auth::guard('organization')->user();

        if (!Hash::check($request->current_password, $organization->password)) {
            return back()->withErrors([
                'current_password' => 'Current password is incorrect.',
            ]);
        }

        $organization->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with(
            'success',
            'Password updated successfully.'
        );
    }
}