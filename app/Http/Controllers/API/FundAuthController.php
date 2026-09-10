<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FundAuthController extends Controller
{
    /**
     * Check whether an organization is currently authenticated.
     */
    public function status()
    {
        $organization = Auth::guard('organization')->user();

        if (!$organization) {
            return response()->json([
                'authenticated' => false,
            ], 401);
        }

        return response()->json([
            'authenticated' => true,
            'user' => [
                'id'    => $organization->id,
                'name'  => $organization->name,
                'email' => $organization->work_email,
            ],
        ]);
    }
}