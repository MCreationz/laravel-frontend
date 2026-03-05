<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user'; // pivot table name

    public $timestamps = false; // disable if your pivot table has no timestamps

    protected $fillable = [
        'user_id',
        'role_id',
    ];
}
