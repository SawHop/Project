<?php

/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 24.03.2019
 * Time: 14:17
 * @var $model \app\modules\task\models\Calendar
 */
?>

<div class="row">
    <div class="col-md-6">
        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'id' => 'calendar',
            'method' => 'POST'
        ]); ?>

        <?= $form->field($model, 'title'); ?>
        <?= $form->field($model, 'date')->input('date'); ?>
        <?= $form->field($model, 'time') ?>
        <?= $form->field($model, 'description')->textarea(['data-id' => '1']); ?>
        <div class="form-group">
            <button type="submit">Отправить</button>
        </div>

        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>

