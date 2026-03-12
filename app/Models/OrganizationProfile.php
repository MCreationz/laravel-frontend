<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationProfile extends Model
{
    protected $fillable = [
        'organization_id',
        'pan_number',
        'legal_name',
        'date_of_incorporation',
        'brand_name',
        'website_url',
        'linkedin_url'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}