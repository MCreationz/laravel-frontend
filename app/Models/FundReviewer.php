<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FundReviewer extends Pivot
{
    protected $table = 'fund_reviewer';

    protected $fillable = [
        'fund_id',
        'reviewer_id',
    ];
}