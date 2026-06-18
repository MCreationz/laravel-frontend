<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationPasswordReset extends Model
{
    protected $fillable = [
        'organization_id',
        'token',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
