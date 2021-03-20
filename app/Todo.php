<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function floor()
    {
        return $this->belongsTo('App\Floor');
    }
}
