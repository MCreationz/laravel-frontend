<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\FundApplication;

class DashboardController extends Controller
{
    public function index()
    {
        $funds = Fund::with('snapshot')
            ->latest()
            ->get();

        $orgId = auth('organization')->id();

        // Base query (important to avoid repetition mistakes)
        $baseQuery = FundApplication::where('organization_id', $orgId);

        $totalApplications = (clone $baseQuery)->count();

        $ongoing = (clone $baseQuery)
            ->where('status', 'ongoing')
            ->count();

        $selected = (clone $baseQuery)
            ->where('status', 'selected')
            ->count();

        $rejected = (clone $baseQuery)
            ->where('status', 'rejected')
            ->count();

        $fundingAvailable = (clone $baseQuery)
            ->where('status', 'selected')
            ->sum('total_budget');

        return view('dashboard.index', compact(
            'funds',
            'totalApplications',
            'ongoing',
            'selected',
            'rejected',
            'fundingAvailable'
        ));
    }
}