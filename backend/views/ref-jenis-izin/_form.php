<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJenisIzin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-jenis-izin-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-md-6">
            
    <?= $form->field($model, 'kd_jenis_izin')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
    <?= $form->field($model, 'nm_jenis_izin')->textInput(['maxlength' => true]) ?>
            
        </div>
    </div>
      

            
        
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
