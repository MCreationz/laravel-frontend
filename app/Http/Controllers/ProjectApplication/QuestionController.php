<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationSubmittedMail;
use App\Models\Fund;
use App\Models\FundApplication;
use App\Models\FundApplicationAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class QuestionController extends Controller
{
public function index(Fund $fund)
{
    $fund->load([
        'snapshot',
        'themes',
        'questionnaires',
    ]);

    $application = FundApplication::with('answers')
        ->where('fund_id', $fund->id)
        ->where('organization_id', auth('organization')->id())
        ->first();

    $orgName = auth('organization')->user()->organization_name ?? '';

    return view('projects.apply.questions', compact(
        'fund',
        'orgName',
        'application'
    ));
}
public function store(Request $request, Fund $fund)
{
    $request->merge([
        'total_budget' => str_replace(',', '', $request->total_budget),
    ]);

    $request->validate([
        'theme_id' => 'required|exists:fund_themes,id',
        'sub_theme_id' => 'required|exists:fund_themes,id',
        'project_duration' => 'required|integer|min:1',
        'total_budget' => 'required|numeric|min:1',
        'additional_info' => 'nullable|string',

        'answers' => 'required|array|min:1',
        'answers.*' => 'required|string',
    ]);

    $applicationCreated = false;
    $application = null;

    DB::transaction(function () use ($request, $fund, &$applicationCreated, &$application) {

        $application = FundApplication::updateOrCreate(
            [
                'fund_id' => $fund->id,
                'organization_id' => auth('organization')->id(),
            ],
            [
                'theme_id' => $request->theme_id,
                'sub_theme_id' => $request->sub_theme_id,
                'project_duration' => $request->project_duration,
                'total_budget' => $request->total_budget,
                'additional_info' => $request->additional_info,
                'status' => 'draft',
            ]
        );

        // Check if application was created for the first time
        $applicationCreated = $application->wasRecentlyCreated;

        if (empty($application->current_step)) {
            $application->current_step = 'submission-pending';
            $application->save();
        }

        foreach ($request->answers as $questionId => $answer) {

            FundApplicationAnswer::updateOrCreate(
                [
                    'fund_application_id' => $application->id,
                    'fund_questionnaire_id' => $questionId,
                ],
                [
                    'answer' => $answer,
                ]
            );
        }
    });

    // Send email only once when application is created
if ($applicationCreated) {

    Mail::to(auth('organization')->user()->work_email)
        ->send(new ApplicationSubmittedMail($application, $fund));
}
    return redirect()
        ->route('projects.apply.senior-management', $fund);
}


}
