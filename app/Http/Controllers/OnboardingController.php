<?php

namespace App\Http\Controllers;

use App\Models\OrganizationAddress;
use App\Models\OrganizationOperationalDetail;
use App\Models\OrganizationProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OnboardingController extends Controller
{
    public function stepOne()
    {
        $organization = Auth::guard('organization')->user();
        $profile = $organization->profile; // relation
        // return $profile;

        return view('onboarding.step1', compact('profile'));
    }

    public function storeStepOne(Request $request)
    {
        // return $request->all();
        // Validate the request
        $validated = $request->validate([
            'pan_number' => 'required|string|size:10',
            'legal_name' => 'required|string|max:255',
            'date_of_incorporation' => 'required|date',
            'brand_name' => 'nullable|string|max:255',
            'website_url' => 'nullable|url|max:2000',
            'linkedin_url' => 'nullable|url|max:2000',
            'contact_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'mobile_no' => 'required|digits:10',
        ]);

        // Get authenticated organization
        $organization = Auth::guard('organization')->user();

        if (! $organization) {
            abort(403, 'Unauthorized');
        }

        // Create or update profile
        OrganizationProfile::updateOrCreate(
            ['organization_id' => $organization->id],
            $validated
        );

        // Redirect to step 2
        return redirect()->route('onboarding.step2');
    }

    public function stepTwo()
    {
        $address = OrganizationAddress::where('organization_id', auth()->guard('organization')->id())->first();

        return view('onboarding.step2', compact('address'));
    }

public function storeStepTwo(Request $request)
{
    // Copy Head Office Address to Registered Office Address
    if ($request->is_portal_same_as_office == "1") {

        $request->merge([
            'portal_address_line_1' => $request->office_address_line_1,
            'portal_address_line_2' => $request->office_address_line_2,
            'portal_city'          => $request->office_city,
            'portal_district'      => $request->office_district,
            'portal_state'         => $request->office_state,
            'portal_pin_code'      => $request->office_pin_code,
        ]);
    }

    // Validation
    $validator = Validator::make($request->all(), [

        // Head Office Address
        'office_address_line_1' => 'required|string|max:255',
        'office_address_line_2' => 'nullable|string|max:255',
        'office_city'           => 'required|string|max:100',
        'office_district'       => 'required|string|max:100',
        'office_state'          => 'required|string|max:100',
        'office_pin_code'       => 'required|digits:6',

        // Registered Office Address
        'portal_address_line_1' => 'required|string|max:255',
        'portal_address_line_2' => 'nullable|string|max:255',
        'portal_city'           => 'required|string|max:100',
        'portal_district'       => 'required|string|max:100',
        'portal_state'          => 'required|string|max:100',
        'portal_pin_code'       => 'required|digits:6',

    ], [

        // Head Office Errors
        'office_address_line_1.required' => 'Head office address line 1 is required.',
        'office_city.required'           => 'Head office city is required.',
        'office_district.required'       => 'Head office district is required.',
        'office_state.required'          => 'Head office state is required.',
        'office_pin_code.required'       => 'Head office pin code is required.',
        'office_pin_code.digits'         => 'Head office pin code must be exactly 6 digits.',

        // Registered Office Errors
        'portal_address_line_1.required' => 'Registered office address line 1 is required.',
        'portal_city.required'           => 'Registered office city is required.',
        'portal_district.required'       => 'Registered office district is required.',
        'portal_state.required'          => 'Registered office state is required.',
        'portal_pin_code.required'       => 'Registered office pin code is required.',
        'portal_pin_code.digits'         => 'Registered office pin code must be exactly 6 digits.',
    ]);

    if ($validator->fails()) {

        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    $validated = $validator->validated();

    $validated['organization_id'] = Auth::guard('organization')->id();

    OrganizationAddress::updateOrCreate(
        ['organization_id' => $validated['organization_id']],
        $validated
    );

    return redirect()->route('onboarding.step3');
}
    public function stepThree()
    {
        $organization = Auth::guard('organization')->user();

        $operationalDetail = OrganizationOperationalDetail::firstOrNew([
            'organization_id' => $organization->id,
        ]);

        return view('onboarding.step3', compact('operationalDetail'));
    }

    public function storeStepThree(Request $request)
    {
        // return $request->all();
        $organization = Auth::guard('organization')->user();

        // Base data
        $data = [
            'organization_id' => $organization->id,
            'organization_type' => $request->organization_type,
            'state' => $request->state,
            'years_of_operation_months' => $request->years_of_operation_months,
            'key_achievements' => $request->key_achievements,
            'total_beneficiaries' => $request->total_beneficiaries,
        ];

        /*
        |------------------------------------------------------------------
        | PROFIT
        |------------------------------------------------------------------
        */
        if ($request->organization_type === 'profit') {

            // calculate total (DON’T trust frontend)
            $totalFunding =
                ($request->grants_received ?? 0) +
                ($request->equity_raised ?? 0) +
                ($request->bootstrapped_friends_family ?? 0) +
                ($request->debt ?? 0);

            $data = array_merge($data, [
                'registration_type' => $request->registration_type,
                'current_stage' => $request->current_stage,
                'product_category' => $request->product_category,

                'dpiit_recognition' => $request->dpiit_recognition ?? 0,
                'msme_registered' => $request->msme_registered ?? 0,
                'gstin_registration' => $request->gstin_registration ?? 0,

                'lifetime_revenue_lakh' => $request->lifetime_revenue_lakh,
                'ongoing_year_revenue_lakh' => $request->ongoing_year_revenue_lakh,
                'last_year_revenue_lakh' => $request->last_year_revenue_lakh,
                'last_to_last_year_revenue_lakh' => $request->last_to_last_year_revenue_lakh,

                'grants_received' => $request->grants_received,
                'equity_raised' => $request->equity_raised,
                'bootstrapped_friends_family' => $request->bootstrapped_friends_family,
                'debt' => $request->debt,

                'total_funding_lakh' => $totalFunding,
            ]);
        }

        /*
        |------------------------------------------------------------------
        | NON PROFIT
        |------------------------------------------------------------------
        */
        if ($request->organization_type === 'non_profit') {

            $totalFunding =
                ($request->govt_grants ?? 0) +
                ($request->foreign_donations_institutional ?? 0) +
                ($request->promoters_money ?? 0) +
                ($request->individual_donations ?? 0);

            $data = array_merge($data, [
                'registration_type' => $request->registration_type,
                'domain_of_expertise' => $request->domain_of_expertise,

                'status_12a' => $request->status_12a ?? 0,
                'status_80g' => $request->status_80g ?? 0,
                'status_fcra' => $request->status_fcra ?? 0,
                'csr_1_registration' => $request->csr_1_registration ?? 0,

                'lifetime_revenue_lakh' => $request->lifetime_revenue_lakh,
                'ongoing_year_revenue_lakh' => $request->ongoing_year_revenue_lakh,
                'last_year_revenue_lakh' => $request->last_year_revenue_lakh,
                'last_to_last_year_revenue_lakh' => $request->last_to_last_year_revenue_lakh,

                'govt_grants' => $request->govt_grants,
                'foreign_donations_institutional' => $request->foreign_donations_institutional,
                'promoters_money' => $request->promoters_money,
                'individual_donations' => $request->individual_donations,

                'total_funding_lakh' => $totalFunding,
            ]);
        }

        OrganizationOperationalDetail::updateOrCreate(
            ['organization_id' => $organization->id],
            $data
        );

        return redirect()->route('dashboard');
    }
}
