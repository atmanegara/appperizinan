<?php
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$no_registrasi = Yii::$app->request->get('no_registrasi');
?>

<?= 
DetailView::widget([
    'model'=>$pemohonPengajuan,
    'attributes'=>[
    'no_ktp:text:No. KTP',
        'no_npwp:text:No. NPWP',
        'nm_pemohon:text:Nama Pemohon',
        'nm_jenis_izin:text:Jenis Izin',
        'nm_jenis_permohonan:text:Jenis Permohonan'
    ]
])
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="panel-title">Dokumen Berkas</h4>
    </div>
    <div class="panel-body">
        <?=
GridView::widget([
    'id'=>'cek-berkas-dok',
    'dataProvider'=>$dataProvider,
    'columns'=>[
        [
            'class'=> 'kartik\grid\SerialColumn'
        ],
        [
            'header'=>'Dokumen',
            'attribute'=>'id_detail_jenis_izin',
            'value'=> function ($data){
                $detail_jenis_izin = \backend\models\DetailJenisIzin::find()->where(['id'=>$data['id_detail_jenis_izin']])->one();
                
                return $detail_jenis_izin['nm_dok'];
            }
        ],
                [
                    'header'=>'File Upload',
                    'format'=>'raw',
                    'value'=>function($data){
                    $url = './uploads/'.$data['data_file_upload'];
            return yii\bootstrap\Html::button('Tampil Dokumen',[
                'title'=>'Tampil Dokumen Persyaratan',
                   'value'=> Url::to(['tampil-dok','id'=>$data['id']]),
                 'class'=>'btn btn-info showModalButton'
            ]);
                    }
                ],
                        [
                            'header'=>'Re-Upload',
                            'class'=> '\kartik\grid\CheckboxColumn'
                        ]
    ]
])
        ?>
    </div>
</div>



<div class="row">
    <div class="col-md-8">
        <p>
            <?= \yii\helpers\Html::hiddenInput('id_pemohon',$pemohonPengajuan['id'],['id'=>'id_pemohon']) ?>
            <?= \yii\helpers\Html::hiddenInput('no_registrasi',$no_registrasi,['id'=>'no_registrasi']) ?>
        </p>
        <p>
             <?= \yii\helpers\Html::label('Keterangan', 'ket') ?>
        <?= yii\bootstrap\Html::textarea('ket', '', [
            'class'=>'form-control',
            'id'=>'ket'
        ]) ?>
        </p>
        <p>
    <?= yii\bootstrap\Html::button('Di terima', [
        'onClick'=>'diterima()','class'=>"btn btn-primary"
    ]) ?>        
            
        
                <?= yii\bootstrap\Html::button('Di tolak', [
        'onClick'=>'ditolak()','class'=>"btn btn-danger"
    ]) ?>        

        </p>
    </div>

</div>
<?php
Modal::begin([
'headerOptions' => ['id' => 'modalHeader'],
'id' => 'modal',
'size' => 'modal-lg',
    'options'=>[
        'style'=>['padding-top'=>'70px']
    ],
'clientOptions' => ['backdrop' => 'static', 'keyboard' => true]
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>
<script>
function diterima()
{
    var id_pemohon = $("#id_pemohon").val();
    var no_registrasi = $("#no_registrasi").val();
    var ket = $("#ket").val();
    var status_pengajuan = 1;
    
    var posting = $.post("<?= Url::to(['diterima']) ?>",{
        no_registrasi : no_registrasi
    })
    posting.always(function(){
        alert('sukses')
    })
}
function ditolak()
{
     var keys = $('#cek-berkas-dok').yiiGridView('getSelectedRows');
    var id_pemohon = $("#id_pemohon").val();
    var no_registrasi = $("#no_registrasi").val();
    var ket = $("#ket").val();
    var status_pengajuan = 2;
    
    var posting = $.post("<?= Url::to(['ditolak']) ?>",{
        no_registrasi : no_registrasi,
        keys : keys,
        ket : ket
    })
    posting.always(function(){
        alert('sukses')
    })
}
</script>
<style>
    .modal-content {
  position: absolute;
    }
  </style>