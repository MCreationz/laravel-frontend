<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReviewerController extends Controller
{
    public function index()
    {
        $reviewers = Reviewer::with([
                'funds:id,fund_name,status'
            ])
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

        $funds = Fund::select(
                'id',
                'fund_name',
                'client_id'
            )
            ->get();

        return view(
            'superadmin.reviewers.index',
            compact('funds', 'reviewers')
        );
    }

    /**
     * Create reviewer(s) based on selected funds.
     *
     * Super Admin selects funds.
     *
     * Each fund belongs to a client.
     * A separate reviewer is created for each client.
     *
     * Example:
     *
     * Fund 5 -> Client 1
     * Fund 7 -> Client 2
     *
     * Creates:
     * Reviewer A -> Client 1 -> Fund 5
     * Reviewer B -> Client 2 -> Fund 7
     *
     * If:
     *
     * Fund 5 -> Client 1
     * Fund 7 -> Client 1
     *
     * Creates:
     * Reviewer A -> Client 1 -> Fund 5, Fund 7
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
            'role' => 'nullable|string|max:100',
            'domain_expertise' => 'nullable|string|max:255',
            'status' => 'required|in:verified,non_verified',
            'fund_ids' => 'required|string',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Convert fund_ids string into array
        |--------------------------------------------------------------------------
        */

        $fundIds = collect(
            explode(',', $request->fund_ids)
        )
            ->map(function ($id) {
                return trim($id);
            })
            ->filter(function ($id) {
                return is_numeric($id) && (int) $id > 0;
            })
            ->map(function ($id) {
                return (int) $id;
            })
            ->unique()
            ->values();

        if ($fundIds->isEmpty()) {
            return back()
                ->withErrors([
                    'fund_ids' => 'Please select at least one fund.'
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Get selected funds
        |--------------------------------------------------------------------------
        |
        | We get client_id directly from the funds.
        |
        */

        $funds = Fund::whereIn('id', $fundIds)
            ->select('id', 'fund_name', 'client_id')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Make sure all requested funds actually exist
        |--------------------------------------------------------------------------
        */

        if ($funds->count() !== $fundIds->count()) {
            return back()
                ->withErrors([
                    'fund_ids' => 'One or more selected funds are invalid.'
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Make sure every fund has a client
        |--------------------------------------------------------------------------
        */

        $fundsWithoutClient = $funds
            ->filter(function ($fund) {
                return empty($fund->client_id);
            });

        if ($fundsWithoutClient->isNotEmpty()) {
            return back()
                ->withErrors([
                    'fund_ids' => 'One or more selected funds are not assigned to a client.'
                ])
                ->withInput();
        }

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | Group funds by client
            |--------------------------------------------------------------------------
            |
            | Example:
            |
            | Client 1 => Fund 5, Fund 8
            | Client 2 => Fund 7
            |
            */

            $fundsByClient = $funds->groupBy('client_id');

            foreach ($fundsByClient as $clientId => $clientFunds) {

                /*
                |--------------------------------------------------------------------------
                | Create a separate reviewer for this client
                |--------------------------------------------------------------------------
                |
                | IMPORTANT:
                |
                | We intentionally do NOT use:
                |
                | Reviewer::where('email', ...)
                |
                | because the same reviewer email can exist for
                | different clients.
                |
                */

                $reviewer = Reviewer::create([
                    'client_id' => $clientId,
                    'full_name' => $request->full_name,
                    'phone_number' => $request->phone_number,
                    'email' => $request->email,
                    'role' => $request->role,
                    'domain_expertise' => $request->domain_expertise,
                    'password' => Hash::make($request->password),
                    'status' => $request->status,
                ]);

                /*
                |--------------------------------------------------------------------------
                | Assign this reviewer to this client's selected funds
                |--------------------------------------------------------------------------
                */

                $clientFundIds = $clientFunds
                    ->pluck('id')
                    ->toArray();

                $reviewer->funds()->sync($clientFundIds);
            }

            DB::commit();

            return back()->with(
                'success',
                'Reviewer created and assigned to the selected funds successfully.'
            );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withErrors([
                    'error' => 'Failed to create reviewer: ' . $e->getMessage()
                ])
                ->withInput();
        }
    }

    /**
     * Update reviewer.
     *
     * This remains client-specific.
     * Super Admin can update the reviewer directly.
     */
 public function update(Request $request, Reviewer $reviewer)
{
    $request->validate([
        'full_name' => 'required|string|max:255',
        'phone_number' => 'nullable|string|max:20',
        'email' => 'required|email|max:255',
        'role' => 'nullable|string|max:100',
        'domain_expertise' => 'nullable|string|max:255',
        'password' => 'nullable|string|min:6',
        'status' => 'required|in:verified,non_verified',
        'fund_ids' => 'nullable|string',
    ]);

    /*
    |--------------------------------------------------------------------------
    | Convert fund_ids into array
    |--------------------------------------------------------------------------
    */

    $fundIds = collect();

    if (!empty($request->fund_ids)) {

        $fundIds = collect(
            explode(',', $request->fund_ids)
        )
            ->map(function ($id) {
                return trim($id);
            })
            ->filter(function ($id) {
                return is_numeric($id) && (int) $id > 0;
            })
            ->map(function ($id) {
                return (int) $id;
            })
            ->unique()
            ->values();
    }

    /*
    |--------------------------------------------------------------------------
    | Validate selected funds belong to reviewer's client
    |--------------------------------------------------------------------------
    */

    $validFundIds = Fund::where('client_id', $reviewer->client_id)
        ->whereIn('id', $fundIds)
        ->pluck('id')
        ->toArray();

    /*
    |--------------------------------------------------------------------------
    | Prevent assigning funds from another client
    |--------------------------------------------------------------------------
    */

    if ($fundIds->count() !== count($validFundIds)) {
        return back()
            ->withErrors([
                'fund_ids' => 'One or more selected funds do not belong to this reviewer\'s client.'
            ])
            ->withInput();
    }

    DB::beginTransaction();

    try {

        /*
        |--------------------------------------------------------------------------
        | Update reviewer details
        |--------------------------------------------------------------------------
        */

        $reviewer->update([
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'role' => $request->role,
            'domain_expertise' => $request->domain_expertise,
            'status' => $request->status,

            'password' => !empty($request->password)
                ? Hash::make($request->password)
                : $reviewer->password,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update assigned funds
        |--------------------------------------------------------------------------
        |
        | sync() will:
        |
        | - Keep already selected funds
        | - Add newly selected funds
        | - Remove funds that were unselected
        |
        */

        $reviewer->funds()->sync($validFundIds);

        DB::commit();

        return back()->with(
            'success',
            'Reviewer and assigned funds updated successfully.'
        );

    } catch (\Throwable $e) {

        DB::rollBack();

        return back()
            ->withErrors([
                'error' => 'Failed to update reviewer: ' . $e->getMessage()
            ])
            ->withInput();
    }
}

    /**
     * Delete reviewer.
     */
    public function destroy(Reviewer $reviewer)
    {
        $reviewer->delete();

        return back()->with(
            'success',
            'Reviewer deleted successfully.'
        );
    }

    /**
     * Assign funds to an existing reviewer.
     *
     * This is also handled based on the reviewer's client.
     */
    public function assignFunds(Request $request)
    {
        $request->validate([
            'reviewer_id' => 'required|exists:reviewers,id',
            'fund_ids' => 'nullable|string',
        ]);

        $reviewer = Reviewer::findOrFail(
            $request->reviewer_id
        );

        $fundIds = [];

        if (!empty($request->fund_ids)) {

            $fundIds = collect(
                explode(',', $request->fund_ids)
            )
                ->map(function ($id) {
                    return trim($id);
                })
                ->filter(function ($id) {
                    return is_numeric($id) && (int) $id > 0;
                })
                ->map(function ($id) {
                    return (int) $id;
                })
                ->unique()
                ->values()
                ->toArray();
        }

        /*
        |--------------------------------------------------------------------------
        | Only allow funds belonging to the reviewer's client
        |--------------------------------------------------------------------------
        */

        $validFundIds = Fund::where('client_id', $reviewer->client_id)
            ->whereIn('id', $fundIds)
            ->pluck('id')
            ->toArray();

        $reviewer->funds()->sync($validFundIds);

        return back()->with(
            'success',
            'Funds assigned successfully.'
        );
    }
}