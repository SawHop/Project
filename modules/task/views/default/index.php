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
        <?= $hello ?>
        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'id' => 'calendar',
            'method' => 'POST'
        ]); ?>

        <?= $form->field($model, 'title'); ?>
        <?= $form->field($model, 'date') ?>
        <?= $form->field($model, 'time') ?>
        <?= $form->field($model, 'description')->textarea(['data-id' => '1']); ?>
        <?= $form->field($model, 'is_blocked')->checkbox(); ?>
        <?= $form->field($model, 'use_notification')->checkbox(); ?>
        <?= $form->field($model, 'email', ['enableAjaxValidation' => true, 'enableClientValidation' => false]); ?>
        <?= $form->field($model, 'repeat_type')->dropDownList($model->getRepeatTypes()); ?>


        <?= $form->field($model, 'file')->fileInput(); ?>
        <div class="form-group">
            <button type="submit">Отправить</button>
        </div>

        <?php \yii\bootstrap\ActiveForm::end(); ?>
        <p>Назад <?= Yii::$app->session->getFlash('last_page_url') ?></p>
    </div>
</div>

