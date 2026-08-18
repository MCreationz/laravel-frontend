<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'fund_name',
        'fund_owner',
        'fund_owner_email',
        'about_fund',
        'project_start',
        'project_end',
        'maximum_project_duration',
        'fund_logo',
        'fund_banner',
        'current_step',
        'status',
        'is_completed',
    ];

    protected $casts = [
        'project_start' => 'date',
        'project_end' => 'date',
        'is_completed' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(ClientAdmin::class);
    }
    public function reviewers()
{
    return $this->belongsToMany(Reviewer::class, 'fund_reviewer')
        ->withTimestamps();
}

    public function snapshot()
    {
        return $this->hasOne(FundSnapshot::class);
    }
    public function themes()
{
    return $this->hasMany(FundTheme::class);
}    public function documents()
{
    return $this->hasMany(FundDocument::class);
}

public function questionnaires()
{
    return $this->hasMany(FundQuestionnaire::class)
        ->where('is_active', true);
}

public function applications()
{
    return $this->hasMany(FundApplication::class);
}
}
