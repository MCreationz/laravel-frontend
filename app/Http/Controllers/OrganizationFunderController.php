<?php

namespace App\Http\Controllers;

use App\Models\OrganizationFunder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationFunderController extends Controller
{
    /* =========================
       Helper: Get Auth Organization
    ========================= */
    private function organization()
    {
        return Auth::guard('organization')->user();
    }

    /* =========================
       List Funders
    ========================= */
    public function index()
    {
        $organization = $this->organization();

        if (!$organization) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $funders = OrganizationFunder::where('organization_id', $organization->id)
            ->orderBy('year', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $funders
        ]);
    }

    /* =========================
       Store Funder
    ========================= */
    public function store(Request $request)
    {
        $organization = $this->organization();

        if (!$organization) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|digits:4',
            'amount' => 'required|numeric|min:0'
        ]);

        $funder = OrganizationFunder::create([
            'organization_id' => $organization->id,
            'name' => $request->name,
            'year' => $request->year,
            'amount' => $request->amount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Funder added successfully',
            'data' => $funder
        ]);
    }

    /* =========================
       Update Funder
    ========================= */
    public function update(Request $request, $id)
    {
        $organization = $this->organization();

        if (!$organization) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $funder = OrganizationFunder::where('organization_id', $organization->id)
            ->where('id', $id)
            ->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|digits:4',
            'amount' => 'required|numeric|min:0'
        ]);

        $funder->update([
            'name' => $request->name,
            'year' => $request->year,
            'amount' => $request->amount
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Funder updated successfully',
            'data' => $funder
        ]);
    }

    /* =========================
       Delete Funder
    ========================= */
    public function destroy($id)
    {
        $organization = $this->organization();

        if (!$organization) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $funder = OrganizationFunder::where('organization_id', $organization->id)
            ->where('id', $id)
            ->firstOrFail();

        $funder->delete();

        return response()->json([
            'success' => true,
            'message' => 'Funder deleted successfully'
        ]);
    }
}