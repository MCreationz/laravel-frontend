<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundApplication extends Model
{
    protected $fillable = [
        'fund_id',
        'organization_id',
        'theme_id',
        'sub_theme_id',
        'project_duration',
        'total_budget',
        'additional_info',
        'current_step',
        'status',
    ];

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }

    public function answers()
    {
        return $this->hasMany(FundApplicationAnswer::class);
    }
}