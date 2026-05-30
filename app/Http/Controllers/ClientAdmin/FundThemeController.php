<?php

namespace App\Http\Controllers\ClientAdmin;

use App\Http\Controllers\Controller;
use App\Models\FundTheme;
use Illuminate\Http\Request;

class FundThemeController extends Controller
{
    public function index()
    {
        $fundId = session('current_fund_id');

        $themes = FundTheme::where('fund_id', $fundId)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $themes,
        ]);
    }

    public function store(Request $request)
    {
       // dd($request->all());
        $fundId = session('current_fund_id');

        if (!$fundId) {
            return response()->json([
                'success' => false,
                'message' => 'Fund not found in session.',
            ], 422);
        }

        $validated = $request->validate([
            'theme_name'     => ['required', 'string', 'max:255'],
            'sub_theme_name' => ['nullable', 'string', 'max:255'],
            'description'    => ['nullable', 'string'],
        ]);

        $theme = FundTheme::create([
            'fund_id'        => $fundId,
            'theme_name'     => $validated['theme_name'],
            'sub_theme_name' => $validated['sub_theme_name'] ?? null,
            'description'    => $validated['description'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Theme created successfully.',
            'data'    => $theme,
        ]);
    }

    public function show($id)
    {
        $theme = FundTheme::findOrFail($id);

        return response()->json([
            'success' => true,
            'data'    => $theme,
        ]);
    }

    public function edit($id)
    {
        $theme = FundTheme::findOrFail($id);

        return response()->json([
            'success' => true,
            'data'    => $theme,
        ]);
    }

    public function update(Request $request, $id)
    {
        $theme = FundTheme::findOrFail($id);

        $validated = $request->validate([
            'theme_name'     => ['required', 'string', 'max:255'],
            'sub_theme_name' => ['nullable', 'string', 'max:255'],
            'description'    => ['nullable', 'string'],
        ]);

        $theme->update([
            'theme_name'     => $validated['theme_name'],
            'sub_theme_name' => $validated['sub_theme_name'] ?? null,
            'description'    => $validated['description'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Theme updated successfully.',
            'data'    => $theme->fresh(),
        ]);
    }

    public function destroy($id)
    {
        $theme = FundTheme::findOrFail($id);

        $theme->delete();

        return response()->json([
            'success' => true,
            'message' => 'Theme deleted successfully.',
        ]);
    }
}