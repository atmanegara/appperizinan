<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\RefBangunan;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\PemohonSewa */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="pemohon-sewa-form">

    <?php $form = ActiveForm::begin(); ?>




    <?= $form->field($model, 'id_bangunan')->widget(Select2::class,[
        'data'=> RefBangunan::getDataBangunan(),
        'options'=>[
            'placeholder'=>'PIlih Bangunan',
            'onChange'=>'getBiayaSewa(this.value)'
        ],
        'pluginOptions'=>[
            'allowClear'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'biaya_sewa')->textInput([
        'id'=>'biaya-sewa',
        'readOnly'=>true,
    ]) ?>

  
    <?= $form->field($model, 'tgl_sewa')->widget(DatePicker::class,[
        'options'=>[
            'placeholder'=>'Pilih Tanggal Sewa'
        ],
        'pluginOptions'=>[
              'autoclose'=>true,
            'format'=>'yyyy-mm-dd'
        ]
    ]) ?>
  <?= $form->field($model, 'hari')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jam_awal')->textInput() ?>

    <?= $form->field($model, 'jam_akhir')->textInput() ?>

    <?= $form->field($model, 'kegunaan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nm_pnggung_jwb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function getBiayaSewa(id_bangunan){
        var posting = $.post("<?= \yii\helpers\Url::to(['data-biaya-sewa/get-biaya-sewa']) ?>",{
            id_bangunan : id_bangunan
        });
        posting.done(function(){
            console.log('done')
        });
        posting.always(function(html){
            $("#biaya-sewa").val(html)
        })
    }
</script>