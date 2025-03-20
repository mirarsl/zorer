<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Process extends Model
{
     public function scopeOrder($query)
    {
        return $query->orderBy('ordering')->orderBy('id','desc');
    }
}
