<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BeritaAcaraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita Acaras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-acara-index">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title">
                Data Berita Acara
            </label>
        </div>
        <div class="panel-body">
               <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Berita Acara', ['#berita-acara/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'no_berita',
            'tgl_berita',
//            'isi_berita:ntext',
            [
              'header'=>'Status',
                'value'=>function($data){
        return $data['status_verifikasi']==1 ? 'setuju':'batal';
                }
            ],
            [
                'header'=>'Isi Berita',
                'format'=>'html',
                'value'=>function($data,$url){
                    return $data['isi_berita'];
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                        'view'=>function($url,$data){
                        $url = Url::to(['#berita-acara/view','id'=>$data['id']]);
                        return Html::a('View', $url, [
                            'class'=>'btn btn-info'
                        ]);
                    },
                            'update'=>function($url,$data){
                        $url = Url::to(['#berita-acara/update','id'=>$data['id']]);
                        return Html::a('Update', $url, [
                            'class'=>'btn btn-warning'
                        ]);
                            },
                                    'delete'=>function($url,$data){
                                    $url= Url::to(['#berita-acara/delete','id'=>$data['id']]);
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
    <?php Pjax::end(); ?>
        </div>
    </div>
 
</div>
