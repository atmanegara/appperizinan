<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPerusahaan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Perusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="data-perusahaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali', ['#data-perusahaan/index'], ['class' => 'btn btn-default']) ?>
       <?= Html::a('Update', ['#data-perusahaan/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['#data-perusahaan/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
              <?= Html::a('Data Legalitas Perusahaan', ['#legalitas-perusahaan/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
  
    </p>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                Data Perusahaan
            </h4>
        </div>
        <div class="panel-body">
                <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 //           'id',
            'no_npwp',
            'nm_perusahaan',
            'nm_gedung',
            'lantai',
            'alamat',
            'rt',
            'rw',
            'id_prov',
            'id_kab',
            'id_kec',
            'kodepos',
            'telp',
            'fax',
            'email:email',
            'lat',
            'long',
        ],
    ]) ?>
        </div>
    </div>


</div>
