<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationFunder extends Model
{
    protected $fillable = [
        'organization_id',
        'name',
        'category',  // Added
        'year',
        'purpose',   // Added
        'amount',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}