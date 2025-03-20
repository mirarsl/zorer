<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;

class ServiceCategory extends Model
{
    use Translatable;

    protected $translatable = ['title', 'text', 'spot', 'slug'];

    public function services()
    {
        return $this->hasMany(Service::class, 'category','id')->active();
    }
}

