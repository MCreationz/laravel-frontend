<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FundAuthController extends Controller
{
    /**
     * Check whether an organization is currently authenticated.
     */
    public function status()
    {
        $organization = Auth::guard('organization')->user();

        if (! $organization) {
            return response()->json([
                'authenticated' => false,
            ], 401);
        }

        $profile = $organization->profile;

        return response()->json([
            'authenticated' => true,
            'organization' => [
                'id' => $organization->id,
                'name' => $organization->profile?->legal_name
                    ?? $organization->organization_name,
                'email' => $organization->work_email,
                'role' => $organization->role === 'funder' ? 'NPO' : 'Startup',
            ],
        ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('organization')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully.',
        ]);
    }
}
