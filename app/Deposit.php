<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'user', 'amount', 'status', 'plan', 'payment_method', 'created_at', 'created_by', 'updated_at', 'date'
    ];
}
