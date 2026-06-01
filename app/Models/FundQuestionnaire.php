<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundQuestionnaire extends Model
{
    protected $fillable = [
        'fund_id',
        'question',
        'description',
        'word_limit',   
        'is_active',
    ];

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }
}