<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\RefTimTeknis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ref-tim-teknis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nm_teknisi')->label('Nama Tim')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tgl_terbentuk')->label('Tanggal Terbentuk Tim Teknis')->widget(DatePicker::class,[
        'language'=>'id',
        'options'=>[
            'placeholder'=>'-- Pilih Tanggal --',
    
        ],
        'pluginOptions'=>[
             'autoclose'=>true,
            'format'=>'dd-mm-yyyy',
                  'todayHighlight' => true
        ]
    ]) ?>
    <p>
        <small>*Tanggal SK dibentuk Tim Teknis</small>
    </p>
    <?= $form->field($model, 'status_tim')->label('Status Tim Teknis')->dropDownList([
        'Y'=>'Aktif',
        'N'=>'Non Aktif'
    ],[
        'prompt'=>'-- Pilih Status Tim --'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
