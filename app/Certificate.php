<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;

class Certificate extends Model
{
    use Translatable;

    protected $translatable = ['title','file'];
}
