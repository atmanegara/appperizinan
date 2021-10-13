<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TarifJnsTlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarif-jns-tl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_ref_jns_tl') ?>

    <?= $form->field($model, 'id_lok_jns_tl') ?>

    <?= $form->field($model, 'awal_luas_t') ?>

    <?= $form->field($model, 'akhir_luas_t') ?>

    <?php // echo $form->field($model, 'tarif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
