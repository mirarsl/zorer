<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use App\Voyager\Traits\Translatable;
use TCG\Voyager\Models\Translation;

class Page extends Model
{
    use Translatable;
protected $translatable = ['title', 'text','hero','slug','meta_title','meta_desc','meta_tags'];

    function modules() {
        return $this->belongsToMany(Module::class,"page_modules",'page_id','module_id');
     }

     function pages() {
        return $this->hasMany(Page::class,'top_page');
     }

     function top() {
        return $this->belongsTo(Page::class,'top_page');
     }

     function allPages() {
        return $this->top()->with('pages')->get();
     }

     function data($paginate = false,$search = null) {
        $page = $this->belongsTo(\TCG\Voyager\Models\DataType::class,'table','id')->first();
        if(empty($page)) return null;
        $data = app($page->model_name);
        if($this->parameters != null){
            foreach (json_decode($this->parameters) as $key => $value) {
                if(Schema::hasColumn(app($page->model_name)->getTable(),$key)){
                    $data = $data->where($key,$value);
                }
            }
        }
        if(method_exists(app($page->model_name), 'scopeOrder')) {
            $data = $data->order();
        }else if(Schema::hasColumn(app($page->model_name)->getTable(), 'ordering')) {
            $data = $data->orderBy('ordering');
            $data = $data->orderBy('id','desc');
        }else{
            $data = $data->orderBy('id','desc');
        }

        if($search != null){
            $data = $data->whereTranslation('title', 'like', '%' . $search . '%', [app()->getLocale()],app()->getLocale() == 'tr' ? true:false)
            ->whereTranslation('spot', 'like', '%' . $search . '%', [app()->getLocale()],app()->getLocale() == 'tr' ? true:false,'or')
            ->whereTranslation('text', 'like', '%' . $search . '%', [app()->getLocale()],app()->getLocale() == 'tr' ? true:false,'or');
        }

        if($paginate){
            $data = $data->paginate($paginate);
        }else{
            $data = $data->get();
        }
        if(empty($data)) return false;
        return $data;
    }

    function allParent() {
        $parents = collect();
        $this->allParentRec($this, $parents);
        return $parents;
    }
    
    function allParentRec($service, &$parents) {
        if ($service->top) {
            $parents->push($service->top()->select('title','slug')->first());
            $this->allParentRec($service->top, $parents);
        }
    }
    function fullSlug($locale = null)
    {
        if($locale == null){
            $locale = app()->getLocale();
        }
        $slugs = [];
        $this->fullSlugRec($this, $slugs,$locale);
        $slug = implode('/',array_reverse($slugs));
        return $slug;
    }
    function fullSlugRec($page, &$slug, $locale = null)
    {
        $slug[] = $page->getTranslatedAttribute('slug',$locale);
        if (isset($page->top)) {
            $this->fullSlugRec($page->top, $slug,$locale);
        }
    }
}
