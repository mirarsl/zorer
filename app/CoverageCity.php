<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CoverageCity extends Model
{
 public function typeOf() {
  return $this->type == 1 ? 'Hizmet Verilen İl':'Yakında Hizmet Verilecek İl';
 }
 public function scopeActive($query)
 {
  return $query->where('status', 1);
 }
 public function scopeOrder($query)
 {
  return $query->orderBy('ordering')->orderBy('code', 'asc');
 }
}
