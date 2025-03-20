<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class Repeater extends AbstractHandler
{
    protected $codename = 'repeater';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.repeater', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}
