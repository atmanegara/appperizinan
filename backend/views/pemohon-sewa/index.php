<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PemohonSewaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemohon Sewas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemohon-sewa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Permohonan Sewa', ['#pemohon-sewa/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'pjax'=>true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'id',
            'no_reg_sewa',
            [
                'header'=>'Nama Bangunan',
                'attribute'=>'id_bangunan',
                'value'=>function($data){
                    return $data['nm_bangunan'];
                }
            ],
            'kegunaan',
            'tgl_sewa',
            [
                'header'=>'Status Konfirmasi',
                'value'=>function($data){
                $status_konfr=$data['status_konfir'];
        switch ($status_konfr){
                case 0:
                    $htmlket = "<span class='label label-info'>Belum Bayar</span>";
                    break;
                case 1:
                    $htmlket ="<span class='label label-primary>Menunggu Konfirmasi Pembayaran";
                    break;
                case 2:
                    $htmlket = "<span class='label label-success'>Pembayaran Telah Di Konfirmasi, Cek [Detail]</span>";
                    break;
                case 3:
                    $htmlket = "<span class='label label-danger'>Pemabayaran Ditolak, Cek [Detail]</span>";
                    break;
        }
        return $htmlket;
                }
            ],
       //     'id_data_pemohon',
      //      'id_bangunan',
      //      'biaya_sewa',
            //'hari',
            //'tgl_sewa',
            //'jam_awal',
            //'jam_akhir',
            //'kegunaan:ntext',
            //'nm_pnggung_jwb',
            //'telp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
