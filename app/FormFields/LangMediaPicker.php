<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class LangMediaPicker extends AbstractHandler
{
    protected $codename = 'lang_media_picker';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.lang_media_picker', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}
