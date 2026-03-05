<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['name', 'status'];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
