<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundSnapshot extends Model
{
    protected $fillable = [
        'fund_id',
        'eligible_states',
        'eligibility_instruction',
        'is_npo',
        'is_startup',
        'fund_outlay',
        'fund_type',
        'single_entity_cap',
    ];

    protected $casts = [
        'is_npo' => 'boolean',
        'is_startup' => 'boolean',
    ];

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }
}