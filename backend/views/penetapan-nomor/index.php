<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PenetapanNomorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penetapan Nomors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penetapan-nomor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penetapan Nomor', ['#penetapan-nomor/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-inverse">
        <div class="panel-heading ui-sortable-handle">
            Data Perizinan
        </div>
        <div class="panel-body">
             <?= GridView::widget([
                 'pjax'=>true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'no_registrasi',
           [
               'header'=>"NO SK / Tgl SK",
               'value'=>function($data){
                 return $data['no_sk'].'<br>'.$data['tgl_sk'];
               }
           ],
          [
              'header'=>'No. KTP / Pemohon / Perusahaan',
              'attribute'=>'no_ktp',
                      'format'=>'html',
              'value'=>function($data){
                return $data['no_ktp'].'<br>'.$data['nm_pemohon'].'<br>'.$data['nm_perusahaan'];
              }
          ],
                  [
                      'header'=>'Jenis Izin',
                      'format'=>'html',
                      'value'=> function ($data){
                        return $data['nm_jenis_izin'].'<br>'.$data['nm_jenis_permohonan'];
                      }
                  ],
            //'id_tanda_tangan',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {view}',
                'buttons'=>[
                    'update'=>function($url,$data){
                      $url = yii\helpers\Url::to(['#penetapan-nomor/update','id'=>$data['id']]);
                        return yii\bootstrap\Html::a('Update', $url,[
                            'class'=>'btn btn-warning'
                        ]);
                    },
                            'view'=>function($url,$data){
                        $url = \yii\helpers\Url::to(['#penetapan-nomor/view','id'=>$data['id']]);
                        return yii\bootstrap\Html::a('View', $url, [
                            'class'=>'btn btn-primary'
                        ]);
                            }
                ]
                ],
        ],
    ]); ?>
        </div>
    </div>
   
</div>
