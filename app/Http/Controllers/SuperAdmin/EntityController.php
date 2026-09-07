<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    /**
     * Display a listing of organizations/entities.
     */
    public function index(Request $request)
    {
        $organizations = Organization::query()
            ->with([
                'profile',
                'address',
                'operationalDetail',
                'funders',
            ])
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('organization_name', 'like', "%{$search}%")
                        ->orWhere('work_email', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('role'), function ($query) use ($request) {
                $role = match ($request->role) {
                    'startup' => 'fund_seeker',
                    'npo' => 'funder',
                    default => null,
                };

                if ($role) {
                    $query->where('role', $role);
                }
            })
            ->latest('id')
            ->paginate(20)
            ->withQueryString();

        //    return $organizations[0];

        return view('superadmin.entities.index', compact('organizations'));
    }
    /**
     * Show the form for creating a new organization/entity.
     */
    public function create()
    {
        return view('super-admin.entities.create');
    }

    /**
     * Store a newly created organization/entity.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing an organization/entity.
     */
    public function edit(Organization $entity)
    {
        return view('super-admin.entities.edit', compact('entity'));
    }

    /**
     * Update an organization/entity.
     */
    public function update(Request $request, Organization $entity)
    {
        //
    }

    /**
     * Remove an organization/entity.
     */
    public function destroy(Organization $entity)
    {
        $entity->delete();

        return redirect()
            ->route('superadmin.entities.index')
            ->with('success', 'Entity deleted successfully.');
    }
}
