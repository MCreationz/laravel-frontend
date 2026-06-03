<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundApplicationFinancialDocument extends Model
{
    protected $fillable = [
        'fund_application_id',

        'last_year_turnover',
        'last_year_balance_sheet',

        'last_to_last_year_turnover',
        'last_to_last_year_balance_sheet',

        'last_year_itr',
        'last_to_last_year_itr',
    ];

    public function fundApplication()
    {
        return $this->belongsTo(FundApplication::class);
    }
}
