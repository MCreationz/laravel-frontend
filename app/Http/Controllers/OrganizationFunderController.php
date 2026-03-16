<?php

namespace App\Http\Controllers;

use App\Models\OrganizationFunder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationFunderController extends Controller
{
    // List funders
    public function index()
    {
        $funders = OrganizationFunder::where('organization_id', Auth::id())
            ->orderBy('year', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $funders
        ]);
    }

    // Add funder
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|digits:4',
            'amount' => 'required|numeric|min:0'
        ]);

        $funder = OrganizationFunder::create([
            'organization_id' => Auth::id(),
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

    // Edit funder
    public function update(Request $request, $id)
    {
        $funder = OrganizationFunder::where('organization_id', Auth::id())
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

    // Delete funder
    public function destroy($id)
    {
        $funder = OrganizationFunder::where('organization_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $funder->delete();

        return response()->json([
            'success' => true,
            'message' => 'Funder deleted successfully'
        ]);
    }
}