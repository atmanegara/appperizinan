<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\PemohonPengajuan */
/* @var $form yii\widgets\ActiveForm */
$dataJenisIzin = ArrayHelper::map(backend\models\RefJenisIzin::find()->all(),'id','nm_jenis_izin');
$dataJenisPermohonan = ArrayHelper::map(backend\models\RefJenisPermohonan::find()->all(),'id','nm_jenis_permohonan');
$dataJnsBdnUsaha = ArrayHelper::map(backend\models\RefJenisBdnUsaha::find()->all(),'id','nm_jns_bdn_usaha');
?>

<div class="pemohon-pengajuan-form">

    <?php $form = ActiveForm::begin(); ?>

  
   
  
    <?= $form->field($model, 'id_jenis_izin')->widget(Select2::class,[
        'data'=>$dataJenisIzin,
        'options'=>[
            'pleacholder'=>'Pilih Jenis izin'
        ],
        'pluginOptions'=>[
            'allowClear'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'id_jenis_permohonan')->widget(Select2::class,[
        'data'=>$dataJenisPermohonan,
        'options'=>[
            'placeholder'=>'Pilih Jenis Permohonan ...'
        ],
        'pluginOptions'=>[
            'allowClear'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'id_jenis_bdn_usaha')->widget(Select2::class,[
        'data'=>$dataJnsBdnUsaha,
        'options'=>[
            'placeholder'=>'Pilih Jenis Badan Usaha ...'
        ],
        'pluginOptions'=>[
            'allowClear'=>true
        ]
    ]) ?>

    <div id='tabel-syarat-dok'>
        
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
