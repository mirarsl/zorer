<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;

class About extends Model
{
    use Translatable;
    protected $translatable = ['about', 'mission','vision','quality','short_about'];
}
