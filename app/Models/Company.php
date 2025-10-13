<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
