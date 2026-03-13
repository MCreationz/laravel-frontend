<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationFunder extends Model
{
    protected $fillable = [
        'organization_id',
        'name',
        'year',
        'amount'
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}