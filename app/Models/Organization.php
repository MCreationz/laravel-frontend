<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        'otp_expires_at'
    ];

    protected $hidden = [
        'password',
        'otp_code'
    ];

    protected $casts = [
        'otp_expires_at' => 'datetime'
    ];
}