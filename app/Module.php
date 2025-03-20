<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use App\Voyager\Traits\Translatable;

class Module extends Model
{
    use Translatable;
    protected $translatable = ['title', 'text','button','url','top'];

    function data() {
        $module = $this->belongsTo(\TCG\Voyager\Models\DataType::class,'table','id')->first()->model_name;
        $data = app($module)->query();
        $data = method_exists(app($module),'scopeActive') ? $data->active(): $data;
        $data = method_exists(app($module),'scopeOrder') ? $data->order(): $data->orderBy('id','desc');
        if($this->default_row != null){
            $data = $data->find($this->default_row);
        }
        else if($this->parameters != null){
            foreach (json_decode($this->parameters) as $key => $value) {
                if(Schema::hasColumn(app($module)->getTable(),$key)){
                    $data = $data->where($key,$value);
                }
            }
            if($this->data_limit != 0) $data = $data->limit($this->data_limit,0)->get(); 
            else $data = $data->get();
        }
        else {
            if($this->data_limit != 0) $data = $data->limit($this->data_limit,0)->get(); 
            else $data = $data->get();
        }
        if(empty($data)) return false;
        return $data;
    }
}
