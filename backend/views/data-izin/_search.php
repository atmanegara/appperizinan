<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DataIzinSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-izin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_penetapan_nomor') ?>

    <?= $form->field($model, 'tgl_surat') ?>

    <?= $form->field($model, 'isi_surat') ?>

    <?= $form->field($model, 'file_surat') ?>

    <?php // echo $form->field($model, 'id_ref_ttd') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
