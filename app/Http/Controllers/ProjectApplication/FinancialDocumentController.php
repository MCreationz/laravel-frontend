<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Models\Fund;

class FinancialDocumentController extends Controller
{
    public function npo(Fund $fund)
    {
        return view('projects.apply.financial-documents.npo');
    }

    public function startup(Fund $fund)
    {
        return view('projects.apply.financial-documents.startup');
    }
}
