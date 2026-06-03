<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Models\Fund;

class AwardRecognitionController extends Controller
{
    public function index(Fund $fund)
    {
        return view('projects.apply.awards-recognition.index', compact('fund'));
    }
}