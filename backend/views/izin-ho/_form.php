<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\DataPemohon;
use backend\models\RefJnsTl;
use backend\models\RefLokJnsTl;
use backend\models\TarifJnsTl;
use backend\models\RefIndeksLok;
use backend\models\RefNilaiSkala;
use backend\models\PemohonPengajuan;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\IzinHo */
/* @var $form yii\widgets\ActiveForm */
$dataNoReg =  $array = (new \yii\db\Query())
                ->select('a.id,a.no_registrasi,a.id_data_pemohon,b.nm_pemohon,a.id_jenis_permohonan')
                ->from('pemohon_pengajuan a')
                ->innerJoin('data_pemohon b','a.id_data_pemohon=b.id')
                ->where(['a.status_selesai'=>'1'])->all();
$dataPemohonPengajuan = ArrayHelper::map($dataNoReg,'no_registrasi','no_registrasi');
$dataPemohon = ArrayHelper::map(DataPemohon::find()->asArray()->all(),'id','nm_pemohon');
$dataJenisTl = ArrayHelper::map(RefJnsTl::find()->asArray()->all(),'id','nm_jns_tl');
$dataLokJnsTl = ArrayHelper::map(RefLokJnsTl::find()->asArray()->all(),'id','nm_jns_lok_tl');
$dataIndexLok   = ArrayHelper::map(RefIndeksLok::find()->asArray()->all(),'id','nm_jns_index');
$dataSkala = ArrayHelper::map(RefNilaiSkala::find()->asArray()->all(), 'id', 'ket');
?>

<div class="izin-ho-form">

    <?php $form = ActiveForm::begin(); ?>
 <?= $form->field($model, 'no_registrasi')->widget(Select2::class,[
   //     'initValueText'=>DataPemohon::NmPemohonById($model->id_data_pemohon),
        'data'=>$dataPemohonPengajuan,
     'options'=>[
     'placeholder'=>'Pilih No Registrasi..',
         'onChange'=>'getDataPemohonNoreg(this.value)'
         ],
     'pluginOptions'=>[
         'allowClear'=>true,
     ]
     ]) ?>
    <?= $form->field($model, 'id_data_pemohon')->label(false)->hiddenInput()?>
        <div class="col-md-12">
             <div id="detail-data-pemohon">
            
        </div>
      
    </div>
    <?= $form->field($model, 'jns_tl')->label('Jenis Lingkungan')->widget(Select2::class,[
        'initValueText'=> RefJnsTl::NmJnsTlById($model->jns_tl),
        'data'=>$dataJenisTl,
        'options'=>[
            'placeholder'=>'Pilih Jenis Lingkungan ....',
            'onChange'=>'getKawasan(this.value)'
        ],
         'pluginOptions'=>[
         'allowClear'=>true,
     ]
    ]) ?>

    <?= $form->field($model, 'kawasan')->label('Kawasan')->widget(Select2::class,[
       'initValueText'=> RefLokJnsTl::NmKawasanById($model->jns_tl),
     //   'data'=>$dataJenisTl,
        'options'=>[
            'placeholder'=>'Pilih Kawasan ....',
        ],
         'pluginOptions'=>[
         'allowClear'=>true,
     ]
    ]) ?>


    <?= $form->field($model, 'jns_jalan')->label('Lokasi Jalan')->widget(Select2::class,[
  //  'initValueText'=> RefJnsTl::NmJnsTlById($model->jns_tl),
        'data'=>$dataIndexLok,
        'options'=>[
            'placeholder'=>'Pilih Lokasi Jalan ....',
        ],
         'pluginOptions'=>[
         'allowClear'=>true,
     ]
    ]) ?>
    <div class="row">
        <div class="col-md-6">
    <?= $form->field($model, 'id_ref_nilai_skala')->label('Skala')->widget(Select2::class,[
        'initValueText'=> RefNilaiSkala::getKetById($model->id_ref_nilai_skala),
        'data'=>$dataSkala,
          'options'=>[
            'placeholder'=>'Pilih Nilai  ....',
        ],
         'pluginOptions'=>[
         'allowClear'=>true,
     ]
    ]) ?>  
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'nilai_investasi')->label('Investasi')->textInput() ?>
  
        </div>
    </div>

    <?= $form->field($model, 'luas_tinggi')->label('Luas Tinggi <small>*)Luas * Tinggi</small>')->textInput([
        'onChange'=>'hitungTarif()'
    ]) ?>
    <?= $form->field($model, 'tarif_retribusi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
function getKawasan(id_ref_jns_tl){
    var posting = $.post("<?= Url::to(['tarif-jns-tl/get-data-tarif-kawasan'])?>",{
        id_ref_jns_tl : id_ref_jns_tl
    });
    posting.done(function(){
        console.log('done')
    });
    posting.fail(function(){
        console.log('faiil')
    });
    posting.always(function(html){
        $("#izinho-kawasan").html(html);
    })
}

function hitungTarif()
{
    var id_ref_jns_tl = $("#izinho-jns_tl").val();
    var id_ref_lok_tl = $("#izinho-kawasan").val();
    var jns_jalan = $("#izinho-jns_jalan").val();
    var luas_tinggi = $("#izinho-luas_tinggi").val();
    var nilai_investasi = $("#izinho-nilai_investasi").val();
    var id_ref_nilai_skala = $("#izinho-id_ref_nilai_skala").val();
    
    var posting = $.post("<?= Url::to(['izin-ho/hitung-tarif']) ?>",{
    id_ref_jns_tl : id_ref_jns_tl,
    id_ref_lok_tl : id_ref_lok_tl,
    jns_jalan : jns_jalan,
    luas_tinggi : luas_tinggi,
    nilai_investasi : nilai_investasi,
    id_ref_nilai_skala : id_ref_nilai_skala
    });
    posting.done(function(){
        console.log('done');
    })
    posting.always(function(val){
        $("#izinho-tarif_retribusi").val(val);
    })
}
</script>
<script>
    function getDataPemohonNoreg(no_reg){
        
        
        var posting = $.get('<?= Url::to(['pemohon-pengajuan/detail-permohonan-by-no-reg']) ?>',{
    no_registrasi : no_reg    
    });
    posting.done(function(){
        console.log('done');
    });
    posting.always(function(html){
        $("#detail-data-pemohon").html(html);
        if(no_reg==''){
        $("#detail-data-pemohon").html('');
        }
    })
    }
</script>