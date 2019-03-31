<?php

/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 24.03.2019
 * Time: 14:17
 * @var $mode \app\models\Activity
 */
?>

<div class="row">
    <div class="col-md-6">
        <?=$name?>
        <?=Yii::getAlias('@my_alias')?><br>
        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'id' => 'activity-create',
            'method' => 'POST'
        ]); ?>

        <?= $form->field($model, 'title'); ?>
        <?= $form->field($model, 'description')->textarea(['data-id' => '1']); ?>
        <?= $form->field($model, 'date_start')->input('date'); ?>
        <?= $form->field($model, 'is_blocked')->checkbox(); ?>
        <div class="form-group">
            <button type="submit">Отправить</button>
        </div>

        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>

