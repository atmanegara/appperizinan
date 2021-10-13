<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinHoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-ho-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_data_pemohon') ?>

    <?= $form->field($model, 'jns_tl') ?>

    <?= $form->field($model, 'kawasan') ?>

    <?= $form->field($model, 'luas_tinggi') ?>

    <?php // echo $form->field($model, 'jns_jalan') ?>

    <?php // echo $form->field($model, 'tarif_retribusi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
