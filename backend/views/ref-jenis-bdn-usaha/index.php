<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefJenisBdnUsahaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Jenis Bdn Usahas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-jenis-bdn-usaha-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah baru', ['#ref-jenis-bdn-usaha/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             'nm_jns_bdn_usaha',

            ['class' => 'yii\grid\ActionColumn',
                       'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view'=>function($url,$data){
                        $url = Url::to(['#ref-jenis-bdn-usaha/view','id'=>$data['id']]);
                        return Html::a('View', $url, [
                            'class'=>'btn btn-info'
                        ]);
                    },
                            'update'=>function($url,$data){
                        $url = Url::to(['#ref-jenis-bdn-usaha/update','id'=>$data['id']]);
                        return Html::a('Update', $url, [
                            'class'=>'btn btn-warning'
                        ]);
                            },
                                    'delete'=>function($url,$data){
                                    $url= Url::to(['#ref-jenis-bdn-usaha/delete','id'=>$data['id']]);
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
