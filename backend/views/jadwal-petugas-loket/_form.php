<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\DataPetugasLoket;
use backend\models\RefLoket;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use backend\models\RefJenisIzin;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\JadwalPetugasLoket */
/* @var $form yii\widgets\ActiveForm */
$itemsPetugasLoket = ArrayHelper::map(DataPetugasLoket::find()->asArray()->all(),'id','nama_petugas');
$itemsLoket = ArrayHelper::map(RefLoket::find()->asArray()->all(),'id','nama_loket');
?>

<div class="jadwal-petugas-loket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_data_petugas_loket')->dropDownList($itemsPetugasLoket, ['prompt'=>'Pilih Petugas ...'])?>

    <?= $form->field($model, 'id_ref_loket')->dropDownList($itemsLoket, ['prompt'=>'Pilih tempat loket ...']) ?>

    <?= $form->field($model, 'tgl_masuk')->widget(DatePicker::class,[
 
      'value' => date('d-M-Y', strtotime('+1 days')),
        'options' => ['placeholder' => 'Pilih tanggal masuk ...'],
         'type' => DatePicker::TYPE_COMPONENT_PREPEND,
    'removeButton' => false,
      'pluginOptions' => [
           'orientation' => 'bottom left',
          'format' => 'yyyy-mm-dd',
          'todayHighlight' => true,
           'autoclose'=>true,
      ]
    ]) ?>
    <div class="row">
    <div class="col-md-4">
        
    <?= $form->field($model, 'jam_pagi')->widget(TimePicker::class,[]) ?>
    </div>
        <div class="col-md-4">
    <?= $form->field($model, 'jam_siang')->widget(TimePicker::class,[]) ?>
        
    </div>
        <div class="col-md-4">
    <?= $form->field($model, 'jam_sore')->widget(TimePicker::class,[]) ?>
        
    </div>

        
    </div>
 <?= $form->field($model, 'aktif')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => 'Status Jadwal Petugas...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
