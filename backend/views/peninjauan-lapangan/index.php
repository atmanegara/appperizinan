<?php

use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Html;
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h1 class="panel-title">
            Data Perizinan
        </h1>
    </div>
    <div class="panel-body">
<?= 
GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        [
            'class'=> '\kartik\grid\SerialColumn'
        ],
        'no_registrasi:text:No Registrasi',
        [
            'header'=>'Pemohon',
            'format'=>'html',
            'value'=>function($data){
                $no_ktp = $data['no_ktp'];
                $nm_pemohon = $data['nm_pemohon'];
                $nm_perusahaan = $data['nm_perusahaan'];
                return $no_ktp.'<br>'.$nm_pemohon.'<br>'.$nm_perusahaan;
            }
        ],
                [
                    'header'=>'Jenis Izin',
                    'format'=>'html',
                    'value'=>function($data){
           $nm_jenis_izin =  $data['nm_jenis_izin'];
           $tgl_pengajuan = $data['tgl_pengajuan'];
            return $nm_jenis_izin.'<br>'.$tgl_pengajuan;
                    }
                ],
                        [
                            'header'=>"Tanggal Peninjauan Lapangan",
                            'value'=>function($data){
                            return $data['tgl_peninjauan'];
                            }
                        ],
                        [
                            'class'=> 'kartik\grid\ActionColumn',
                            'template'=>'{entry} {edit} {view}',
                            'buttons'=>[
                                'entry'=>function($url,$data){
                                    $id_pengajuan = $data['id'];
                                                $peninjauanLapangan= backend\models\JadwalPeninjauan::find()
                                                        ->where(['id_pemohon_pengajuan'=>$id_pengajuan]);
                                                if ($peninjauanLapangan->exists() >0){
                                    $url = Url::to(['#peninjauan-lapangan/edit-entry-jadwal','id'=>$data['id_jdwl_peninjauan']]);
                                                 $html =    Html::a('Ubah Jadwal', $url, ['class'=>'btn btn-warning btn-sm']);
                                                }else{
                                    $url = Url::to(['#peninjauan-lapangan/entry-jadwal','id_pemohon_pengajuan'=>$data['id']]);
                                                    $html = Html::a('Input Jadwal', $url, ['class'=>'btn btn-info']);
                                                }
                                    return $html;
                                },
                                        'view'=>function($url,$data){
                                                $id_pemohon_pengajuan = $data['id'];
                                                $peninjauanLapangan= backend\models\JadwalPeninjauan::find()
                                                        ->where(['id_pemohon_pengajuan'=>$id_pemohon_pengajuan]);
                                                $id_data_peninjauan = $peninjauanLapangan->one();
                                            $url = Url::to(['#peninjauan-lapangan/view','id'=>$id_data_peninjauan['id']]);
                                            
                                            if ($peninjauanLapangan->exists()>0){
                                                $html = yii\helpers\Html::a('Jadwal Peninjauan', $url,[
                                                    'class'=>'btn btn-success btn-sm'
                                            ]);         
                                            }else {
                                                $html = '';
                                            }
                                            return $html ;
                                            }
                                        
                            ]
                        ]
    ]
])
?>        
    </div>
</div>


