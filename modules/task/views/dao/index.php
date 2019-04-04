<?php

/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 03.04.2019
 * Time: 20:35
 */

/* @var $this \yii\web\View */
?>

<div class="row">
    <div class="col-md-6">
        <pre>
            <?= print_r($users) ?>
        </pre>
    </div>

    <div class="col-md-6">
        <pre>
            <?= print_r($activityUser) ?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?=print_r($user);?>
        </pre>
    </div>

    <div class="col-md-6">
        <pre>
            Кол-во:<?=$cnt;?>
        </pre>
    </div>
    <div class="col-md-6">
        <?php foreach ($reader as $item):?>
            <?=\yii\helpers\ArrayHelper::getValue($item,'title');?>
        <?php endforeach;?>
    </div>
</div>
