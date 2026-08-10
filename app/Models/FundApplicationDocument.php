<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundApplicationDocument extends Model
{
    protected $fillable = [
        'fund_application_id',
        'fund_document_id',
        'uploaded_file',
        'status',
        'remarks',
    ];

    public function fundApplication()
    {
        return $this->belongsTo(FundApplication::class);
    }

    public function fundDocument()
    {
        return $this->belongsTo(FundDocument::class);
    }
}