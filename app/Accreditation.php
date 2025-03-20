<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Accreditation extends Model
{
 public function scopeOrder($query)
 {
  return $query->orderBy('created_at','desc');
 }
}
