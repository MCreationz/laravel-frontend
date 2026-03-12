<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationAddress extends Model
{
    protected $fillable = [
        'organization_id',

        'office_house_floor_no',
        'office_address_line_1',
        'office_address_line_2',
        'office_city',
        'office_district',
        'office_state',
        'office_pin_code',

        'portal_house_floor_no',
        'portal_address_line_1',
        'portal_address_line_2',
        'portal_city',
        'portal_district',
        'portal_state',
        'portal_pin_code',

        'is_portal_same_as_office',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
