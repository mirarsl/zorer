<?php

namespace App\Http\Controllers;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use ReflectionClass;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Database\Schema\Table;
use TCG\Voyager\Database\Types\Type;
use TCG\Voyager\Events\BreadAdded;
use TCG\Voyager\Events\BreadDeleted;
use TCG\Voyager\Events\BreadUpdated;

class MyVoyagerController extends Controller
{
    function orderFiles(Request $request){
        $table = $request->table;
        $field = $request->field;
        $id = $request->id;
        $list = json_decode($request->order);

        $dataType = Voyager::model('DataType')->whereName($table)->first()->model_name;
        $row =  app($dataType)->find($id);
        $json = json_decode($row->$field);

        $new_list = [];
        foreach ($list as $key => $value) {
            $new_list[$key] = $json[$value->id];
        }
        $row->$field = json_encode($new_list);
        $update = $row->save();
        return $update;
    }
    function orderImages(Request $request){
        $table = $request->table;
        $field = $request->field;
        $id = $request->id;
        $list = json_decode($request->order);

        $dataType = Voyager::model('DataType')->whereName($table)->first()->model_name;
        $row =  app($dataType)->find($id);
        $json = json_decode($row->$field);

        $new_list = [];
        foreach ($list as $key => $value) {
            $new_list[$key] = $json[$value];
        }
        $row->$field = json_encode($new_list);
        $update = $row->save();
        return $update;
    }
}
