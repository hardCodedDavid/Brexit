<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $fillable = [
        'statutory',	'brokerage',	'user',	'accrued_expense',	'accrued_income',	'withdrawable', 'unsettled',    'locked_funds'
    ];
}
