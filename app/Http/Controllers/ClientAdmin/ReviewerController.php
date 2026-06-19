<?php

namespace App\Http\Controllers\ClientAdmin;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReviewerController extends Controller
{
    public function index()
    {
        $clientId = auth('client_admin')->id();

        $reviewers = Reviewer::where('client_id', $clientId)
            ->withCount([
                'funds as assigned_funds_count',
                'funds as completed_funds_count' => function ($query) {
                    $query->where('status', 'completed');
                },
                'funds as pending_funds_count' => function ($query) {
                    $query->where('status', '!=', 'completed');
                },
            ])
            ->latest()
            ->get();

        $funds = Fund::where('client_id', $clientId)->get();

        return view('client-admin.reviewers.index', compact('reviewers', 'funds'));
    }

    public function store(Request $request)
    {
       // return $request->all();
         $clientId = auth('client_admin')->id();

        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:reviewers,email',
            'role' => 'nullable|string|max:100',
            'domain_expertise' => 'nullable|string|max:255',
            'password' => 'required|min:6',
            'status' => 'required|in:verified,non_verified',
        ]);

        Reviewer::create([
            'client_id' => $clientId,
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'role' => $request->role,
            'domain_expertise' => $request->domain_expertise,
            'password' => Hash::make($request->password),
            'status' => $request->status,
        ]);

        return back()->with('success', 'Reviewer created successfully.');
    }

    public function update(Request $request, Reviewer $reviewer)
    {
        $clientId = auth('client_admin')->id();

        // Prevent cross-client access
        if ($reviewer->client_id !== $clientId) {
            abort(403);
        }

        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:reviewers,email,' . $reviewer->id,
            'role' => 'nullable|string|max:100',
            'domain_expertise' => 'nullable|string|max:255',
            'password' => 'nullable|min:6',
            'status' => 'required|in:verified,non_verified',
        ]);

        $reviewer->update([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'role' => $request->role,
            'domain_expertise' => $request->domain_expertise,
            'status' => $request->status,
            'password' => $request->password
                ? Hash::make($request->password)
                : $reviewer->password,
        ]);

        return back()->with('success', 'Reviewer updated successfully.');
    }

    public function destroy(Reviewer $reviewer)
    {
        $clientId = auth('client_admin')->id();

        if ($reviewer->client_id !== $clientId) {
            abort(403);
        }

        $reviewer->delete();

        return back()->with('success', 'Reviewer deleted successfully.');
    }

    public function assignFunds(Request $request)
    {
        $clientId = auth('client_admin')->id();

        $request->validate([
            'reviewer_id' => 'required|exists:reviewers,id',
            'fund_ids' => 'nullable|string',
        ]);

        $reviewer = Reviewer::where('id', $request->reviewer_id)
            ->where('client_id', $clientId)
            ->firstOrFail();

        $fundIds = [];

        if (!empty($request->fund_ids)) {
            $fundIds = array_filter(
                array_map('trim', explode(',', $request->fund_ids))
            );
        }

        // Security: ensure funds belong to same client
        $validFundIds = Fund::where('client_id', $clientId)
            ->whereIn('id', $fundIds)
            ->pluck('id')
            ->toArray();

        $reviewer->funds()->sync($validFundIds);

        return back()->with('success', 'Funds assigned successfully.');
    }
}