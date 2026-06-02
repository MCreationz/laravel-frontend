<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Models\Fund;

class SeniorManagementController extends Controller
{
    public function index(Fund $fund)
    {
        $fund->load([
            'client',
            'snapshot',
            'themes',
        ]);

        return view(
            'projects.apply.senior-management',
            compact('fund')
        );
    }
}