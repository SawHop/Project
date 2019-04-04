<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 03.04.2019
 * Time: 20:32
 */

namespace app\modules\task\controllers;


use app\base\BaseController;
use app\components\DaoComponents;

class DaoController extends BaseController
{
    public function actionIndex()
    {
        $comp = \Yii::createObject(['class' => DaoComponents::class]);

        $comp->insertAndUpdate();

        $users = $comp->getAllUsers();
        $activityUser = $comp->getActivetyUsers(\Yii::$app->request->get('user', 1));


        $user = $comp->getUser(\Yii::$app->request->get('user', 1));
        $cnt = $comp->getCountActivity();
        $reader = $comp->getReaderActivity();
        return $this->render('index', ['users' => $users, 'activityUser' => $activityUser,
            'user' => $user, 'cnt'=>$cnt, 'reader' =>$reader]);
    }
}