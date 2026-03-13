<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Organization extends Authenticatable
{
    protected $table = 'organizations';

    protected $fillable = [
        'organization_name',
        'work_email',
        'role',
        'referral_source',
        'password',
        'otp_code',
        'otp_expires_at',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'otp_code',
    ];

    protected $casts = [
        'otp_expires_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(OrganizationProfile::class);
    }

    public function address()
    {
        return $this->hasOne(OrganizationAddress::class);
    }

    public function operationalDetail()
    {
        return $this->hasOne(OrganizationOperationalDetail::class);
    }

    public function funders()
    {
        return $this->hasMany(OrganizationFunder::class);
    }
}
