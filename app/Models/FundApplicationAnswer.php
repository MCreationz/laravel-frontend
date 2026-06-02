<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundApplicationAnswer extends Model
{
    protected $fillable = [
        'fund_application_id',
        'fund_questionnaire_id',
        'answer',
    ];

    public function application()
    {
        return $this->belongsTo(FundApplication::class, 'fund_application_id');
    }

    public function questionnaire()
    {
        return $this->belongsTo(FundQuestionnaire::class);
    }
}