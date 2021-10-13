<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\LegalitasPerusahaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="legalitas-perusahaan-form">

    <?php $form = ActiveForm::begin(); ?>

  
    <?= $form->field($model, 'no_akta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_berdiri')->widget(DatePicker::class,[
        'options'=>[
            'placeholder'=>'Pilih Tanggal Berdiri',
          
        ],
        'pluginOptions'=>[
            'autoClose'=>true,
              'format'=>'yyyy-mm-dd'
        ]
    ]) ?>

    <?= $form->field($model, 'nm_notaris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_sk_pengesahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_pengesahan')->widget(DatePicker::class,[
        'options'=>[
            'placeholder'=>'Pilih Tanggal Berdiri',
          
        ],
        'pluginOptions'=>[
            'autoClose'=>true,
              'format'=>'yyyy-mm-dd'
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
