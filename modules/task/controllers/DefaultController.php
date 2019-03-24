<?php

namespace app\modules\task\controllers;

use app\modules\task\models\Calendar;
use yii\web\Controller;

/**
 * Default controller for the `auth` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new Calendar();
        return $this->render('index', ['model' => $model]);
    }
}
