<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 24.03.2019
 * Time: 23:23
 */

namespace app\modules\task\models;


use app\base\BaseModel;
use app\modules\task\models\rules\NotAdminRule;
use phpDocumentor\Reflection\Types\Parent_;

class Calendar extends BaseModel
{
    public $title;

    public $date;

    public $time;

    public $description;

    public $repeat_type;

    public $email;

    public $use_notification;

    public $is_blocked;

    public $file;

    public static $repeat_types = [
        0 => 'Без повтора',
        1 => 'Ежедневно',
        2 => 'Еженедельно',
//         3 => 'Не допустимо'
    ];

    /**
     * @return array
     */

    public function beforeValidate()
    {
        if ($this->date) {
            $date = \DateTime::createFromFormat('d.m.Y', $this->date);

            if ($date) {
                $this->date = $date->format('Y-m-d');
            }
        }

        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            ['title', 'required'],
            [['title', 'description'], 'trim'],
            ['time', 'integer'],
            ['description', 'string', 'min' => 5, 'max' => 300],
            [['is_blocked', 'use_notification'], 'boolean'],
            ['email', 'email'],
            ['email', 'required', 'when' => function ($model) {
                return $model->use_notification == 1 ? true : false;
            }],
            ['date', 'date', 'format' => 'php:Y-m-d'],
            ['file','file','extensions' => ['jpg','png']],
            ['repeat_type', 'in', 'range' => array_keys(self::$repeat_types)],
            //['title', 'notAdmin'],
            ['title', NotAdminRule::class],
        ];
    }

    public function notAdmin($attr)
    {
        $this->title == 'admin';
        {
            $this->addError('title', "Значение заголовка не админ");
        }
    }

    public function getRepeatTypes()
    {
        return array_merge(static::$repeat_types, [3 => 'Не допустимо']);
    }

    public function attributeLabels()
    {
        return
            [
                'use_notification' => 'Название активности',
                'repeat_type' => 'Выберите событие',
                'is_blocked' => 'Блокирующее событие',
                'title' => 'Название события',
                'date' => 'Дата создания события',
                'time' => 'Время выполнения',
                'description' => 'Описание',
            ];
    }
}
