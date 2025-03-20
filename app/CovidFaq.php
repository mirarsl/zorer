<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CovidFaq extends Model
{
 public function scopeActive($query)
 {
  return $query->where('status', 1);
 }
 
 public function scopeOrder($query)
 {
  return $query->orderBy('ordering')->orderBy('created_at','desc');
 }      
}
