<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefIndeksLok */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-indeks-lok-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_jns_index')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_index')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
