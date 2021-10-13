<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\DaftarFormulir */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .btn-file {
   overflow: visible; 
}
    </style>
<div class="daftar-formulir-form">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                Form Upload Formulir
            </h4>
        </div>
        <div class="panel-body">
             <div class="row">
    <div class="col-md-12">
           <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-8">
    <?= $form->field($model, 'nm_formulir')->textInput(['maxlength' => true]) ?>
        
    </div>
    </div>
    <div class="col-md-12">
    <div class="col-md-8">
    <?= $form->field($model, 'file_formulir')->widget(FileInput::class,[
        
    ]) ?>
        
    </div>
        <div class="col-md-12">
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
            
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    </div>
 
        </div>
    </div>
   
</div>
