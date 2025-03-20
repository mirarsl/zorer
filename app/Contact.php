<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;

class Contact extends Model
{
    use Translatable;

    protected $translatable = ['contact1','contact2','address1','address2','iframe_url'];
}
