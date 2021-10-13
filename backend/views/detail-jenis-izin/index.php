<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DetailJenisIzinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Jenis Izins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-jenis-izin-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detail Jenis Izin', ['#detail-jenis-izin/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
            'pjax' => true,
    'striped' => true,
    'hover' => true,
 'responsive'=>true, 
         'toolbar' =>  [
 
     //   '{export}',
        '{toggleData}',
    ],
       'panel' => [
        'type' => GridView::TYPE_PRIMARY, 'heading' => 'Group Perizinan'],
  //  'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

      //      'id',
//            'id_jenis_izin',
  //          'id_jenis_permohonan',
                    [
                        'header'=>'Jenis Perizinan',
            'attribute' => 'id_jenis_izin', 
            'width' => '50px',
            'value' => function ($model, $key, $index, $widget) { 
                return $model->nm_jenis_izin;
            },
//            'filterType' => GridView::FILTER_SELECT2,
//            'filter' => ArrayHelper::map(Suppliers::find()->orderBy('company_name')->asArray()->all(), 'id', 'company_name'), 
//            'filterWidgetOptions' => [
//                'pluginOptions' => ['allowClear' => true],
//            ],
//            'filterInputOptions' => ['placeholder' => 'Any supplier'],
            'group' => true,  // enable grouping
        ],
                                        [
                                              'header'=>'Jenis Permohonan',
            'attribute' => 'id_jenis_permohonan', 
            'width' => '10px',
            'value' => function ($model, $key, $index, $widget) { 
                return $model->nm_jenis_permohonan;
            },
//            'filterType' => GridView::FILTER_SELECT2,
//            'filter' => ArrayHelper::map(Suppliers::find()->orderBy('company_name')->asArray()->all(), 'id', 'company_name'), 
//            'filterWidgetOptions' => [
//                'pluginOptions' => ['allowClear' => true],
//            ],
//            'filterInputOptions' => ['placeholder' => 'Any supplier'],
            'group' => false,  // enable grouping
        ],
       //     'nm_jenis_izin:text:Nama Perizinan',
         //   'nm_jenis_permohonan:text:Jenis Permohonan',
          [  
              'header'=>'No urut',
                'width' => '10px',
              'value'=>function($data){
                return $data['no_urut'];
              }
          ],
            'nm_dok:text:Nama Dokumen',

            ['class' => 'yii\grid\ActionColumn',
                   'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view'=>function($url,$data){
                        $url = Url::to(['#detail-jenis-izin/view','id'=>$data['id']]);
                        return Html::a('View', $url, [
                            'class'=>'btn btn-info'
                        ]);
                    },
                            'update'=>function($url,$data){
                        $url = Url::to(['#detail-jenis-izin/update','id'=>$data['id']]);
                        return Html::a('Update', $url, [
                            'class'=>'btn btn-warning'
                        ]);
                            },
                                    'delete'=>function($url,$data){
                                    $url= Url::to(['#detail-jenis-izin/delete','id'=>$data['id']]);
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
