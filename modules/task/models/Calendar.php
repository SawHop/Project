<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 24.03.2019
 * Time: 23:23
 */

namespace app\modules\task\models;


use app\base\BaseModel;

class Calendar extends BaseModel
{
    public $title;

    public $date;

    public $time;

    public $description;


    public function rules()
    {
        return [
            ['title', 'required'],
            ['date', 'required'],
            ['time', 'integer'],
            ['description', 'string', 'min' => 5],
        ];
    }

    public function attributeLabels()
    {
        return
            [
                'title' => 'Название события',
                'date' => 'Время создания события',
                'time' => 'Время выполнения',
                'description' => 'Описание',
            ];
    }
}
