<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'company_id',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Automatically hash password when setting it
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    // Relation: User belongs to a company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function role()
    {
        return $this->hasOneThrough(
            Role::class,
            RoleUser::class,
            'user_id',   // FK on role_user table pointing to users.id
            'id',        // PK on roles table
            'id',        // PK on users table
            'role_id'    // FK on role_user table pointing to roles.id
        );
    }
}
