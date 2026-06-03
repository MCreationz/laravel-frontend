<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundApplicationNpoDocument extends Model
{
    protected $fillable = [
        'fund_application_id',

        'organization_name',
        'registration_certificate',
        'registration_number',

        'certificate_12a',
        'registration_number_12a',
        'validity_12a',

        'certificate_80g',
        'registration_number_80g',
        'validity_80g',

        'certificate_fcra',
        'registration_number_fcra',
        'validity_fcra',

        'certificate_csr1',
        'registration_number_csr1',
        'validity_csr1',
    ];

    public function fundApplication()
    {
        return $this->belongsTo(FundApplication::class);
    }
}