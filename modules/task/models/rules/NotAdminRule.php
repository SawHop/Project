<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 28.03.2019
 * Time: 22:02
 */

namespace app\modules\task\models\rules;


use yii\validators\Validator;

class NotAdminRule extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if($model->$attribute=='admin'){
            $model->addError($attribute,'Значения заголовка не должно быть admin');
        }
    }

}