<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user', 'amount', 'status', 'type',  'account_type',  
    ];
}
