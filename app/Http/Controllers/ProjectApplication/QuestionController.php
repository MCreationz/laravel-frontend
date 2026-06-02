<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Models\Fund;

class QuestionController extends Controller
{
    public function index(Fund $fund)
    {
        return view('projects.apply.questions', compact('fund'));
    }
}