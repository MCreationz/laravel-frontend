<?php

namespace App\Http\Controllers\ProjectApplication;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\FundApplication;
use App\Models\FundApplicationSeniorManagement;
use Illuminate\Http\Request;

class SeniorManagementController extends Controller
{
public function index(Fund $fund)
{
    $fund->load([
        'client',
        'snapshot',
        'themes',
    ]);

    $application = FundApplication::with('seniorManagement')
        ->where('fund_id', $fund->id)
        ->where('organization_id', auth('organization')->id())
        ->firstOrFail();

    $managements = $application->seniorManagement;

    return view(
        'projects.apply.senior-management',
        compact(
            'fund',
            'application',
            'managements'
        )
    );
}

    public function store(Request $request, Fund $fund)
    {

      //  return $request->all();
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'nature_of_engagement' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:50',
            'date_of_birth' => 'nullable|date',
            'date_of_appointment' => 'nullable|date',
            'highest_qualification' => 'nullable|string|max:255',
            'roles_and_responsibilities' => 'nullable|string',
            'total_years_of_experience' => 'nullable|integer|min:0',
            'resume_cv' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg|max:5120',


        ]);
        if (
    $request->filled('date_of_birth') &&
    $request->filled('date_of_appointment') &&
    strtotime($request->date_of_appointment) < strtotime($request->date_of_birth)
) {
    return back()
        ->withInput()
        ->with('error', "Date of Appointment can not be earlier than Director's DoB");
}

        $application = FundApplication::where('fund_id', $fund->id)
            ->where('organization_id', auth('organization')->id())
            ->firstOrFail();

        $resumePath = null;

        if ($request->hasFile('resume_cv')) {
            $resumePath = $request->file('resume_cv')
                ->store('fund-applications/senior-management', 'public');
        }

        FundApplicationSeniorManagement::create([
            'fund_application_id' => $application->id,
            'name' => $request->name,
            'designation' => $request->designation,
            'nature_of_engagement' => $request->nature_of_engagement,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'date_of_appointment' => $request->date_of_appointment,
            'highest_qualification' => $request->highest_qualification,
            'roles_and_responsibilities' => $request->roles_and_responsibilities,
            'total_years_of_experience' => $request->total_years_of_experience,
            'resume_cv' => $resumePath,
        ]);

        return back()->with('success', 'Senior management member added successfully.');
    }

    public function update(
        Request $request,
        Fund $fund,
        FundApplicationSeniorManagement $management
    ) {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'nature_of_engagement' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:50',
            'date_of_birth' => 'nullable|date',
            'date_of_appointment' => 'nullable|date',
            'highest_qualification' => 'nullable|string|max:255',
            'roles_and_responsibilities' => 'nullable|string',
            'total_years_of_experience' => 'nullable|integer|min:0',
            'resume_cv' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if (
    $request->filled('date_of_birth') &&
    $request->filled('date_of_appointment') &&
    strtotime($request->date_of_appointment) < strtotime($request->date_of_birth)
) {
    return back()
        ->withInput()
        ->with('error', "Date of Appointment can not be earlier than Director's DoB");
}

        $application = FundApplication::where('fund_id', $fund->id)
            ->where('organization_id', auth('organization')->id())
            ->firstOrFail();

        abort_if(
            $management->fund_application_id !== $application->id,
            403
        );

        $data = $request->only([
            'name',
            'designation',
            'nature_of_engagement',
            'gender',
            'date_of_birth',
            'date_of_appointment',
            'highest_qualification',
            'roles_and_responsibilities',
            'total_years_of_experience',
        ]);

        if ($request->hasFile('resume_cv')) {
            $data['resume_cv'] = $request->file('resume_cv')
                ->store('fund-applications/senior-management', 'public');
        }

        $management->update($data);

        return back()->with('success', 'Senior management member updated successfully.');
    }

    public function destroy(
        Fund $fund,
        FundApplicationSeniorManagement $management
    ) {
        $application = FundApplication::where('fund_id', $fund->id)
            ->where('organization_id', auth('organization')->id())
            ->firstOrFail();

        abort_if(
            $management->fund_application_id !== $application->id,
            403
        );

        $management->delete();

        return back()->with('success', 'Senior management member deleted successfully.');
    }
}
