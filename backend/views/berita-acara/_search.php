<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BeritaAcaraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-acara-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_berita') ?>

    <?= $form->field($model, 'tgl_berita') ?>

    <?= $form->field($model, 'isi_berita') ?>

    <?= $form->field($model, 'id_tim_teknis') ?>

    <?php // echo $form->field($model, 'id_pemohon_pengajuan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
