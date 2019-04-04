<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 24.03.2019
 * Time: 14:39
 */


namespace app\controllers\actions;

use app\components\ActivityComponent;
use app\models\Activity;

class ActivityCreateAction extends \yii\base\Action
{
    public $name;

    public function run()
    {
        /** @var ActivityComponent $comp */
        //$comp = \Yii::$app->activity;
        $comp=\Yii::createObject([
           'class' => ActivityComponent::class,
            'model_class' => ActivityComponent::class
        ]);
        $model = \Yii::$app->activity->getModel();

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if($comp->createActivity($model)){

            }
        }




        return $this->controller->render('create', ['model' => $model, 'name' => $this->name]);
    }
}