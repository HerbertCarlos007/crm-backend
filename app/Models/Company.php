<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'company_name',
        'document_number',
        'postal_code',
        'address',
        'number',
        'district',
        'address_complement',
        'city',
        'state',
        'country',
        'phone_number',
        'company_email',
        'logo_url'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function stages(): HasMany
    {
        return $this->hasMany(Stage::class);
    }
}
