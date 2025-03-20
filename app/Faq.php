<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;

class Faq extends Model
{
    use Translatable;
    protected $translatable = ['title', 'text'];

    function scopeOrder($query)
    {
        return $query->orderBy('ordering', 'desc');
    }
}
