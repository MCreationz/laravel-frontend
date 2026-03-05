<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use App\Models\Sector;
use App\Models\Application;

class DashboardController extends Controller
{
public function index()
{
    return view('superadmin.dashboard', [
        'totalUsers' => User::count(),
        'totalCompanies' => Company::count(),
        'totalSectors' => Sector::count(),
        'totalApplications' => Application::count(),

        'applicationsByStatus' => [
            Application::where('status', 'draft')->count(),
            Application::where('status', 'submitted')->count(),
            Application::where('status', 'approved')->count(),
            Application::where('status', 'rejected')->count(),
        ],

        'sectorNames' => Sector::pluck('name'),
        'companiesBySector' => Sector::withCount('companies')->pluck('companies_count'),
    ]);
}



}
