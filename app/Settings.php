<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'email', 
        'bitcoin',	
        'bank_name',
        'account_number', 
        'account_holder', 
        'bank_country',
        'address',
        'routing_number',
        'swift',
    ];
}
