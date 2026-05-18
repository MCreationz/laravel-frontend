<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;

class ApplicantController extends Controller
{
    public function index()
    {
        return view('superadmin.applicants.index');
    }
}