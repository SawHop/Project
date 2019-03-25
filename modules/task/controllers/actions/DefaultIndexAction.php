<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 25.03.2019
 * Time: 20:56
 */

namespace app\modules\task\controllers\actions;


use app\modules\task\models\Calendar;
use yii\base\Action;


class DefaultIndexAction extends Action
{
    public $hello;

    public function run(){

        $comp = \Yii::$app->default;
        $model = \Yii::$app->default->getModel();
        //$model = new Calendar();

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
              if($comp->indexDefault($model)){

              }
        }

        return $this->controller->render('index', ['model' => $model, 'hello'=>$this->hello]);
    }
}