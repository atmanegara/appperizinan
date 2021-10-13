<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefTimTeknisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Tim Teknis';
$this->params['breadcrumbs'][] = $this->title;
$kode_group_user = Yii::$app->user->identity->kode_group_user;
?>
<div class="ref-tim-teknis-index">

     <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if(in_array($kode_group_user,['SA'])){
        echo Html::a('Tambah Tim Teknis', ['#ref-tim-teknis/create'], ['class' => 'btn btn-success']);
        
        }else{
            ?>
     
    <div class="note note-warning m-b-15">
        <div class="note-icon">
            <i class="fa fa-info"></i>
        </div>
        <div class="note-content">
           <h4><b>Perhatian!</b></h4>
						<p>
							Untuk bagian backoffice data tim teknis hanya untuk melihat
						</p>
        </div>
    </div>
        <?php
        }
        ?>
        
    </p>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Datftar Tim Teknis
        </div>
        <div class="panel-body">
            
    
    <?php
       if(in_array($kode_group_user,['SA'])){
    echo GridView::widget([
        'dataProvider' => $dataProvider,
 //       'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'id',
            'nm_teknisi:text:Nama Teknisi',
            'tgl_terbentuk:text:Tanggal terbentuk',
            [
                'header'=>'Status Tim',
                 'attribute'=>'status_tim',
               'format'=>'raw',
                'value'=>function($data){
                    $status_tim = $data['status_tim']=='Y' ? 'Aktif' : 'Non Aktif';
                    $span_status_tim = $data['status_tim']=='Y' ? 'success' : 'danger';
                    return "<span class='label label-$span_status_tim'>$status_tim</span>";
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{anggota} {view} {update} {delete}',
                'buttons'=>[
                    'anggota'=>function($url,$data){
                        $url = Url::to(['#detail-tim-teknis/index','id'=>$data['id']]);
                        return Html::a('Anggota', $url, [
                            'class'=>'btn btn-success'
                        ]);
                    },
                    'view'=>function($url,$data){
                        $url = Url::to(['#ref-tim-teknis/view','id'=>$data['id']]);
                        return Html::a('View', $url, [
                            'class'=>'btn btn-info'
                        ]);
                    },
                            'update'=>function($url,$data){
                        $url = Url::to(['#ref-tim-teknis/update','id'=>$data['id']]);
                        return Html::a('Update', $url, [
                            'class'=>'btn btn-warning'
                        ]);
                            },
                                    'delete'=>function($url,$data){
                                    $url= Url::to(['#ref-tim-teknis/delete','id'=>$data['id']]);
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
       ]);
    
       }else{
             echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nm_teknisi',
   ['class' => 'yii\grid\ActionColumn',
       'template'=>'{view}',
           'buttons'=>[
                    'view'=>function($url,$data){
                        $url = Url::to(['#ref-tim-teknis/view','id'=>$data['id']]);
                        return Html::a('View', $url, [
                            'class'=>'btn btn-info'
                        ]);
                    },
                            ]
       ],
         
        ],
    ]);
       } ?>
                </div>
    </div>
</div>
