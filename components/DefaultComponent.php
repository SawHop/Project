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
use yii\validators\EmailValidator;
use yii\web\UploadedFile;

class DefaultComponent extends BaseComponent
{
    public $model_class;

    public function getModel()
    {
        return new $this->model_class;
    }

    public function indexDefault($model, $post): bool
    {
        if ($model->load($post)) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if (!$model->validate()) {
                $comp = \Yii::createObject(['class' => FileServiceComponent::class]);
                if (!empty($file = $comp->saveUploadedFile($model->file))) {
                    $model->file = basename($file);
                }
                //               print_r($model->getErrors());
                return false;
            }


        }
        return true;
    }
}