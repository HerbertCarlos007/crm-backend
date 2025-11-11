<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'negotiation_id',
        'customer_id',
        'company_id',
        'customer_contact',
        'type_task',
        'start_at',
        'end_at',
        'status',
        'priority',
        'summary',
        'detail',
    ];
}
