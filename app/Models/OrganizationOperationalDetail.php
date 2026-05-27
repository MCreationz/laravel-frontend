<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationOperationalDetail extends Model
{
    protected $fillable = [
        'organization_id',
        // 'organization_type',
        'state',

        // Common
        'registration_type',

        // Fund Seeker
        'idea_falls_in',
        'current_stage',
        'dpiit_registration',
        'msme_registration',
        'gstin_registration',
        'patent_available',

        // Funder
        'domain_of_expertise',
        'status_12a',
        'status_80g',
        'status_fcra',
        'csr_1_registration',

        // Track Record
        'years_of_operation_months',
        'total_beneficiaries',
        'key_achievements',

        // Financial Record
        'lifetime_revenue_lakh',
        'ongoing_year_revenue_lakh',
        'last_year_revenue_lakh',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}