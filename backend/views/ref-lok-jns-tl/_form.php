<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefLokJnsTl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-lok-jns-tl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_jns_tl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
