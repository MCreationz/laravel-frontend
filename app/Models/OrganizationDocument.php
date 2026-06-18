<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationDocument extends Model
{
    protected $fillable = [
        'organization_id',
        'name',
        'file_path',
        'file_type',
        'file_size',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}