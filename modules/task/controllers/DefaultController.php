<?php

namespace app\modules\task\controllers;

use app\base\BaseController;
use app\modules\task\models\Calendar;
use app\modules\task\controllers\actions\DefaultIndexAction;



class DefaultController extends BaseController
{

    public function actions()
    {
        return [
           'index' => ['class' => DefaultIndexAction::class, 'hello' => 'Hello World'],
            'ky' => ['class' => DefaultIndexAction::class]
        ];
    }
}
