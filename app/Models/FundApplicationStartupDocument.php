<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundApplicationStartupDocument extends Model
{
    protected $fillable = [
        'fund_application_id',

        'organization_name',

        'registration_certificate',
        'registration_number',

        'dpiit_certificate',
        'dpiit_registration_number',

        'patent_available',
        'patent_number',
        'application_number',
        'date_of_filing',
        'patentee_name',
        'patent_validity',

        'gst_registration_number',
        'gst_certificate',

        'msme_registration_number',
        'msme_registration_validity',
    ];

    // protected $casts = [
    //     'patent_available' => 'boolean',
    //     'date_of_filing' => 'date',
    //     'patent_validity' => 'date',
    //     'msme_registration_validity' => 'date',
    // ];

    public function fundApplication()
    {
        return $this->belongsTo(FundApplication::class);
    }
}