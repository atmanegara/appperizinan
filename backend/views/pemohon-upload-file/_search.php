<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PemohonUploadFileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemohon-upload-file-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'no_registrasi') ?>

    <?= $form->field($model, 'id_jenis_izin') ?>

    <?= $form->field($model, 'id_jenis_permohonan') ?>

    <?php // echo $form->field($model, 'data_file_upload') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
