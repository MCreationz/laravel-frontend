<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    protected $fillable = [
        'organization_name',
        'contact_person',
        'email',
        'phone',
        'user_type',
        'hear_about_us',
        'requirement',
    ];
}