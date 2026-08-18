<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FundController extends Controller
{
    public function index(Request $request)
    {
        $funds = Fund::with([
            'client',
            'snapshot',
            'themes',
            'documents',
            'questionnaires',
        ])
            ->withCount('applications')
            ->when($request->filled('search'), function ($query) use ($request) {

                $search = $request->search;

                $query->where(function ($q) use ($search) {

                    $q->where('fund_name', 'like', "%{$search}%")
                        ->orWhere('fund_owner', 'like', "%{$search}%")
                        ->orWhereHas('client', function ($client) use ($search) {
                            $client->where(
                                'organization_name',
                                'like',
                                "%{$search}%"
                            );
                        });
                });
            })
            ->when($request->fund_type === 'npo', function ($query) {
                $query->whereHas('snapshot', function ($snapshot) {
                    $snapshot->where('is_npo', 1);
                });
            })
            ->when($request->fund_type === 'startup', function ($query) {
                $query->whereHas('snapshot', function ($snapshot) {
                    $snapshot->where('is_startup', 1);
                });
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('superadmin.funds.index', compact('funds'));
    }


    /*
    |--------------------------------------------------------------------------
    | Update Fund
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'full_name'   => 'required|string|max:255',

            'open_date'   => 'nullable|date',

            'close_date'  => 'nullable|date|after_or_equal:open_date',

            'fund_outlay' => 'required|numeric|min:0',

            'entity_cap'  => 'required|numeric|min:0',

            'status'      => 'required|in:active,suspended',

            'fund_type'   => 'required|in:npo,startup',
        ]);

        DB::transaction(function () use ($validated, $id) {

            /*
        |--------------------------------------------------------------------------
        | Fund
        |--------------------------------------------------------------------------
        */

            $fund = Fund::findOrFail($id);

            $fund->update([
                'fund_name'    => $validated['full_name'],
                'project_start' => $validated['open_date'] ?? null,
                'project_end'   => $validated['close_date'] ?? null,
                'status'        => $validated['status'],
            ]);


            /*
        |--------------------------------------------------------------------------
        | Fund Snapshot
        |--------------------------------------------------------------------------
        */

            $snapshot = $fund->snapshot;

            if (!$snapshot) {
                $snapshot = $fund->snapshot()->create([
                    'fund_id' => $fund->id,
                ]);
            }


            /*
        |--------------------------------------------------------------------------
        | Fund Type
        |--------------------------------------------------------------------------
        */

            if ($validated['fund_type'] === 'npo') {

                $snapshot->is_npo = true;
                $snapshot->is_startup = false;
            } else {

                $snapshot->is_npo = false;
                $snapshot->is_startup = true;
            }


            /*
        |--------------------------------------------------------------------------
        | Fund Outlay
        |--------------------------------------------------------------------------
        */

            $snapshot->fund_outlay = $validated['fund_outlay'];


            /*
        |--------------------------------------------------------------------------
        | Entity Cap
        |--------------------------------------------------------------------------
        */

            $snapshot->single_entity_cap = $validated['entity_cap'];


            $snapshot->save();
        });

        return redirect()
            ->route('superadmin.funds.index')
            ->with('success', 'Fund updated successfully.');
    }

    public function destroy($id)
{
    DB::transaction(function () use ($id) {

        $fund = Fund::findOrFail($id);

        $fund->delete();
    });

    return redirect()
        ->route('superadmin.funds.index')
        ->with('success', 'Fund deleted successfully.');
}
}
