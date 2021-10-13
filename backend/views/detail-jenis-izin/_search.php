<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailJenisIzinSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-jenis-izin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_jenis_izin') ?>

    <?= $form->field($model, 'id_jenis_permohonan') ?>

    <?= $form->field($model, 'no_urut') ?>

    <?= $form->field($model, 'nm_dok') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
