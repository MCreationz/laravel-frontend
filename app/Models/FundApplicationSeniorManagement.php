<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundApplicationSeniorManagement extends Model
{
    protected $table = 'fund_application_senior_management';

    protected $fillable = [
        'fund_application_id',
        'name',
        'designation',
        'nature_of_engagement',
        'gender',
        'date_of_birth',
        'date_of_appointment',
        'highest_qualification',
        'roles_and_responsibilities',
        'total_years_of_experience',
        'resume_cv',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'date_of_appointment' => 'date',
    ];

    public function application()
    {
        return $this->belongsTo(FundApplication::class, 'fund_application_id');
    }
}