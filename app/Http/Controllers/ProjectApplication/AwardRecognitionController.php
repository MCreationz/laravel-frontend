<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\FundApplication;
use App\Models\FundApplicationAwardRecognition;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class AwardRecognitionController extends Controller
{

public function index(Fund $fund)
{
    $organization = auth('organization')->user();

    $fundApplication = FundApplication::with('awardRecognitions')
        ->where('fund_id', $fund->id)
        ->where('organization_id', $organization->id)
        ->first();

    $awards = $fundApplication?->awardRecognitions ?? collect();

    $updated = FundApplication::where('fund_id', $fund->id)
        ->where('organization_id', $organization->id)
        ->where('status', 'draft')
        ->update([
            'status' => 'active',
            'current_step' => 'application_evaluation',
        ]);

   
        NotificationService::createOnce(
            $fund->client,
            'application_started_' . $fund->id . '_' . $organization->id,
            'New Fund Application',
            "{$organization->organization_name} has started an application for '{$fund->fund_name}'.",
            [
                'fund_id' => $fund->id,
                'organization_id' => $organization->id,
                'application_id' => $fundApplication?->id,
            ]
        );
    

    return view('projects.apply.awards-recognition.index', compact(
        'fund',
        'fundApplication',
        'awards'
    ));
}
    public function store(Request $request, Fund $fund)
    {
        $fundApplication = FundApplication::where('fund_id', $fund->id)
            ->where('organization_id', auth('organization')->id())
            ->firstOrFail();

        $award = new FundApplicationAwardRecognition;

        $award->fund_application_id = $fundApplication->id;
        $award->award_name = $request->award_name;
        $award->awarding_organization = $request->awarding_organization;
        $award->year = $request->year;

        if ($request->hasFile('certificate')) {
            $award->certificate = $request->file('certificate')
                ->store('fund-applications/award-certificates', 'public');
        }

        $award->save();

        return back()->with('success', 'Award added successfully.');
    }

    public function update(
        Request $request,
        Fund $fund,
        FundApplicationAwardRecognition $awardRecognition
    ) {
        $awardRecognition->award_name = $request->award_name;
        $awardRecognition->awarding_organization = $request->awarding_organization;
        $awardRecognition->year = $request->year;

        if ($request->hasFile('certificate')) {
            $awardRecognition->certificate = $request->file('certificate')
                ->store('fund-applications/award-certificates', 'public');
        }

        $awardRecognition->save();

        return back()->with('success', 'Award updated successfully.');
    }

    public function destroy(
        Fund $fund,
        FundApplicationAwardRecognition $awardRecognition
    ) {
        $awardRecognition->delete();

        return back()->with('success', 'Award deleted successfully.');
    }
}
