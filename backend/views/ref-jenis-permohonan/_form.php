<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJenisPermohonan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-jenis-permohonan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_jenis_permohonan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
