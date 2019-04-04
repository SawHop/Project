<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 29.03.2019
 * Time: 21:20
 */
?>

<div class="row">
    <div class="col-md-12">
        <p>
            <?= $model->title?>
        </p>
        <p>


        <p><?=\yii\helpers\Html::img('/images/'.$model->file,['width'=>150])?></p>
        </p>
    </div>
</div>
