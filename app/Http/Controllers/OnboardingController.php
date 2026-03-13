<?php

namespace App\Http\Controllers;

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
        // save address

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