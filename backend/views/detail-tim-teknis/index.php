<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Tim Teknis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-tim-teknis-index">

    <h1><?= Html::encode($this->title.' : ( '.$tim_teknis.' )') ?></h1>

    <p>
        <?= Html::a('Data Master Tim Teknis', ['#ref-tim-teknis/index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Tambah Anggota Tim Teknis', ['#detail-tim-teknis/create','id_tim_teknis'=>$id_tim_teknis], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title">
                <?= $tim_teknis ?>
            </label>
        </div>
        <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'id',
        //    'id_tim_teknis',
            'nip',
            'nama',
            'jabatan',
            //'ket',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                     'update'=>function($url,$data){
                    $url = \yii\helpers\Url::to(['#detail-tim-teknis/update','id'=>$data['id']]);
                        return Html::a('Ubah', $url,[
                        'class'=>'btn btn-warning'
                    ]);
                    },
                    'view'=>function($url,$data){
                    $url = \yii\helpers\Url::to(['#detail-tim-teknis/view','id'=>$data['id']]);
                        return Html::a('Tampil', $url,[
                        'class'=>'btn btn-info'
                    ]);
                    },
                    'delete'=>function($url,$data){
                        $url = \yii\helpers\Url::to(['#detail-tim-teknis/delete','id'=>$data['id'],'id_tim_teknis'=>$data['id_tim_teknis']]);
                        return Html::a('Hapus', $url, [
                         'class'=>'btn btn-danger',
                            'data'=>[
                                'confirm'=>'Yakin data ini mau di hapus?',
                                'method'=>'post'
                            ]
                        ]);
                    }
                ]
                ],
        ],
    ]); ?>            
        </div>
    </div>

</div>
