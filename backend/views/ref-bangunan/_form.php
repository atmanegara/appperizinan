<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefBangunan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-bangunan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'nm_bangunan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hak_milik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lokasi_bangunan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
