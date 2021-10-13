<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\DataPemohon;
/* @var $this yii\web\View */
/* @var $model backend\models\PemohonPengajuan */
/* @var $form yii\widgets\ActiveForm */
$dataJenisIzin = ArrayHelper::map(backend\models\RefJenisIzin::find()->all(), 'id', 'nm_jenis_izin');
$dataJenisPermohonan = ArrayHelper::map(backend\models\RefJenisPermohonan::find()->all(), 'id', 'nm_jenis_permohonan');
$dataJnsBdnUsaha = ArrayHelper::map(backend\models\RefJenisBdnUsaha::find()->all(), 'id', 'nm_jns_bdn_usaha');
$dataPemohon = ArrayHelper::map(DataPemohon::find()->all(), 'id', function($model,$defaultValue){
    
    $tipe_pemohon = frontend\models\RefTipePemohon::find()->where(['id'=>$model['id_tipe_pemohon']])->one();
    
    return sprintf('[ %s ] %s %s',$tipe_pemohon['nmjenis'],$model['no_ktp'],$model['nm_pemohon']);
});

        $hak_user = \Yii::$app->user->identity->kode_group_user;
?>

<div class="pemohon-pengajuan-form">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">
                Data Pengajuan
            </h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
<?php
  $hak_user = \Yii::$app->user->identity->kode_group_user;
        if (in_array($hak_user, ['FO'])){
     ?>
       
   <?php
 echo   $form->field($model, 'id_data_pemohon')->label('Data Pemohon')->widget(Select2::class, [
        'data' => DataPemohon::getDataPemohon(),
        'options' => [
        //    'id' => "id_jenis_izin",
            'onChange'=>'detailpemohon(this.value)',
            'placeholder' => 'Pilih Pemohon..'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]);
        }
    ?>
    <div id="data-pemohon">
        
    </div>

    <?=
    $form->field($model, 'id_jenis_izin')->label('Jenis Perizinan')->widget(Select2::class, [
        'data' => $dataJenisIzin,
        'options' => [
        //    'id' => "id_jenis_izin",
            'placeholder' => 'Pilih Jenis izin..'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])
    ?>

    <?=
    $form->field($model, 'id_jenis_permohonan')->label('Jenis Permohonan')->widget(Select2::class, [
        'data' => $dataJenisPermohonan,
        'options' => [
    //        'id' => 'id_jenis_permohonan',
            'placeholder' => 'Pilih Jenis Permohonan ...',
        //    'onChange' => "tampilkansyarat()"
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])
    ?>
<?php
if(in_array($hak_user,['SA'])){
    echo $form->field($model, 'id_data_pemohon')->label('Pemohon')->widget(Select2::class, [
        'data' => $dataPemohon,
        'options' => [
            'placeholder' => 'Pilih Pemohon ...'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]);
   
}
  ?>  
    <?=
    $form->field($model, 'id_jenis_bdn_usaha')->label('Jenis Badan Usaha')->widget(Select2::class, [
        'data' => $dataJnsBdnUsaha,
        'options' => [
            'placeholder' => 'Pilih Jenis Badan Usaha ...'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])
    ?>
    <?=
            $form->field($model, 'lokasi_izin')->label('Lokasi Usaha')->textInput();
            ?>
    <div id='tabel-syarat-dok'>

    </div>
    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
<script>
    function tampilkansyarat() {
        var id_jenis_izin = $("#pemohonpengajuan-id_jenis_izin").val();
        var id_jenis_permohonan = $("#pemohonpengajuan-id_jenis_permohonan").val();

        var posting = $.post("<?= yii\helpers\Url::to(['syarat-dok']) ?>", {
            id_jenis_izin: id_jenis_izin,
            id_jenis_permohonan: id_jenis_permohonan
        });
        posting.done(function () {
            console.log('done')
        });
        posting.always(function (htmlstring) {
            $("#tabel-syarat-dok").html(htmlstring)
        })
    }
    
    function detailpemohon(id_data_pemohon){
        var posting = $.post('<?= \yii\helpers\Url::to(['detail-pemohon']) ?>',{
            id_data_pemohon : id_data_pemohon
        });
        posting.done(function(){
            console.log('done')
        });
        posting.always(function(html){
            $("#data-pemohon").html(html);
        })
    }
</script>