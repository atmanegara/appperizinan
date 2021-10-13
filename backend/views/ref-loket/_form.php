<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefLoket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-loket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_loket')->textInput() ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => 'Pilih status aktif..']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
