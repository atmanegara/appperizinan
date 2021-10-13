<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LegalitasPerusahaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="legalitas-perusahaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_data_perusahaan') ?>

    <?= $form->field($model, 'no_akta') ?>

    <?= $form->field($model, 'tgl_berdiri') ?>

    <?= $form->field($model, 'nm_notaris') ?>

    <?php // echo $form->field($model, 'no_sk_pengesahan') ?>

    <?php // echo $form->field($model, 'tgl_pengesahan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
