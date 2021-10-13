<?php

use yii\helpers\Url;
use yii\bootstrap\Html;
use kartik\grid\GridView;
use fedemotta\datatables\DataTables;
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        Hasil Peninjauan Lapangan Oleh Tim
    </div>
    <div class="panel-body">
        <?=

        GridView::widget([
    'pjax'=>true,
       
    'dataProvider' => $dataProvider,
    'columns' =>
    [
        ['class' => 'kartik\grid\SerialColumn'],
[
          'width'=>'5px',
    'header'=>'No. registrasi',
    'value'=>function($data){
            return $data['no_registrasi'];
    }
],
        [
                    'width'=>'190px',
            'header' => "NIK / Nama Pemohon / Nama Perusahaan",
            'format' => 'raw',
            'value' => function($data) {
                return $data['no_ktp'] . '<br>' . $data['nm_perusahaan'];
            }
        ],
        [
                    'width'=>'90px',
            'header' => 'Jenis Pemohon',
            'format' => 'raw',
            'value' => function($data) {
                return $data['nm_jenis_izin'] . '<br>' . $data['nm_jenis_permohonan'];
            }
        ],
        [
    
            'class' => 'kartik\grid\ActionColumn',
            'header' => false,
            'template' => '{pentol} {view} {update}',
            'buttons' => [
                'view' => function($url, $data) {
                    $exists= backend\models\DataHasilTinjauan::find()->where(['id_pemohon_pengajuan'=> $data['id']])->exists();
                    if($exists>0){
                    $url = yii\helpers\Url::to(['#hasil-tinjauan/view-hasil-tinjauan','id'=>$data['id']]);
                  $html= Html::a('View', $url,['class'=>'btn btn-primary']);
                    }else{
                        $html='';
                    }
                    return $html;
                },
                        'update'=>function($url,$data){
                        $url = Url::to(['#hasil-tinjauan/create','id'=>$data['id_jadwal_peninjau']]);
                        return Html::a('Entry Hasil Tujuan ', $url,[
                            'class'=>'btn btn-info'
                        ]);
                        }
                       
            ]
        ]
]])
?>
    </div>
</div>
