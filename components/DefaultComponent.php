<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 25.03.2019
 * Time: 21:43
 */

namespace app\components;


use app\base\BaseComponent;
use app\modules\task\models\Calendar;

class DefaultComponent extends BaseComponent
{
    public $model_class;

    public function getModel()
    {
        return new $this->model_class;
    }

    public function indexDefault($model): bool
    {
        $model->load(\Yii::$app->request->post());
        if (!$model->validate()) {
            //               print_r($model->getErrors());
            return false;
        }
        return true;
    }
}