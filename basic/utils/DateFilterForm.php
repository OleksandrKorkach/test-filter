<?php

namespace app\utils;

use yii\base\Model;

class DateFilterForm extends Model
{
    public $startDate;
    public $endDate;

    public function rules()
    {
        return [
            [['startDate', 'endDate'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }
}