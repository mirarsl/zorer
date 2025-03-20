<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ClientCategory extends Model
{
    function data() {
     return $this->belongsToMany(Client::class,'clients_client_categories','client_category_id','client_id');
    }
}
