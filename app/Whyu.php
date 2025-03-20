<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;


class Whyu extends Model
{
    
    use Translatable;
    protected $translatable = ['title', 'text'];

    public function scopeOrder($query)
    {
        return $query->orderBy('order')->orderBy('id','desc');
    }
}
