<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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
    public function notifications(): MorphMany
{
    return $this->morphMany(Notification::class, 'notifiable');
}
}