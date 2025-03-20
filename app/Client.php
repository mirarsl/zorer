<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;


class Client extends Model
{
    use Translatable;
    protected $translatable = ['title'];
    public function scopeActive($query){
        return $query->where('status',1);
    }
    public function scopeOrder($query)
    {
        return $query->orderBy('ordering')->orderBy('featured', 'DESC')->orderBy('title', 'ASC');
    }
}
