<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\FundApplication;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index(Request $request)
    {
        $applicants = FundApplication::with([
            'organization.profile',
            'organization.operationalDetail',
        ])
            ->when($request->search, function ($query, $search) {
                $query->whereHas('organization', function ($q) use ($search) {
                    $q->where('organization_name', 'like', "%{$search}%")
                      ->orWhere('work_email', 'like', "%{$search}%");
                });
            })
            ->when($request->type, function ($query, $type) {

                $role = match ($type) {
                    'npo' => 'funder',
                    'startup' => 'fund_seeker',
                    default => null,
                };

                if ($role) {
                    $query->whereHas('organization', function ($q) use ($role) {
                        $q->where('role', $role);
                    });
                }
            })
            ->when($request->status, function ($query, $status) {

                $query->whereHas('organization', function ($q) use ($status) {

                    if ($status === 'active') {
                        $q->whereNotNull('email_verified_at');
                    }

                    if ($status === 'inactive') {
                        $q->whereNull('email_verified_at');
                    }
                });
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('superadmin.applicants.index', compact('applicants'));
    }
}