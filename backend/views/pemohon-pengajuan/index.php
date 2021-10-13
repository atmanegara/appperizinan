<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PemohonPengajuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pemohon ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemohon-pengajuan-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'id',
            'no_registrasi',
            [
                'header'=>'KTP / Nama Pemohon / Nama Perusahaan',
                'format'=>'html',
                'value'=>function($data){
                    return $data['no_ktp'].'<br>'.$data['nm_pemohon'].'<br>'.$data['nm_perusahaan'];
                }
            ],
                    'nm_jenis_izin:text:Nama Jenis Izin',
                    'nm_jenis_permohonan:text:Permohohan',
                    'tgl_pengajuan:text:Tanggal Pengajuan',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{cekberkas} {view}',
                'buttons'=>[
                    'cekberkas'=>function($url,$data){
                        $url = Url::to(['#pemohon-pengajuan/cek-berkas','no_registrasi'=>$data['no_registrasi']]);
                        
                        return Html::a('Cek Berkas', $url,[
                            'class'=>'btn btn-warning'
                        ]);
                    },
                            'view'=>function($url,$data){
                        $url = Url::to(['detail-pemohon','no_registrasi'=>$data['no_registrasi']]);
                        return Html::a('Detail Pemohon', $url,[
                            'class'=>'btn btn-danger'
                        ]);
                            }
                ]
                ],
        ],
    ]); ?>
</div>
