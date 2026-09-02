<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Fund;

class FundController extends Controller
{
    /**
     * Get all funds with related data
     */
  public function index()
{
    $today = now()->toDateString();

    $funds = Fund::with([
        'client',
        'reviewers',
        'snapshot',
        'themes',
        'documents',
        'questionnaires',
    ])
        ->where(function ($query) use ($today) {

            // If fund scope is outside, ignore start/end dates
            $query->where('fund_scope', 'outside')

                // Otherwise apply date rules
                ->orWhere(function ($query) use ($today) {

                    // No start and no end date -> always show
                    $query->whereNull('project_start')
                        ->whereNull('project_end');

                })
                ->orWhere(function ($query) use ($today) {

                    // Start date exists, end date doesn't
                    $query->whereNotNull('project_start')
                        ->whereNull('project_end')
                        ->whereDate('project_start', '<=', $today);

                })
                ->orWhere(function ($query) use ($today) {

                    // End date exists, start date doesn't
                    $query->whereNull('project_start')
                        ->whereNotNull('project_end')
                        ->whereDate('project_end', '>=', $today);

                })
                ->orWhere(function ($query) use ($today) {

                    // Both dates exist
                    $query->whereNotNull('project_start')
                        ->whereNotNull('project_end')
                        ->whereDate('project_start', '<=', $today)
                        ->whereDate('project_end', '>=', $today);
                });
        })
        ->get();

    return response()->json([
        'success' => true,
        'data' => $funds,
    ]);
}

    /**
     * Get a single fund with all related data
     */
    public function show($id)
    {
        $fund = Fund::with([
            'client',
            'reviewers',
            'snapshot',
            'themes',
            'documents',
            'questionnaires',
        ])->find($id);

        if (!$fund) {
            return response()->json([
                'success' => false,
                'message' => 'Fund not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $fund,
        ]);
    }
}
