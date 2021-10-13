<?php

use \kartik\form\ActiveForm;
use kartik\grid\GridView;
use yii\bootstrap\Html;
use kartik\file\FileInput;
?>
<style>
    .btn-file {
   overflow: visible; 
}
    </style>
<?php
$form = ActiveForm::begin()
?>
<?= $form->field($model,'id_pemohon_pengajuan')->label(false)->hiddenInput() ?>
<?= $form->field($model,'id_tim_teknis')->label(false)->hiddenInput() ?>
<?= $form->field($model,'no_registrasi')->label(false)->hiddenInput() ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        Data Foto Hasil Peninjauan Lapangan
    </div>
    <div class="panel-body">
        <?= $form->field($modelFileTinjauan, 'imgfile[]')->label('Foto')->widget(FileInput::class,[

        ]) ?>
    </div>
</div>

        <?= $form->field($model,'keterangan')->textarea() ?>
 <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
<?php $form->end(); ?>

<script>
            .
</script>