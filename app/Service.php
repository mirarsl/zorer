<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Voyager\Traits\Translatable;

class Service extends Model
{    
    use Translatable;
    protected $translatable = ['title', 'text','spot','slug','speciality','nutrition','image','icon','heats'];

     public function scopeActive($query)
     {
         return $query->where('status', 1);
     }
     
     public function scopeMenu($query)
     {
         return $query->where('show_menu', 1);
     }

     public function scopeOrder($query)
    {
        return $query->orderBy('ordering')->orderBy('id','desc');
    }
    

}
