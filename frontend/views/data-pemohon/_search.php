<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DataPemohonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-pemohon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_tipe_pemohon') ?>

    <?= $form->field($model, 'no_ktp') ?>

    <?= $form->field($model, 'no_npwp') ?>

    <?= $form->field($model, 'id_jns_bdn_usaha') ?>

    <?php // echo $form->field($model, 'nm_pemohon') ?>

    <?php // echo $form->field($model, 'nm_pmilik_bu') ?>

    <?php // echo $form->field($model, 'alamat_pemohon') ?>

    <?php // echo $form->field($model, 'id_desa') ?>

    <?php // echo $form->field($model, 'id_kec') ?>

    <?php // echo $form->field($model, 'email_pemohon') ?>

    <?php // echo $form->field($model, 'telp_pemohon') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
