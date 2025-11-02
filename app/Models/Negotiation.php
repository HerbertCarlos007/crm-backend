<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Negotiation extends Model
{
    protected $fillable = [
        'customer_id',
        'stage_id',
        'company_id',
        'closing_reason',
        'value',
        'status',
        'observation',
        'order_number',
        'estimated_closing_date',
        'created_by'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
