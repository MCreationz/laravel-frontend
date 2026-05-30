<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundTheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'fund_id',
        'theme_name',
        'sub_theme_name',
        'description',
    ];

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }
}