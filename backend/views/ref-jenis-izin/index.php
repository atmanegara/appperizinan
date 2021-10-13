<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefJenisIzinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Jenis Izin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-jenis-izin-index">

    <p>
        <?= Html::a('Buat Baru Jenis Izin', ['#ref-jenis-izin/create'], ['class' => 'showModalButton  btn btn-success']) ?>
    </p>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title">Data Jenis Izin</label>
        </div>
        <div class="panel-body">
                <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'kd_jenis_izin:text:Kode Izin',
            'nm_jenis_izin:text:Nama Jenis Perizinan',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view'=>function($url,$data){
                        $url = yii\helpers\Url::to(['#ref-jenis-izin/view','id'=>$data['id']]);
                        
                        return Html::a('View', $url,[
                            'class'=>'btn btn-info'
                        ]);
                    },
                            'update'=>function($url,$data){
                        $url = Url::to(['#ref-jenis-izin/update','id'=>$data->id]);
                        return Html::a('Update', $url,[
                            'class'=>'btn btn-warning'
                        ]);
                            },
                                    'delete'=>function($url,$data){
                                $url = Url::to(['#ref-jenis-izin/delete','id'=>$data->id]);
                                echo Dialog::widget(['overrideYiiConfirm'=>true]);
                                return Html::a('Delete', $url, [
                                    'class'=>'btn btn-danger',
                                   
        'data-confirm' => 'Are you sure to delete this item?',
        'data-method' => 'post'

                                ]);
                                    }
                ]
                ],
        ],
    ]); ?>
        </div>
    </div>

</div>
<?php
        $this->registerCss(".modal-content {
  position: absolute;}");
?>