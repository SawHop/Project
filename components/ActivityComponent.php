<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 24.03.2019
 * Time: 20:24
 */

namespace app\components;




use app\models\Activity;
use yii\base\component;

class ActivityComponent extends Component
{
    public $model_class;

    public function getModel(){
        return new $this->model_class;
    }

    public function createActivity($model):bool{

            $model->load(\Yii::$app->request->post());

            if (!$model->validate()) {
                print_r($model->getErrors());
                return false;
            }
            return true;
    }
}