<?php

namespace App\Http\Controllers;

use App\Models\FundApplication;

class MyApplicationController extends Controller
{
    public function index()
    {
        $applications = FundApplication::with([
            'fund',
        ])
            ->where('organization_id', auth('organization')->id())
            ->latest()
            ->get();

        return view('my-applications.index', compact('applications'));
    }
}