<?php

namespace App\Http\Controllers;

use App\Models\OrganizationAddress;
use App\Models\OrganizationOperationalDetail;
use App\Models\OrganizationProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function stepOne()
    {
        return view('onboarding.step1');
    }

    public function storeStepOne(Request $request)
    {
        // return $request->all();
        // Validate the request
        $validated = $request->validate([
            'pan_number' => 'required|string|max:20',
            'legal_name' => 'required|string|max:255',
            'date_of_incorporation' => 'required|date',
            'brand_name' => 'nullable|string|max:255',
            'website_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
        ]);

        // Get authenticated organization
        $organization = Auth::guard('organization')->user();

        // Create or update profile
        $profile = OrganizationProfile::updateOrCreate(
            ['organization_id' => $organization->id],
            $validated
        );

        // Redirect to step 2
        return redirect()->route('onboarding.step2');
    }

    public function stepTwo()
    {
        return view('onboarding.step2');
    }

    public function storeStepTwo(Request $request)
    {
        $organization = Auth::guard('organization')->user();

        $validated = $request->validate([
            // Office address
            'office_house_floor_no' => 'required|string|max:100',
            'office_address_line_1' => 'required|string|max:255',
            'office_address_line_2' => 'nullable|string|max:255',
            'office_town' => 'required|string|max:100',
            'office_city' => 'required|string|max:100',
            'office_district' => 'required|string|max:100',
            'office_state' => 'required|string|max:100',
            'office_pin_code' => 'required|string|max:10',

            // Portal address
            'portal_house_floor_no' => 'nullable|string|max:100',
            'portal_address_line_1' => 'nullable|string|max:255',
            'portal_address_line_2' => 'nullable|string|max:255',
            'portal_town' => 'nullable|string|max:100',
            'portal_city' => 'nullable|string|max:100',
            'portal_district' => 'nullable|string|max:100',
            'portal_state' => 'nullable|string|max:100',
            'portal_pin_code' => 'nullable|string|max:10',

            'is_portal_same_as_office' => 'nullable|boolean',
        ]);

        $validated['organization_id'] = $organization->id;

        OrganizationAddress::updateOrCreate(
            ['organization_id' => $organization->id],
            $validated
        );

        return redirect()->route('onboarding.step3');
    }

    public function stepThree()
    {
        return view('onboarding.step3');
    }

    public function storeStepThree(Request $request)
    {
        $organization = Auth::user()->organization;

        $data = [
            'organization_id' => $organization->id,
            'organization_type' => $request->organization_type,
            'state' => $request->state,
            'years_of_operation_months' => $request->years_of_operation_months,
            'key_achievements' => $request->key_achievements,
            'total_funding_lakh' => $request->total_funding_lakh,
        ];

        /*
        |--------------------------------------------------------------------------
        | PROFIT ORGANIZATION
        |--------------------------------------------------------------------------
        */

        if ($request->organization_type === 'profit') {

            $data = array_merge($data, [
                'registration_type' => $request->registration_type,
                'current_stage' => $request->current_stage,
                'product_category' => $request->product_category,

                'dpiit_recognition' => $request->dpiit_recognition,
                'msme_registered' => $request->msme_registered,
                'gstin_registration' => $request->gstin_registration,

                'total_beneficiaries' => $request->total_beneficiaries_served,

                'lifetime_revenue_lakh' => $request->lifetime_revenue_lakh,
                'ongoing_year_revenue_lakh' => $request->ongoing_year_revenue_lakh,
                'last_year_revenue_lakh' => $request->last_year_revenue_lakh,
                'last_to_last_year_revenue_lakh' => $request->last_to_last_year_revenue_lakh,

                'grants_received' => $request->grants_received,
                'equity_raised' => $request->equity_raised,
                'bootstrapped_friends_family' => $request->bootstrapped_friends_family,
                'debt' => $request->debt,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | NON PROFIT ORGANIZATION
        |--------------------------------------------------------------------------
        */

        if ($request->organization_type === 'non_profit') {

            $data = array_merge($data, [
                'registration_type' => $request->registration_type,
                'domain_of_expertise' => $request->domain_of_expertise,

                'status_12a' => $request->status_12a,
                'status_80g' => $request->status_80g,
                'status_fcra' => $request->status_fcra,
                'csr_1_registration' => $request->csr_1_registration,

                'total_beneficiaries' => $request->total_beneficiaries,

                'lifetime_revenue_lakh' => $request->lifetime_turnover_lakh,
                'ongoing_year_revenue_lakh' => $request->ongoing_year_turnover_lakh,
                'last_year_revenue_lakh' => $request->last_year_turnover_lakh,
                'last_to_last_year_revenue_lakh' => $request->last_to_last_year_turnover_lakh,

                'govt_grants' => $request->govt_grants,
                'foreign_donations_institutional' => $request->foreign_donations_institutional,
                'promoters_money' => $request->promoters_money,
                'individual_donations' => $request->individual_donations,
            ]);
        }

        OrganizationOperationalDetail::updateOrCreate(
            ['organization_id' => $organization->id],
            $data
        );

        return redirect()->route('dashboard');
    }
}
