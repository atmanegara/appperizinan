<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefJnsTlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Jns Tls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-jns-tl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ref Jns Tl', ['#ref-jns-tl/create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Tambah Lokasi', ['#ref-lok-jns-tl/index'], ['class' => 'btn btn-info']) ?>
     </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nm_jns_tl',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete} {tarif}',
                'buttons'=>[
                    'view'=>function($url,$data,$key){
                        $url = Url::to(['#ref-jns-tl/view','id'=>$key]);
                        return Html::a('Tampil', $url, ['class'=>'btn btn-info']);
                    },
                            'update'=>function($url,$data,$key){
                        $url = Url::to(['#ref-jns-tl/update','id'=>$key]);
                        return Html::a('Update', $url, ['class'=>'btn btn-warning']);
                            },
                                    'delete'=>function($url,$data,$key){
                                $url = Url::to(['#ref-jns-tl/delete','id'=>$key]);
                                return Html::a('Delete', $url, [
                                    'class'=>'btn btn-danger',
                                    'data'=>[
                                        'confirm'=>'Anda yakin hapus item ini?',
                                    'method'=>'post',
                                    ]
                                ]);
                                    },
                                            'tarif'=>function($url,$data,$key){
                                                $url = Url::to(['#tarif-jns-tl/index','id'=>$key]);
                                                    return Html::a("Tarif",$url,[
                                                        'class'=>'btn btn-purple'
                                                    ]);
                                            
                                            }
                ]
                ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
