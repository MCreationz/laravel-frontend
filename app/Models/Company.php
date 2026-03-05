<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pan_number',
        'gst_number',
        'sector_id',
        'address',
        'city',
        'state',
        'pincode',
        'contact_person_name',
        'contact_email',
        'contact_mobile',
        'status',
    ];

    protected $casts = [
        'pan_number' => 'encrypted',
        'gst_number' => 'encrypted',
    ];


    // Relation: Company belongs to a sector
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    // Relation: Company has many users
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
