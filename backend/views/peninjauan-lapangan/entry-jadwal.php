<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\RefTimTeknis;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\JadwalPeninjauan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-peninjauan-form">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title">
                Form Entry Jadwal Peninjauan Lapangan
            </label>
        </div>
        <div class="panel-body">
          <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pemohon_pengajuan')->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'id_tim_teknis')->label('Tim Teknis')->widget(Select2::class,[
        'value'=>$model->id_tim_teknis,
        'data'=> RefTimTeknis::getDataRefTimTeknis(),
        'options'=>[
            'placeholder'=>'Pilih Tim Teknis ...',
           
        ],
        'pluginOptions'=>[
            'allowClear'=>true,       ]
    ]) ?>

    <?= $form->field($model, 'tgl_peninjauan')->label('Tgl Peninjauan')->widget(DatePicker::class,[
        'options'=>[
            'placeholder'=>'PIlih Tanggal Peninjauan'
        ],
        'pluginOptions'=>[
            'format'=>'yyyy-mm-dd',
 'autoClose'=>true,
            'todayHighlight'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>   
        </div>
    </div>
   

</div>
