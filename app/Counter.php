<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;

class Counter extends Model
{
    use Translatable;
    protected $translatable = ['title', 'text','addtional','pretext','count'];

     public function scopeOrder($query)
     {
         return $query->orderBy('ordering')->orderBy('id','desc');
     }
}
