<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\RefTandaTangan;
/* @var $this yii\web\View */
/* @var $model backend\models\PenetapanNomor */
/* @var $form yii\widgets\ActiveForm */

$datPemohonPengajuan = backend\models\PemohonPengajuan::getDataPemohonNo();
$items = yii\helpers\ArrayHelper::map(RefTandaTangan::find()->asArray()->where(['status_ttd'=>"Y"])->all(),'id',
        function ($model,$attribute){
    return $model['nip'].' - '.$model['nm_pejabat'];
        }
        )
?>

<div class="penetapan-nomor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pemohon_pengajuan')->label('Pemohon Pengajuan')->widget(Select2::class,[
        'value'=>$model->id_pemohon_pengajuan,
       'data'=>$datPemohonPengajuan,
        'options'=>[
            'placeholder'=>'Pilih No Registrasi',
            'onChange'=>'detailpemohon(this.value)'
        ],
        'pluginOptions'=>[
            'allowClose'=>true,
             'allowClear' => true
        ]
    ]) ?>
    <div id="id-detail-pemohon">
        
    </div>
    <?= $form->field($model, 'no_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_sk')->widget(kartik\date\DatePicker::class,[
      
        'options'=>[
            'placeholder'=>'Pilih tanggal SK'
        ],
          'pluginOptions'=>[
                    'todayHighlight' => true,
                                'format'=>'yyyy-mm-dd',
                    'autoclose'=>true,
                ]
    ]) ?>

    <?= $form->field($model, 'tgl_tempo_sk')->widget(kartik\date\DatePicker::class,[
      
        'options'=>[
            'placeholder'=>'Pilih tanggal Kadaluarsa SK'
        ],
          'pluginOptions'=>[
                    'todayHighlight' => true,
                                'format'=>'yyyy-mm-dd',
                    'autoclose'=>true,
                ]
    ]) ?>

    <?= $form->field($model, 'id_tanda_tangan')->label('Yang Bertanda tangan SK Penetapan ')->dropDownList($items,[
        'prompt'=>'-- Pilih Pejabat Yang bertanda tangan --'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function detailpemohon(id_pemohon_pengajuan){
        
        var id_pemohon_pengajuan = id_pemohon_pengajuan;
        
        var posting = $.post("<?= Url::to(['detail-pemohon']) ?>",{
            id_pemohon_pengajuan : id_pemohon_pengajuan
        })
        posting.done(function(){
            console.log('done')
        });
        
        posting.always(function(ohtml){
            $("#id-detail-pemohon").html(ohtml);
        })
    }
    </script>