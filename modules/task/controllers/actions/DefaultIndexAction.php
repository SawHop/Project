<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 25.03.2019
 * Time: 20:56
 */

namespace app\modules\task\controllers\actions;


use app\modules\task\models\Calendar;
use app\components\DefaultComponent;
use yii\base\Action;
use yii\web\Response;
use yii\widgets\ActiveForm;


class DefaultIndexAction extends Action
{
    public $hello;

    public function run()
    {

        $comp = \Yii::$app->default;
        $model = \Yii::$app->default->getModel();
        //$model = new Calendar();

        if (\Yii::$app->request->isPost) {
            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                $model->load(\Yii::$app->request->post());
                return ActiveForm::validate($model);
            }
//            $model->load(\Yii::$app->request->post());
//            if ($comp->indexDefault($model)) {
//
//            }


            if ($comp->indexDefault($model, \Yii::$app->request->post())) {
                return $this->controller->render('view', ['model' => $model]);
            }
        }
        return $this->controller->render('index', ['model' => $model, 'hello' => $this->hello]);
    }
}