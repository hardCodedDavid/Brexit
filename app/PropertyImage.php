<?php

namespace App;

use App\Plan;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    protected $fillable = [
        'img_url', 'plan_id',
    ];
}
