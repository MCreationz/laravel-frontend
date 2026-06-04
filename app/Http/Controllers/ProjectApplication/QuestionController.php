<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\FundApplication;
use App\Models\FundApplicationAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    $request->validate([
    'theme_id' => 'required|exists:fund_themes,id',
    'sub_theme_id' => 'required|exists:fund_themes,id',
    'project_duration' => 'required|integer|min:1',
    'total_budget' => 'required|numeric|min:1',
    'additional_info' => 'nullable|string',

    'answers' => 'required|array|min:1',
    'answers.*' => 'required|string',
]);
    //return $request->all();

    DB::transaction(function () use ($request, $fund) {

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
                'current_step' => 'senior-management',
                'status' => 'draft',
            ]
        );

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

    return redirect()
        ->route('projects.apply.senior-management', $fund);
       
}



}
