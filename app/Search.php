<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Search extends Model
{
    protected $table = 'searchs';

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
