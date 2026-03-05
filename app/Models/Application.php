<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'funding_category_id',
        'title',
        'status',
        'submitted_at',
        'total_score'
    ];

    // Relation: Application belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation: Application belongs to a Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relation: Application belongs to a FundingCategory
    public function fundingCategory()
    {
        return $this->belongsTo(FundingCategory::class);
    }
}
