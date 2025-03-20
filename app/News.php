<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Voyager\Traits\Translatable;

class News extends Model
{
 use Translatable;
 protected $translatable = ['title','text','spot','hero','slug','meta_title','meta_desc','meta_tags'];
 
 

 public function scopeActive($query)
 {
  return $query->where('status', 1);
 }
 
 public function scopeOrder($query)
 {
  return $query->orderBy('ordering')->orderBy('created_at','desc');
 }
 
 public function date() {
  $date = \Carbon\Carbon::parse($this->created_at);
  $date->setLocale('tr');
  return $date;
 }

 public function short_text() {
  return mb_substr(strip_tags($this->text),0,100).'..';
 }

}
