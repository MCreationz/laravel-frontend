<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectors = Sector::orderBy('id', 'desc')->paginate(10);
        return view('superadmin.sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:sectors,name',
            'status' => 'required|boolean',
        ]);

        Sector::create($validated);

        return redirect()
            ->route('superadmin.sectors.index')
            ->with('success', 'Sector created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sector = Sector::findOrFail($id);
        return view('superadmin.sectors.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sector = Sector::findOrFail($id);

        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:sectors,name,' . $sector->id,
            'status' => 'required|boolean',
        ]);

        $sector->update($validated);

        return redirect()
            ->route('superadmin.sectors.index')
            ->with('success', 'Sector updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sector = Sector::findOrFail($id);
        $sector->delete();

        return redirect()
            ->route('superadmin.sectors.index')
            ->with('success', 'Sector deleted successfully.');
    }
}
