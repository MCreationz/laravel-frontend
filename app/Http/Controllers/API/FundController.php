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
            ->whereDate('project_start', '<=', $today)
            ->where(function ($query) use ($today) {
                $query->whereDate('project_end', '>=', $today)
                    ->orWhereNull('project_end');
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
