<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    protected $fillable = [
        'user', 'amount', 'plan', 'expecting', 'maturity_date', 'status', 'percent', 'locked'
    ];
}
