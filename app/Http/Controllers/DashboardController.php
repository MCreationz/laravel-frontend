<?php

namespace App\Http\Controllers;

use App\Models\Fund;

class DashboardController extends Controller
{
  public function index()
{
    $funds = Fund::with('snapshot')
        ->latest()
        ->get();

    return view('dashboard.index', compact('funds'));
}
}