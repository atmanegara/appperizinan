<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\models\PemohonPengajuan */

$this->title = $model['no_registrasi'];
$this->params['breadcrumbs'][] = ['label' => 'Pemohon Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pemohon-pengajuan-view">

    <h1><?= 'No. Reg : '. Html::encode($this->title) ?></h1>

  

   <?=
DetailView::widget([
    'model'=>$model,
    'attributes'=>[
        'nmjenis:text:Tipe Pemohon',
        'no_ktp',
        'no_npwp',
        'nm_pemohon',
        'nm_jenis_izin',
        'nm_jenis_permohonan'
    ]
])
?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Berkas Yang di lengkapi
        </div>
        <div class="panel-body">
              <p>
        <?= Html::a('Upload Berkas', ['/#pemohon-upload-file/create', 'no_registrasi' =>$model['no_registrasi']], ['class' => 'btn btn-success']) ?>
     
    </p>
            <?= 
GridView::widget([
    'dataProvider'=>$dataProvider,
    'columns'=>[
        [
            'class'=> 'kartik\grid\SerialColumn'
        ],
        'nm_dok',
      
    ]
])
        ?>
        </div>
    </div>

</div>
