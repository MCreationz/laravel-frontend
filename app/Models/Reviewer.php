<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reviewer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'role',
        'domain_expertise',
        'password',
        'status',
        'client_id'
    ];

    protected $hidden = [
        'password',
    ];

    // protected $casts = [
    //     'status' => 'boolean',
    // ];

    public function funds()
    {
        return $this->belongsToMany(Fund::class, 'fund_reviewer')
            ->withTimestamps();
    }
     public function client()
    {
        return $this->belongsTo(ClientAdmin::class);
    }
}