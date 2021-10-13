<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefMediaAlat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-media-alat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_alat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktf')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
