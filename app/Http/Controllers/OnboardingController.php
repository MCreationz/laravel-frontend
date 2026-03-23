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
        // Validate the request
        $validated = $request->validate([
            'pan_number' => 'required|string|max:10',
            'legal_name' => 'required|string|max:255',
            'date_of_incorporation' => 'required|date',
            'brand_name' => 'nullable|string|max:255',

            // Allow long URLs + proper URL format validation
            'website_url' => 'nullable|url|max:2000',
            'linkedin_url' => 'nullable|url|max:2000',
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
      $validator = Validator::make($request->all(), [
    'office_house_floor_no' => 'required|string|max:100',
    'office_address_line_1' => 'required|string|max:255',
    'office_address_line_2' => 'nullable|string|max:255',
    'office_town' => 'required|string|max:100',
    'office_city' => 'required|string|max:100',
    'office_district' => 'required|string|max:100',
    'office_state' => 'required|string|max:100',
    'office_pin_code' => 'required|digits:6',

    'portal_house_floor_no' => 'required|string|max:100',
    'portal_address_line_1' => 'required|string|max:255',
    'portal_address_line_2' => 'nullable|string|max:255',
    'portal_town' => 'required|string|max:100',
    'portal_city' => 'required|string|max:100',
    'portal_district' => 'required|string|max:100',
    'portal_state' => 'required|string|max:100',
    'portal_pin_code' => 'required|digits:6',
], [
    // OFFICE ERRORS (Registered Address)
    'office_house_floor_no.required' => 'Registered address house/floor is required.',
    'office_address_line_1.required' => 'Registered address line 1 is required.',
    'office_town.required' => 'Registered address town is required.',
    'office_city.required' => 'Registered address city is required.',
    'office_district.required' => 'Registered address district is required.',
    'office_state.required' => 'Registered address state is required.',
    'office_pin_code.required' => 'Registered address postal code is required.',
    'office_pin_code.digits' => 'Registered address postal code must be exactly 6 digits.',

    // PORTAL ERRORS (Office Address wording as you want)
    'portal_house_floor_no.required' => 'Office address house/floor is required.',
    'portal_address_line_1.required' => 'Office address line 1 is required.',
    'portal_town.required' => 'Office address town is required.',
    'portal_city.required' => 'Office address city is required.',
    'portal_district.required' => 'Office address district is required.',
    'portal_state.required' => 'Office address state is required.',
    'portal_pin_code.required' => 'Office address postal code is required.',
    'portal_pin_code.digits' => 'Office address postal code must be exactly 6 digits.',
]);

        if ($validator->fails()) {

            // Inject portal = office ONLY for error display
            $input = $request->all();

            $input['portal_house_floor_no'] = $input['office_house_floor_no'];
            $input['portal_address_line_1'] = $input['office_address_line_1'];
            $input['portal_address_line_2'] = $input['office_address_line_2'];
            $input['portal_town'] = $input['office_town'];
            $input['portal_city'] = $input['office_city'];
            $input['portal_district'] = $input['office_district'];
            $input['portal_state'] = $input['office_state'];
            $input['portal_pin_code'] = $input['office_pin_code'];

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($input);
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
