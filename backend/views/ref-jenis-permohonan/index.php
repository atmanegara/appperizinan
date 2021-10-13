<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefJenisPermohonanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Jenis Permohonans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-jenis-permohonan-index">

     <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Baru', ['#ref-jenis-permohonan/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Daftar Jenis Permohonan
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'pjax'=>false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

//            'id',
           [
             'header'=>'Nama Jenis Permohonan',
               'width'=>'auto',
               'value'=>function($data){
        return $data[ 'nm_jenis_permohonan'];
               }
           ],

            ['class' => 'kartik\grid\ActionColumn',
                   'width'=>'auto',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view'=>function($url,$data){
                        $url = Url::to(['#ref-jenis-permohonan/view','id'=>$data['id']]);
                        return Html::a('View', $url, [
                            'class'=>'btn btn-info'
                        ]);
                    },
                            'update'=>function($url,$data){
                        $url = Url::to(['#ref-jenis-permohonan/update','id'=>$data['id']]);
                        return Html::a('Update', $url, [
                            'class'=>'btn btn-warning'
                        ]);
                            },
                                    'delete'=>function($url,$data){
                                    $url= Url::to(['#ref-jenis-permohonan/delete','id'=>$data['id']]);
                                    return Html::a('Delete', $url, [
                                        'class'=>'btn btn-danger',
                                           'data' => [
                'method' => 'post',
                'confirm' => 'Are you sure you want to delete this item?',
            ],
                                    ]);
                                    }
                ]
                ],
        ],
    ]); ?>
        </div>
    </div>
    
</div>
