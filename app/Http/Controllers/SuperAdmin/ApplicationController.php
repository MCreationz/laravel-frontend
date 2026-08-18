<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use App\Models\Company;
use App\Models\FundApplication;
use App\Models\FundingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::with(['user', 'company', 'fundingCategory'])
            ->paginate(10);

        return view('superadmin.applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $companies = Company::all();
        $fundingCategories = FundingCategory::all();

        return view('superadmin.applications.create', compact('users', 'companies', 'fundingCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'company_id' => 'required|exists:companies,id',
            'funding_category_id' => 'required|exists:funding_categories,id',
            'title' => 'required|string|max:255',
            'status' => 'required|string|in:draft,submitted',
            'submitted_at' => 'nullable|date',
        ]);

        Application::create($request->all());

        return redirect()->route('superadmin.applications.index')
            ->with('success', 'Application created successfully.');
    }


    public function updateDetails(Request $request)
    {
        $validated = $request->validate([
            'application_id'    => 'required|integer',
            'organization_name' => 'required|string|max:255',
            'organization_type' => 'required|in:npo,startup',
            'contact_person'    => 'nullable|string|max:255',
            'email'             => 'required|email|max:255',
            'phone_number'      => 'required|string|max:20',
            'state'             => 'required|string',
            'status'            => 'required|in:active,inactive,draft',
            'pan_number'        => 'required|string|max:20',
            'vintage'           => 'required|integer|min:0',
            'annual_turnover'   => 'nullable|string',
        ]);

        DB::transaction(function () use ($validated) {

            /*
        |--------------------------------------------------------------------------
        | Application
        |--------------------------------------------------------------------------
        */

            $application = FundApplication::findOrFail(
                $validated['application_id']
            );

            $application->status = $validated['status'];
            $application->save();


            /*
        |--------------------------------------------------------------------------
        | Organization
        |--------------------------------------------------------------------------
        */

            $organization = $application->organization;

            $organization->organization_name = $validated['organization_name'];

            /*
         * Frontend:
         * npo     => NPO
         * startup => Startup
         *
         * Backend:
         * funder      => NPO
         * fund_seeker  => Startup
         */

            $organization->role = $validated['organization_type'] === 'npo'
                ? 'funder'
                : 'fund_seeker';

            $organization->work_email = $validated['email'];

            $organization->save();


            /*
        |--------------------------------------------------------------------------
        | Organization Profile
        |--------------------------------------------------------------------------
        */

            $profile = $organization->profile;

            $profile->contact_name = $validated['contact_person'];
            $profile->mobile_no = $validated['phone_number'];
            $profile->pan_number = $validated['pan_number'];

            /*
         * Vintage is submitted as an age, e.g. 10.
         *
         * Convert it back to an approximate
         * date of incorporation.
         */
            $profile->date_of_incorporation = now()
                ->subYears((int) $validated['vintage'])
                ->format('Y-m-d');

            $profile->save();


            /*
        |--------------------------------------------------------------------------
        | Operational Details
        |--------------------------------------------------------------------------
        */

           $operationalDetail = $organization->operationalDetail;

            $operationalDetail->state = $validated['state'];
            $operationalDetail->last_year_revenue_lakh =
                $validated['annual_turnover'];

            $operationalDetail->save();
        });

        return redirect()
            ->back()
            ->with('success', 'Application details updated successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        $users = User::all();
        $companies = Company::all();
        $fundingCategories = FundingCategory::all();

        return view('superadmin.applications.edit', compact('application', 'users', 'companies', 'fundingCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $request->validate([

            'status' => 'required|string',

        ]);

        $application->update($request->all());

        return redirect()->route('superadmin.applications.index')
            ->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('superadmin.applications.index')
            ->with('success', 'Application deleted successfully.');
    }
}
