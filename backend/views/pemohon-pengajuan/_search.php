<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PemohonPengajuanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemohon-pengajuan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_registrasi') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_data_pemohon') ?>

    <?= $form->field($model, 'id_jenis_izin') ?>

    <?php // echo $form->field($model, 'id_jenis_permohonan') ?>

    <?php // echo $form->field($model, 'id_jenis_bdn_usaha') ?>

    <?php // echo $form->field($model, 'status_pengajuan') ?>

    <?php // echo $form->field($model, 'status_verifikasi') ?>

    <?php // echo $form->field($model, 'status_selesai') ?>

    <?php // echo $form->field($model, 'tgl_pengajuan') ?>

    <?php // echo $form->field($model, 'tgl_verifikasi') ?>

    <?php // echo $form->field($model, 'tgl_selesai') ?>

    <?php // echo $form->field($model, 'status_kunci') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
