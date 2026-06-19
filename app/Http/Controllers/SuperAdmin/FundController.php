<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use Illuminate\Http\Request;

class FundController extends Controller
{
    public function index(Request $request)
    {
            $funds = Fund::with('client')

            ->when($request->filled('search'), function ($query) use ($request) {

                $search = $request->search;

                $query->where(function ($q) use ($search) {

                    $q->where('fund_name', 'like', "%{$search}%")
                        ->orWhere('fund_owner', 'like', "%{$search}%")
                        ->orWhereHas('client', function ($client) use ($search) {
                            $client->where('organization_name', 'like', "%{$search}%");
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
        return view('superadmin.funds.index',compact('funds'));
    }
}