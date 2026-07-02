<?php

namespace App\Http\Controllers;

use App\Models\FundApplication;
use Illuminate\Http\Request;

class MyApplicationController extends Controller
{
public function index(Request $request)
{
    $applications = FundApplication::with(['fund.client'])
        ->where('organization_id', auth('organization')->id())

        ->when($request->search, function ($query, $search) {
            $query->whereHas('fund', function ($q) use ($search) {
                $q->where('fund_name', 'like', "%{$search}%");
            });
        })

        ->when($request->status, function ($query, $status) {
            $query->where('status', $status);
        })

        // ->when($request->fund_type, function ($query, $type) {
        //     $query->whereHas('fund', function ($q) use ($type) {
        //         $q->where('fund_type', $type);
        //     });
        // })

        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('my-applications.index', compact('applications'));
}

public function show($applicationId)
{
  $application = FundApplication::with([
    'fund:id,fund_name',
    'theme:id,theme_name',
    'subTheme:id,sub_theme_name',
    'answers.questionnaire',    
])
->where('id', $applicationId)
->where('organization_id', auth('organization')->id())
->firstOrFail();

    return response()->json([
        'success' => true,
        'application' => $application,
    ]);
}


}