<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund; // assuming your fund model is Fund

class DiscoverFundController extends Controller
{
public function index(Request $request)
{
    $funds = Fund::query()

        // SEARCH
        ->when($request->search, function ($query, $search) {
            $query->where('fund_name', 'like', "%{$search}%");
        })

        // STATUS
        ->when($request->status, function ($query, $status) {
            $query->where('status', $status);
        })

        // SNAPSHOT FILTERS
        ->when(
            $request->filled('fund_type') ||
            $request->filled('is_npo') ||
            $request->filled('is_startup'),
            function ($query) use ($request) {

                $query->whereHas('snapshot', function ($q) use ($request) {

                    if ($request->filled('fund_type')) {
                        $q->where('fund_type', $request->fund_type);
                    }

                    if ($request->filled('is_npo')) {
                        $q->where('is_npo', $request->boolean('is_npo'));
                    }

                    if ($request->filled('is_startup')) {
                        $q->where('is_startup', $request->boolean('is_startup'));
                    }
                });
            }
        )

        ->latest()
        ->paginate(10);

    return view('discover-funds.index', compact('funds'));
}

}