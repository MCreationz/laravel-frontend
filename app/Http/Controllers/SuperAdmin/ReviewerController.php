<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;

class ReviewerController extends Controller
{
    public function index()
    {
        return view('superadmin.reviewers.index');
    }
}