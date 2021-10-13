<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use kartik\file\FileInput;
use yii\helpers\Url;
use fedemotta\datatables\DataTables;
use kartik\checkbox\CheckboxX;
use kartik\growl\GrowlAsset;
use kartik\base\AnimateAsset;
use yii\widgets\DetailView;
GrowlAsset::register($this);
AnimateAsset::register($this);
/* @var $this yii\web\View */
/* @var $model backend\models\PemohonUploadFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemohon-sewa-index">
    <div class="panel panel-inverse">
        <?=
DetailView::widget([
    'model'=>$model,
    'attributes'=>[
                'nmjenis:text:Tipe Pemohon',
        'no_ktp:text:No. KTP',
        'no_npwp:text:No. NPWP',
        'nm_pemohon:text:Nama Pemohon',
        'nm_jenis_izin:text:Nama Jenis Izin',
        'nm_jenis_permohonan:text:Nama Jenis Permohonan'
    ]
])
?>
    </div>
</div>
<div class="pemohon-upload-file-form">
    <div class="note note-yellow m-b-15">
        <div class="note-icon f-s-20">
            <i class="fa fa-lightbulb fa-2x"></i>
        </div>
        <div class="note-content">
            <h4 class="m-t-5 m-b-5 p-b-2">Catatan Upload File Berkas</h4>
            <ul class="m-b-5 p-l-25">
                <li>Batas ukuran upload file max : <strong>5 Mb</strong>.</li>
                <li>Hanya tipe file <strong>.pdf hasil</strong> scan</li>
                <li>klik tombol [Upload] untuk upload berkas.</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-inverse" data-sortable-id="table-basic-8">
        <div class="panel-heading">
            <h4 class="panel-title">Upload persyarat dokumen</h4>
        </div>
        <div class="panel-body">
            <?=
            \kartik\grid\GridView::widget([
                'dataProvider' => $dataProviderJenisPermohonan,
                'columns' => [
                    ['class' => '\kartik\grid\SerialColumn'],
                    [
                        'header'=>'Nama Dok',
                        'value'=>function($data){
                            return $data['nm_dok'];
                        }
                    ],
                    [
                        'header' => 'Upload File',
                        'width'=>'auto',
                        'format' => 'raw',
                        'value' => function($data, $url) use($no_registrasi) {
                            return "<div class='col-md-6'>".FileInput::widget([
                                        'name' => 'filedoc' . $data['id'],
                            
                                        'pluginOptions' => [
                                            
                                            'uploadUrl' => Url::to(['file-upload','id'=>$data['id'], 'name' => 'filedoc' . $data['id'], 'no_registrasi' => $no_registrasi]),
                                            'showPreview' => false,
                                            'showCaption' => true,
                                            'showRemove' => true,
                                            'showUpload' => true
                                        ]
                            ])."</div>";
                        }
                    ]
                ]
            ])
            ?>


        </div>
        <div class="panel-footer">
            <?= CheckboxX::widget([
                'name'=>'s_7', 
                'options'=>['id'=>'s_7','onClick'=>'pernytaan(this.value)','threeState' => false], 
                'pluginOptions'=>['size'=>'md'],
                 'initInputType' => CheckboxX::INPUT_CHECKBOX,
    'autoLabel' => true,
    'labelSettings' => [
        'label' => 'Right Label',
        'label' => 'Saya menyatakan bahwa dokumen yang di unduh adalah asli dari hasil scan dokumen asli, siap dipertanggungjawabkan sesuai UU yang berlaku, jika terjadi temuan dan dinyatakan palsu',
        'position' => CheckboxX::LABEL_RIGHT
    ]
                ]);  ?>
            <div style="display: none" id='butoncetak'>
            <?= yii\bootstrap\Html::button('Ajukan Permohonan',[
                'onClick'=>'simpanpernyataan()',
                'class'=>'btn btn-primary'])?>
                
            </div>
        </div>
    </div>

</div>
<script>
    function pernytaan(nilai)
    {
       if(nilai==''){
           $("#butoncetak").css("display","block");
       }else{
                  $("#butoncetak").css("display","none");
    
       }
    }
    function simpanpernyataan()
    {
        var pilih = $("#s_7").val();
        var no_registrasi = "<?=$no_registrasi ?>";
        var posting = $.post("<?= Url::to(['simpan-pernyataan']) ?>",{
            pilih : pilih,
            no_registrasi : no_registrasi
        })
        posting.done(function(){
            console.log('done')
        });
        posting.always(function(data){
            var data = JSON.parse(data);
            $.notify(data.growlOptions,data.growlSettings);
            window.location = "<?= Url::to(['#pemohon-upload-file/permohonan-berhasil']) ?>"
        })
    }
    </script>