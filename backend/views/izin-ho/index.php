<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\IzinHoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Izin Hos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-ho-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
  'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Countries</h3>',
        'type'=>'success',
        'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah', ['#izin-ho/create'], ['class' => 'btn btn-success']),
        'footer'=>false
    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'id',
         //   'id_data_pemohon',
            'no_registrasi',
            [
              'header'=>'Pemohon',
                'attribute'=>'id_data_pemohon',
                'value'=>'dataPemohon.nm_pemohon'
            ],
            //'jns_tl',
            //'kawasan',
            //'luas_tinggi',
            //'jns_jalan',
            'tarif_retribusi',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view'=>function($data,$url,$key){
                    $url = Url::to(['/#izin-ho/view','id'=>$key]);
                    
                    return Html::a('View', $url, [
                        'class'=>'btn btn-info'
                    ]);
                    },
                              'update'=>function($data,$url,$key){
                    $url = Url::to(['/#izin-ho/update','id'=>$key]);
                    
                    return Html::a('Update', $url, [
                        'class'=>'btn btn-primary'
                    ]);
                    },
                                              'delete'=>function($data,$url,$key){
Dialog::widget([
    'overrideYiiConfirm' => true,
    'options'=>[
            'type'=> Dialog::TYPE_DANGER,
        'title'=>'Konfirmasi'
    ]]);
                        $url = Url::to(['/#izin-ho/delete','id'=>$key]);
                    
                    return Html::a('Delete', $url, [
                        'class'=>'btn btn-danger',
                        'data'=>[
                            'confirm'=>'Are you sure to delete this item?',
                            'method'=>'post'
                        ]
                    ]);
                    }
                ]
                ],
        ],
    ]); ?>
</div>
