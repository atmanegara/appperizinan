<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataPemohonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pemohon';
$this->params['breadcrumbs'][] = $this->title;
$group = Yii::$app->user->identity->kode_group_user;
?>
<div class="data-pemohon-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if(in_array($group, ['SA','FO','BO'])){
        echo Html::a('Create Data Pemohon', ['#data-pemohon/create'], ['class' => 'btn btn-success']); 
        }
                ?>
        
    </p>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Daftar Pemohon
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'pjax'=>true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

    //        'id',
      //      'id_tipe_pemohon',
            [
              'header'=>'Tipe Pemohon',
                'value'=>function($data){
                $tipePemohon = frontend\models\RefTipePemohon::findOne($data['id_tipe_pemohon']);
                return $tipePemohon['nmjenis'];
                }
            ],
            'no_ktp:text:No. KTP',
            'no_npwp:text:No. NPWP',
        //    'id_jns_bdn_usaha',
            'nm_pemohon:text:Pemohon',
            //'nm_pmilik_bu',
            //'alamat_pemohon',
            //'id_desa',
            //'id_kec',
            //'email_pemohon:email',
            //'telp_pemohon',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {perusahaan}',
                'buttons'=>[
                    'view'=>function($url,$data){
                        $url = Url::to(['#data-pemohon/view','id'=>$data['id']]);
                        return Html::a('View', $url,[
                            'class'=>'btn btn-info'
                        ]);
                    },
                            'update'=>function($url,$data){
                        $url = Url::to(['#data-pemohon/update','id'=>$data['id']]);
                        return Html::a('Update', $url,[
                            'class'=>'btn btn-primary'
                        ]);
                            },
                                    'delete'=>function($url,$data){
                                $url = Url::to(['#data-pemohon','id'=>$data['id']]);
                                return Html::a('Delete', $url, [
                                    'class'=>'btn btn-danger',
                                    'data'=>[
                                        'confirm'=>'Yakin data ini mau di hapus?',
                                        'post'=>'post'
                                    ]
                                ]);
                                    },
                                            'perusahaan'=>function($url,$data){
                                            $url = Url::to(['/#data-perusahaan','id_pemohon'=>$data['id']]);
                                            if ($data['id_tipe_pemohon']=='2'){
                                                $html = Html::a('Data Perusahaan', $url, ['class'=>'btn btn-warning']);
                                            }else{
                                                $html='';
                                            }
                                            return $html;
                                            }
                ]],
        ],
    ]); ?>
        </div>
    </div>
    
    <?php Pjax::end(); ?>
</div>
