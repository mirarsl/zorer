<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;

class Slider extends Model
{
    use Translatable;
    protected $translatable = ['title', 'text','button1_title','button1_link','top'];

     public function scopeOrder($query)
     {
         return $query->orderBy('ordering')->orderBy('id','desc');
     }
}
