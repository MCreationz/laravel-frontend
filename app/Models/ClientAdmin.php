<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_name',
        'organization_type',
        'primary_contact_name',
        'phone_number',
        'email',
        'state',
        'status',
    ];
}