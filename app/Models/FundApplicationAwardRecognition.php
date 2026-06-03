<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundApplicationAwardRecognition extends Model
{
    protected $fillable = [
        'fund_application_id',
        'award_name',
        'awarding_organization',
        'year',
        'certificate',
    ];

    public function fundApplication()
    {
        return $this->belongsTo(FundApplication::class);
    }
}