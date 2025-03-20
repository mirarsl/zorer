<?php

namespace App\Voyager\Traits;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Translation;
use TCG\Voyager\Translator;
use TCG\Voyager\Traits\Translatable as VoyagerTranslatable;

trait Translatable {
    use VoyagerTranslatable;

    public function prepareTranslations($request)
    {
        $translations = [];

        $transFields = $this->getTranslatableAttributes();

        $fields = !empty($request->attributes->get('breadRows')) ? array_intersect($request->attributes->get('breadRows'), $transFields) : $transFields;

        foreach ($fields as $field) {
            if (!$request->input($field.'_i18n')) {
                throw new Exception('Invalid Translatable field'.$field);
            }

            $trans = json_decode($request->input($field.'_i18n'), true);

            if(!isset($trans[config('voyager.multilingual.default', 'en')])){
                $trans[config('voyager.multilingual.default', 'en')] = $request->input($field);
            }

            // Set the default local value
            $request->merge([$field => $trans[config('voyager.multilingual.default', 'en')]]);


            $translations[$field] = $this->setAttributeTranslations(
                $field,
                $trans
            );


            // Remove field hidden input
            unset($request[$field.'_i18n']);
        }

        // Remove language selector input
        unset($request['i18n_selector']);

        return $translations;
    }

    public static function scopeWhereTranslation($query, $field, $operator, $value = null, $locales = null, $default = true, $boolean = 'and')
    {
        if ($locales && !is_array($locales)) {
            $locales = [$locales];
        }
        if (!isset($value)) {
            $value = $operator;
            $operator = '=';
        }

        $self = new static();
        $table = $self->getTable();
        return $query->whereIn(
            $self->getKeyName(),
            Translation::where('table_name', $table)
            ->where('column_name', $field)
            ->where('value', $operator, $value)
            ->when(!is_null($locales), function ($query) use ($locales) {
                return $query->whereIn('locale', $locales);
            })
            ->pluck('foreign_key'),
            $boolean
        )->when($default, function ($query) use ($field, $operator, $value) {
            return $query->orWhere($field, $operator, $value);
        });
    }

}
