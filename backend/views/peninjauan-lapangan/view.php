<?php

use kartik\grid\GridView;
use yii\widgets\DetailView;
?>
     <p>
        <?= \yii\helpers\Html::a('Ke Data Peninjauan',['#peninjauan-lapangan/index'],[
            'class'=>'btn btn-default'
        ]) ?>
         <?= \yii\helpers\Html::a('Update Jadwal Peninjauan',['#peninjauan-lapangan/edit-entry-jadwal','id'=>$model['id_jdwl_peninjauan']],[
            'class'=>'btn btn-warning'
        ]) ?>
    </p>  
<div class="panel panel-primary">

    <div class="panel-heading">
        <h1 class="panel-title">
            Tampil Data Pemohon
        </h1>
    </div>
    <div class="panel-body">
        <?= 
DetailView::widget([
    'model'=>$model,
    'attributes'=>[
        'no_ktp:text:No. KTP',
        'nm_pemohon:text:Nama Pemohon',
        'nm_perusahaan:text:Nama Perusahaan'
    ]                                    
]) 
?>

    </div>
</div>
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h1 class="panel-title">
            Data Jadwal Peninjauan Lapangan
        </h1>
    </div>
    <div class="panel-body">
        <p><?= 'Nama Tim Teknis : '.$nm_teknisi ?> 
        
        <?=
GridView::widget([
    'dataProvider'=>$dataProviderAnggota,
    'columns'=>[
        'nama','jabatan'
    ]
])
        ?>
</p>
        <hr>
        <p>Jadwal Peninjauan Lapangan 
<?=
GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        'nm_jenis_izin','tgl_pengajuan','tgl_peninjauan'
    ]
])
        ?>
        </p>
    </div>
</div>
