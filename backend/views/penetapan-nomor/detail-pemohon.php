<?php
use yii\widgets\DetailView;
use yii\bootstrap\Html;
?>
<?=
DetailView::widget([
    'model'=>$model,
    'attributes'=>[
        'nm_pemohon',
        'nm_jenis_izin',
        'nm_jenis_permohonan',
        'nm_perusahaan',
        'alamat'
    ]
])
?>
<?=
DetailView::widget([
   'model'=>$modelBeritaAcara,
    'attributes'=>[
        'no_berita','tgl_berita',
        [
            'label'=>'File Berita Acara',
            'format'=>'raw',
            'value'=>function($model){
    return Html::a($model['file_berita'],'./uploads/'.$model['file_berita']);
            }
        ]
    ]
])
        ?>
