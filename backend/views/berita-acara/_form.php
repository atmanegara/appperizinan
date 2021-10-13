<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\BeritaAcara */
/* @var $form yii\widgets\ActiveForm */
$datPemohonPengajuan = backend\models\PemohonPengajuan::getDataPemohonRegistrasi();
?>

<div class="berita-acara-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pemohon_pengajuan')->label('Pemohon Pengajuan')->widget(Select2::class,[
        'value'=>$model->id_pemohon_pengajuan,
       'data'=>$datPemohonPengajuan,
        'options'=>[
            'placeholder'=>'Pilih No Registrasi',
        //    'onChange'=>'detailpemohon(this.value)'
        ],
        'pluginOptions'=>[
            'allowClose'=>true
        ]
    ]) ?>
    <?= $form->field($model, 'no_berita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_berita')->widget(kartik\date\DatePicker::class,
            [
                'language'=>'id',
                'options'=>[
                    'placeholder'=>'Pilih tanggal dibuat berita Acara'
                ],
                'pluginOptions'=>[
                    'todayHighlight' => true,
                                'format'=>'yyyy-mm-dd',
                    'autoclose'=>true,
                ]
            ]) ?>

    <?= $form->field($model, 'isi_berita')->label('Intisari Berita Acara')->widget(CKEditor::class,[
         'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>
    <div class="row">
    <div class="col-md-7">
    <?= $form->field($model,'imageFile')->label('Upload File Dokumen Berita Acara')->widget(FileInput::class,[
        'options'=>['accept'=>'pdf,docx,doc'],
    ]) ?>
        
    </div>
        
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
    .btn-file {
   overflow: visible; 
}
    </style>