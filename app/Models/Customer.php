<?php

namespace App\Models;

use App\Enums\CustomerType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'customer_type',
        'document_number',
        'name',
        'postal_code',
        'address',
        'number',
        'district',
        'address_complement',
        'city',
        'state',
        'country',
        'phone_number',
        'email',
        'company_id',
        'created_by',
    ];

    protected $casts = [
        'customer_type' => CustomerType::class,
    ];

    public function negotiations(): HasMany
    {
        return $this->hasMany(Negotiation::class);
    }
}
