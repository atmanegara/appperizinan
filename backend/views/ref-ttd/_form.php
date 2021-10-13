<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefTtd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-ttd-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_rpt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip_ttd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_ttd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jbt_ttd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
