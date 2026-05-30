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

    public function snapshot()
    {
        return $this->hasOne(FundSnapshot::class);
    }
}
