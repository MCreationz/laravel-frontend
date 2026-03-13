<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationOperationalDetail extends Model
{
    protected $fillable = [
        'organization_id',
        'organization_type',
        'state',

        'registration_type',
        'current_stage',
        'product_category',
        'dpiit_recognition',
        'msme_registered',
        'gstin_registration',

        'domain_of_expertise',
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
        'last_to_last_year_revenue_lakh',

        'grants_received',
        'equity_raised',
        'bootstrapped_friends_family',
        'debt',

        'govt_grants',
        'foreign_donations_institutional',
        'promoters_money',
        'individual_donations',

        'total_funding_lakh',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}