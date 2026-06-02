<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Models\FundApplication;

class DocumentController extends Controller
{
    public function index($fund)
    {
        // optional: validate fund exists
        $fund = FundApplication::findOrFail($fund);

        return view('projects.apply.documents', compact('fund'));
    }
}