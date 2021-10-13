<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Label Berita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-berita-label-index">
<div class="panel">
    <div class="panel-body">

        <div class="pull-right">
            <p>
                <?= Html::a('Tambah Kategori Berita', ['#berita-label/create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_label',
            'nama',
            [
                'header'=>'Status',
                'format'=>'raw',
                'value'=>function($data){
        return $data['active']==1 ? "<span class='label label-success'>Aktif</span>" : "<span class='label label-danger'>Non Aktif</span>";
                }
            ],

          
            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view'=>function($url,$data){
                $url = Url::to(['#berita-label/view','id'=>$data['id']]);
                return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url);
                    },
                               'update'=>function($url,$data){
                $url = Url::to(['#berita-label/update','id'=>$data['id']]);
                return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url);
                    },
                               'delete'=>function($url,$data){
                $url = Url::to(['#berita-label/delete','id'=>$data['id']]);
                return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-trash"></span>',$url,[
                    'data'=>[
                        'confirm'=>'Are you sure you want to delete this item?',
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
