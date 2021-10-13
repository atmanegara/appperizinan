<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DataPemohon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-pemohon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tipe_pemohon')->textInput() ?>

    <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jns_bdn_usaha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_pmilik_bu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_desa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telp_pemohon')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
