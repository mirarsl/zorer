<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;

class How extends Model
{
    use Translatable;
    protected $translatable = ['title', 'text'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeOrder($query)
    {
        return $query->orderBy('ordering')->orderBy('id', 'desc');
    }
}
