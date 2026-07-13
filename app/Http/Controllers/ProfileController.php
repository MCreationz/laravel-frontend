<?php

namespace App\Http\Controllers;

use App\Models\OrganizationAddress;
use App\Models\OrganizationOperationalDetail;
use App\Models\OrganizationProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function show()
{
    $organization = Auth::guard('organization')->user();

    $profile = OrganizationProfile::where(
        'organization_id',
        $organization->id
    )->first();

    $address = OrganizationAddress::where(
        'organization_id',
        $organization->id
    )->first();

    $operationalDetail = OrganizationOperationalDetail::where(
        'organization_id',
        $organization->id
    )->first();

    return view('profile', compact(
        'organization',
        'profile',
        'address',
        'operationalDetail'
    ));
}

  public function updateProfile(Request $request)
{
    //return $request->all();
    $organization = Auth::guard('organization')->user();

    $profile = OrganizationProfile::firstOrCreate([
        'organization_id' => $organization->id,
    ]);

    $address = OrganizationAddress::firstOrCreate([
        'organization_id' => $organization->id,
    ]);

    $operationalDetail = OrganizationOperationalDetail::firstOrCreate([
        'organization_id' => $organization->id,
    ]);

    $profile->update($request->only([
        'brand_name',
        'website_url',
        'linkedin_url',
        'contact_name',
        'designation',
        'mobile_no',
    ]));

    // $address->update($request->only([
    //     'office_house_floor_no',
    //     'office_address_line_1',
    //     'office_address_line_2',
    //     'office_city',
    //     'office_town',
    //     'office_district',
    //     'office_state',
    //     'office_pin_code',

    //     'portal_house_floor_no',
    //     'portal_address_line_1',
    //     'portal_address_line_2',
    //     'portal_city',
    //     'portal_town',
    //     'portal_district',
    //     'portal_state',
    //     'portal_pin_code',

    //     'is_portal_same_as_office',
    // ]));

    $operationalDetail->update($request->only([
    'domain_of_expertise',
    'state',
    'status_12a',
    'status_80g',
    'status_fcra',
    'csr_1_registration',
    'years_of_operation_months',
    'total_beneficiaries',
    'key_achievements',
    'lifetime_revenue_lakh',
    'ongoing_year_revenue_lakh',
    'last_year_revenue_lakh',
]));
    return redirect()
        ->back()
        ->with('success', 'Profile updated successfully.');
}


}