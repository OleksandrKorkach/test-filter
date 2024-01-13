<?php

namespace app\models;

use DateTime;
use yii\db\ActiveRecord;

class Order extends ActiveRecord
{

    public string $description;
    public string $status;
    public string $category;
    public DateTime $resolved_at;
    public DateTime $created_at;
    public string $agent;


    public static function tableName()
    {
        return 'order';
    }

}