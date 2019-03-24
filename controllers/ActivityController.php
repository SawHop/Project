<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 24.03.2019
 * Time: 14:12
 */

namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\ActivityCreateAction;

class ActivityController extends BaseController
{
    public function actions()
    {
        return [
            'create' => ['class' => ActivityCreateAction::class, 'name'=> "ky"],
            'new' => ['class' => ActivityCreateAction::class]
        ];
    }
}