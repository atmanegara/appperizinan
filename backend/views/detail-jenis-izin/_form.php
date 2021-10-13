<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use backend\models\RefJenisIzin;
use backend\models\RefJenisPermohonan;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailJenisIzin */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="detail-jenis-izin-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'id_jenis_izin')->widget(Select2::class,[
        'data'=> RefJenisIzin::getDataRefJenisIzin(),
        'options'=>[
            'placeholder'=>'PIlih Jenis Izin ...',
        ],
        'pluginOptions'=>[
            'allowClear'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'id_jenis_permohonan')->widget(Select2::class,[
        'data'=> RefJenisPermohonan::getDataJenisPermohonan(),
        'options'=>[
            'placeholder'=>'Pilih Jenis Permohonan ...',
        ],
        'pluginOptions'=>[
            'allowClear'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'no_urut')->textInput() ?>

    <?= $form->field($model, 'nm_dok')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
