<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\FundApplication;

class DocumentController extends Controller
{
      public function npo(Fund $fund)
    {
        return view('projects.apply.documents.npo');
    }

    public function startup(Fund $fund)
    {
        return view('projects.apply.documents.startup');
    }


}