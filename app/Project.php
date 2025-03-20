<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;

class Project extends Model
{
    use Translatable;
    protected $translatable = ['title', 'text','slug','meta_title','meta_desc','meta_tags'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeOrder($query)
    {
        return $query->orderBy('ordering')->orderBy('id', 'desc');
    }
}
