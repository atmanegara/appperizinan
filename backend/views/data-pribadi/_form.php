<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\DataPribadi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-pribadi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmp_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::class,[
        'options'=>[
            'placeholder'=>'Masukkan Tanggal Lahir...',
            'pluginOptions'=>[
                'autoclose'=>true
            ]
        ]
    ]) ?>

    <?= $form->field($model, 'jkel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_agama')->textInput() ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_prov')->textInput() ?>

    <?= $form->field($model, 'id_kab')->textInput() ?>

    <?= $form->field($model, 'id_kec')->textInput() ?>

    <?= $form->field($model, 'id_kel')->textInput() ?>

    <?= $form->field($model, 'kodepos')->textInput() ?>

    <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
