<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PenetapanNomorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penetapan-nomor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_pemohon_pengajuan') ?>

    <?= $form->field($model, 'no_sk') ?>

    <?= $form->field($model, 'tgl_sk') ?>

    <?= $form->field($model, 'tgl_tempo_sk') ?>

    <?php // echo $form->field($model, 'id_tanda_tangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
