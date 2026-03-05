<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundingCategory extends Model
{
    protected $fillable = ['name', 'max_amount'];
}
