<?php

namespace App\Http\Controllers;

use App\Models\Fund;

class ProjectController extends Controller
{
    public function index()
    {

        return view('dashboard.projects.index');
    }

    public function details($id)
    {
        $fund = Fund::with('snapshot')
            ->findOrFail($id);

        return view('projects.detail', compact('fund'));
    }
}
