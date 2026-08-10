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
    public function theme()
    {
        return $this->belongsTo(FundTheme::class, 'theme_id');
    }

    public function subTheme()
    {
        return $this->belongsTo(FundTheme::class, 'sub_theme_id');
    }
    public function seniorManagement()
    {
        return $this->hasMany(FundApplicationSeniorManagement::class);
    }

    public function npoDocument()
    {
        return $this->hasOne(FundApplicationNpoDocument::class);
    }

    public function startupDocument()
    {
        return $this->hasOne(FundApplicationStartupDocument::class);
    }

    public function financialDocument()
    {
        return $this->hasOne(FundApplicationFinancialDocument::class);
    }

    public function awardRecognitions()
    {
        return $this->hasMany(FundApplicationAwardRecognition::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
