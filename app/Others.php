<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Others extends Model
{
    protected $guarded = [];

    public function guardian()
    {
        return $this->morphOne(AuthorizedPerson::class, 'authorizable');
    }
}
