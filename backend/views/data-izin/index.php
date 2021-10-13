<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataIzinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Izins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-izin-index">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title">
                Data Surat Izin 
            </label>
        </div>
        <div class="panel-body">
     <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Data Izin', ['#data-izin/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'id',
    //        'id_penetapan_nomor',
            [
                'header'=>'No SK Penetapan ',
                'format'=>'html',
                'value'=>function($data){
        return $data['no_sk'].' / Tanggal SK : '.$data['tgl_sk'];
                }
            ],
            'tgl_surat',
            'isi_surat:html',
            'file_surat',
            //'id_ref_ttd',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>            
        </div>
    </div>

</div>
