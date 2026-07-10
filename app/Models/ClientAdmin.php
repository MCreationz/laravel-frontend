<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ClientAdmin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'organization_name',
        'organization_type',
        'primary_contact_name',
        'phone_number',
        'email',
        'state',
        'status',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notifications(): MorphMany
{
    return $this->morphMany(Notification::class, 'notifiable');
}
}