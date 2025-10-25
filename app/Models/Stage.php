<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stage extends Model
{
    protected $fillable = [
        'name',
        'step_order',
        'created_by',
        'company_id',

    ];

    public function company(): BelongsTo
    {
    return $this->belongsTo(Company::class);}
}
