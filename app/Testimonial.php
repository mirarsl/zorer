<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;


class Testimonial extends Model
{
    use Translatable;
    protected $translatable = ['title', 'text', 'name', 'firm'];
    
}
