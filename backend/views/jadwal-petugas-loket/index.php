<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal Petugas Lokets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-petugas-loket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jadwal Petugas Loket', ['#jadwal-petugas-loket/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_data_petugas_loket',
            'id_ref_loket',
         
            'tgl_masuk',
            'jam_pagi',
         'jam_siang',
          'jam_sore',
            //'id_ref_jenis_izin',
            //'aktif',

            ['class' => 'yii\grid\ActionColumn',
                  'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view'=>function($url,$data,$key){
                        $url = Url::to(['#jadwal-petugas-loket/view','id'=>$key]);
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                   'class'=>'btn btn-sm btn-info',
                            'title'=>'Tampil',
                            'data'=>[
                                'pjax'=>0
                            ]
                        ]);
                    },
                                  'update'=>function($url,$data,$key){
                        $url = Url::to(['#jadwal-petugas-loket/update','id'=>$key]);
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'class'=>'btn btn-sm btn-primary',
                               'title'=>'Ubah Data',
                            'data'=>[
                                'pjax'=>0
                            ]
                        ]);
                    },
                                          'delete'=>function($url,$data,$key){
                        $url = Url::to(['#jadwal-petugas-loket/delete','id'=>$key]);
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                   'class'=>'btn btn-sm btn-danger',
                               'title'=>'Hapus Data',
                            'data'=>[
                                'method'=>'post',
                                'confirm'=>'Apakah anda yakin hapus item ini?',
                                'pjax'=>0
                            ]
                        ]);
                    }
                ]],
        ],
    ]); ?>
</div>
