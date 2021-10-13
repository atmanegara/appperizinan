<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PemohonSewaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemohon-sewa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_reg_sewa') ?>

    <?= $form->field($model, 'id_data_pemohon') ?>

    <?= $form->field($model, 'id_bangunan') ?>

    <?= $form->field($model, 'biaya_sewa') ?>

    <?php // echo $form->field($model, 'hari') ?>

    <?php // echo $form->field($model, 'tgl_sewa') ?>

    <?php // echo $form->field($model, 'jam_awal') ?>

    <?php // echo $form->field($model, 'jam_akhir') ?>

    <?php // echo $form->field($model, 'kegunaan') ?>

    <?php // echo $form->field($model, 'nm_pnggung_jwb') ?>

    <?php // echo $form->field($model, 'telp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
