<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\BeritaLabel;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-berita-index">
    <div class="panel">
        <div class="panel-body">

            <div class="pull-right">
                <p>
                    <?= Html::a('Berita Baru', ['#berita/create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'pjax'=>true,
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],

                    // 'id',
                    'date',
                    [
                        'attribute' => 'id_label',
                        'label' => 'Label Berita',
                        'value' => function ($model) {
                            $data = BeritaLabel::find()->where(['id' => $model->id_label])->one();
                            return $data['nama'];
                        },
                    ],
                 [
                       'contentOptions' => ['style' => 'width: 50%; overflow: scroll;word-wrap: break-word;white-space:pre-line;']  ,
                     'header'=>'Title',
                     'value'=>function($data){
                            return $data['title'];
                     }
                 ],
                         [
                           'header'=>'Deskripsi',
                             'format'=>'raw',
                             'value'=>function($data){
                                return $data['description'];
                             }
                         ],
//                    'description',
                    // 'content:ntext',
                    // 'slug',
                    // 'id_user',
                    
                    // 'timestamp',
                    [
                        'header' => 'Option',
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{upload}',
                        'buttons' => [
                            'upload' => function($url, $model, $key) {
                                return Html::a('Upload File', ['upload', 'idpost' => $model->id]);
                            },
                        ]
                    ],
                   ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view'=>function($url,$data){
                $url = Url::to(['#berita/view','id'=>$data['id']]);
                return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url);
                    },
                               'update'=>function($url,$data){
                $url = Url::to(['#berita/update','id'=>$data['id']]);
                return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url);
                    },
                               'delete'=>function($url,$data){
                $url = Url::to(['#berita/delete','id'=>$data['id']]);
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
