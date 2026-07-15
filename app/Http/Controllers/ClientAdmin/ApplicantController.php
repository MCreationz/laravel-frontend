<?php

namespace App\Http\Controllers\ClientAdmin;

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
    ->whereHas('fund', function ($q) {
        $q->where('client_id', auth('client_admin')->id());
    })

    // Filter by fund
    ->when($request->fund_id, function ($query, $fundId) {
        $query->where('fund_id', $fundId);
    })

    

    // Search
    ->when($request->search, function ($query, $search) {
        $query->whereHas('organization', function ($q) use ($search) {
            $q->where('organization_name', 'like', "%{$search}%")
                ->orWhere('work_email', 'like', "%{$search}%");
        });
    })




    // Type filter
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

    // Status filter
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


    return view('client-admin.applicants.index', compact('applicants'));
}
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
