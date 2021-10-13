<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJnsTl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-jns-tl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_jns_tl')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
