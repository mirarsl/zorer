<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CovidChronology extends Model
{
 public function scopeActive($query)
 {
  return $query->where('status', 1);
 }
 
 public function scopeOrder($query)
 {
  return $query->orderBy('ordering')->orderBy('created_at','desc');
 }      

 public function getType()
 {
  switch ($this->type) {
   case 1:
    return '<a target="_blank" href="'.$this->url.'">
						<div class="thumbnail">
							<img class="img-responsive" src="'.url(asset($this->image)).'" alt="'.$this->title.'">
						</div>
					</a>';
   case 2:
    return '<iframe width="100%" height="200" src="'.$this->url.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
   case 3:
    return '<a target="_blank" href="'.$this->url.'">'.$this->title.'</a>';
   case 4:
    return '';
  }
 }
}
