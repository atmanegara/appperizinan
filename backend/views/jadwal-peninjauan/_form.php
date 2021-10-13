<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JadwalPeninjauan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-peninjauan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pemohon_pengajuan')->textInput() ?>

    <?= $form->field($model, 'id_tim_teknis')->textInput() ?>

    <?= $form->field($model, 'tgl_peninjauan')->textInput() ?>

    <?= $form->field($model, 'ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
