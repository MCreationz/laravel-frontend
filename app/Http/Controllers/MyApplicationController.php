<?php

namespace App\Http\Controllers;

use App\Models\FundApplication;
use Illuminate\Http\Request;

class MyApplicationController extends Controller
{
    public function index(Request $request)
    {
        $applications = FundApplication::with([
                'fund.client'
            ])
            ->where('organization_id', auth('organization')->id())
            ->when($request->search, function ($query, $search) {
                $query->whereHas('fund', function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('my-applications.index', compact('applications'));
    }
}