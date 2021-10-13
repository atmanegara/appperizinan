<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataPerusahaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Perusahaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-perusahaan-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Data Perusahaan', ['#data-perusahaan/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Data Perusahaan
        </div>
        <div class="panel-body">
                <?= GridView::widget([
        'dataProvider' => $dataProvider,
    //    'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'id',
            'no_npwp',
            'nm_perusahaan',
            'nm_gedung',
            'lantai',
            //'alamat',
            //'rt',
            //'rw',
            //'id_prov',
            //'id_kab',
            //'id_kec',
            //'kodepos',
            //'telp',
            //'fax',
            //'email:email',
            //'lat',
            //'long',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {updateperusahaan} {updatelegalitas} {delete}',
                'buttons'=>[
                    'view'=>function($url,$data){
                              $url = yii\helpers\Url::to(['#data-perusahaan/view','id'=>$data['id']]);
                      return \yii\bootstrap\Html::a('View', $url,[
                        'class'=>'btn btn-info'
                    ]);
                    },
                            'updateperusahaan'=>function($url,$data){
                                $url = yii\helpers\Url::to(['#data-perusahaan/update','id'=>$data['id']]);
                            
                        return \yii\bootstrap\Html::a('Update Data Perusahaan', $url,[
                            'class'=>'btn btn-warning'
                        ]);
                        
                            },
                                    'updatelegalitas'=>function($url,$data){
                                $url = yii\helpers\Url::to(['#legalitas-perusahaan/update','id_data_perusahaan'=>$data['id']]);
                                $exts = backend\models\LegalitasPerusahaan::find()->where(['id_data_perusahaan'=>$data['id']])->exists();
                                if($exts==0){
                                $url = yii\helpers\Url::to(['#legalitas-perusahaan/create','id'=>$data['id']]);
                                $label = "Tambah";
                                }else{
                                     $url = yii\helpers\Url::to(['#legalitas-perusahaan/update','id_data_perusahaan'=>$data['id']]);
                                     $label = "Update";
                               }
                                return \yii\bootstrap\Html::a("$label Legalitas Perusahaan", $url, ['class'=>'btn btn-default']);
                                    },
                                            'delete'=>function($url,$data){
                                        $url = yii\helpers\Url::to(['#data-perusahaan/delete','id'=>$data['id']]);
                                        return Html::a('Delete', $url,['class'=>'btn btn-danger',
                                            'data'=>[
                                                'method'=>'post',
                                                'confirm'=>'Apakah Anda Yakin Hapus data ini?'
                                            ]
                                            ]);
                                            }
                ]],
        ],
    ]); ?>
        </div>
    </div>

</div>
