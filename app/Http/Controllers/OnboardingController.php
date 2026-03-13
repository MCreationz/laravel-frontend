<?php

namespace App\Http\Controllers;

use App\Models\OrganizationAddress;
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
        'office_house_floor_no'   => 'required|string|max:100',
        'office_address_line_1'   => 'required|string|max:255',
        'office_address_line_2'   => 'nullable|string|max:255',
        'office_town'             => 'required|string|max:100',
        'office_city'             => 'required|string|max:100',
        'office_district'         => 'required|string|max:100',
        'office_state'            => 'required|string|max:100',
        'office_pin_code'         => 'required|string|max:10',

        // Portal address
        'portal_house_floor_no'   => 'nullable|string|max:100',
        'portal_address_line_1'   => 'nullable|string|max:255',
        'portal_address_line_2'   => 'nullable|string|max:255',
        'portal_town'             => 'nullable|string|max:100',
        'portal_city'             => 'nullable|string|max:100',
        'portal_district'         => 'nullable|string|max:100',
        'portal_state'            => 'nullable|string|max:100',
        'portal_pin_code'         => 'nullable|string|max:10',

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
        // save organization type

        return redirect()->route('dashboard');
    }

}