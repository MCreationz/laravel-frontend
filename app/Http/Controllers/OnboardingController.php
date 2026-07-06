<?php

namespace App\Http\Controllers;

use App\Models\OrganizationAddress;
use App\Models\OrganizationOperationalDetail;
use App\Models\OrganizationProfile;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $organization = Auth::guard('organization')->user();

        if (! $organization) {
            abort(403, 'Unauthorized');
        }

        $validator = Validator::make($request->all(), [
            'pan_number' => [
                'required',
                'string',
                'size:10',
                Rule::unique('organization_profiles', 'pan_number')
                    ->ignore($organization->id, 'organization_id'),
            ],
            'legal_name' => 'required|string|max:255',
            'date_of_incorporation' => 'required|date',
            'brand_name' => 'nullable|string|max:255',
            'website_url' => 'nullable|url|max:2000',
            'linkedin_url' => 'nullable|url|max:2000',
            'contact_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'mobile_no' => 'required|digits:10',
        ], [
            'pan_number.unique' => 'This PAN number has already been registered by another organization.',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        OrganizationProfile::updateOrCreate(
            ['organization_id' => $organization->id],
            $validator->validated()
        );

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
        if ($request->is_portal_same_as_office == '1') {

            $request->merge([
                'portal_address_line_1' => $request->office_address_line_1,
                'portal_address_line_2' => $request->office_address_line_2,
                'portal_city' => $request->office_city,
                'portal_district' => $request->office_district,
                'portal_state' => $request->office_state,
                'portal_pin_code' => $request->office_pin_code,
            ]);
        }

        // Validation
        $validator = Validator::make($request->all(), [

            // Head Office Address
            'office_address_line_1' => 'required|string|max:255',
            'office_address_line_2' => 'nullable|string|max:255',
            'office_city' => 'required|string|max:100',
            'office_district' => 'required|string|max:100',
            'office_state' => 'required|string|max:100',
            'office_pin_code' => 'required|digits:6',

            // Registered Office Address
            'portal_address_line_1' => 'required|string|max:255',
            'portal_address_line_2' => 'nullable|string|max:255',
            'portal_city' => 'required|string|max:100',
            'portal_district' => 'required|string|max:100',
            'portal_state' => 'required|string|max:100',
            'portal_pin_code' => 'required|digits:6',

        ], [

            // Head Office Errors
            'office_address_line_1.required' => 'Head office address line 1 is required.',
            'office_city.required' => 'Head office city is required.',
            'office_district.required' => 'Head office district is required.',
            'office_state.required' => 'Head office state is required.',
            'office_pin_code.required' => 'Head office pin code is required.',
            'office_pin_code.digits' => 'Head office pin code must be exactly 6 digits.',

            // Registered Office Errors
            'portal_address_line_1.required' => 'Registered office address line 1 is required.',
            'portal_city.required' => 'Registered office city is required.',
            'portal_district.required' => 'Registered office district is required.',
            'portal_state.required' => 'Registered office state is required.',
            'portal_pin_code.required' => 'Registered office pin code is required.',
            'portal_pin_code.digits' => 'Registered office pin code must be exactly 6 digits.',
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
        $role = $organization->role;

        $request->merge([
            'lifetime_revenue_lakh' => str_replace(',', '', $request->lifetime_revenue_lakh),
            'ongoing_year_revenue_lakh' => str_replace(',', '', $request->ongoing_year_revenue_lakh),
            'last_year_revenue_lakh' => str_replace(',', '', $request->last_year_revenue_lakh),
        ]);

        $data = [
            'organization_id' => $organization->id,
            // 'organization_type' => $role === 'fund_seeker' ? 'profit' : 'non_profit',
            'registration_type' => $request->registration_type,
            'state' => $request->state,
            'years_of_operation_months' => $request->years_of_operation_months,
            'key_achievements' => $request->key_achievements,
            'total_beneficiaries' => $request->total_beneficiaries,
        ];

        if ($role === 'fund_seeker') {

            $data = array_merge($data, [
                'idea_falls_in' => $request->idea_falls_in,
                'current_stage' => $request->current_stage,

                'dpiit_registration' => $request->dpiit_registration ?? 0,
                'msme_registration' => $request->msme_registration ?? 0,
                'gstin_registration' => $request->gstin_registration ?? 0,
                'patent_available' => $request->patent_available ?? 0,

                'lifetime_revenue_lakh' => $request->lifetime_revenue_lakh,
                'ongoing_year_revenue_lakh' => $request->ongoing_year_revenue_lakh,
                'last_year_revenue_lakh' => $request->last_year_revenue_lakh,
            ]);
        }

        if ($role === 'funder') {

            $data = array_merge($data, [
                'domain_of_expertise' => $request->domain_of_expertise,

                'status_12a' => $request->status_12a ?? 0,
                'status_80g' => $request->status_80g ?? 0,
                'status_fcra' => $request->status_fcra ?? 0,
                'csr_1_registration' => $request->csr_1_registration ?? 0,

                'lifetime_revenue_lakh' => $request->lifetime_revenue_lakh,
                'ongoing_year_revenue_lakh' => $request->ongoing_year_revenue_lakh,
                'last_year_revenue_lakh' => $request->last_year_revenue_lakh,
            ]);
        }

        OrganizationOperationalDetail::updateOrCreate(
            ['organization_id' => $organization->id],
            $data
        );

        NotificationService::createOnce(
            'onboarding_completed',
            'Profile Completed',
            'Your organization profile has been successfully completed. You now have access to the dashboard and can begin exploring available features and opportunities.',
            $organization->id
        );

        return redirect()->route('dashboard');
    }

    public function verifyPan(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'PAN verified successfully.',
            'legal_name' => 'SWAP IT HUB PRIVATE LIMITED',
            'date_of_incorporation' => '20-03-2024',    ]);
    }
}
