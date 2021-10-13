<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Faq', ['#faq/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pertanyaan:ntext',
         [
             'header'=>"Jawab",
             'format'=>'raw',
             'value'=>function($data){
             return $data['jawab'];
             }
         ],
            'aktif',

              ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view'=>function($url,$data){
                $url = Url::to(['#faq/view','id'=>$data['id']]);
                return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url);
                    },
                               'update'=>function($url,$data){
                $url = Url::to(['#faq/update','id'=>$data['id']]);
                return \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url);
                    },
                               'delete'=>function($url,$data){
                $url = Url::to(['#faq/delete','id'=>$data['id']]);
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
