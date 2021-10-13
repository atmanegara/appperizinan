<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PenetapanNomor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penetapan Nomors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="penetapan-nomor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Daftar No SK', ['#penetapan-nomor/index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update', ['#penetapan-nomor/update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Delete', ['#penetapan-nomor/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-md-6">
 <?= DetailView::widget([
        'model' => $modelDataPemohon,
        'attributes' => [
    'no_ktp',
            'nm_pemohon','alamat_pemohon'
        ],
    ]) ?>
            
        </div>
        <div class="col-md-6">
 <?php
 if($modelDataPerusahaan->exists()>0){
echo DetailView::widget([
        'model' => $modelDataPerusahaan,
        'attributes' => [
    'no_npwp',
            'nm_perusahaan',[
                'label'=>'Alamat',
                'value'=>function($model){
     return $model['alamat'].' RT. '.$model['rt'].' RW. '.$model['rw'];
                }
            ],'telp'
        ],
 ]);
                    
                } ?>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
      //      'id',
          //  'id_pemohon_pengajuan',
            'no_sk',
            'tgl_sk',
            'tgl_tempo_sk',
        //    'id_tanda_tangan',
        ],
    ]) ?>
            
        </div>
    </div>

</div>
