<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;

class Plan extends Model
{
    use Translatable;
    protected $translatable = ['title', 'text','slug','materials','spot'];
    
    public function typeOf() {
        return $this->type == 0 ? 'Devam Eden Proje':'Tamamlanan Proje';
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeOrder($query)
    {
        return $query->orderBy('ordering')->orderBy('id', 'desc');
    }
}
