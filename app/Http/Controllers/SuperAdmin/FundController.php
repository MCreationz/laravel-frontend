<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;

class FundController extends Controller
{
    public function index()
    {
        return view('superadmin.funds.index');
    }
}