<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundDocument extends Model
{
    protected $fillable = [
        'document_name',
        'instruction',
        'document_type',
        'max_file_size_mb',
        'uploaded_file',
        'fund_id'
    ];
}