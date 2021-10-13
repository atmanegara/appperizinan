<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJenisIzin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Jenis Izins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-jenis-izin-view">

  
  
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title"> <?= Html::encode($model->nm_jenis_izin) ?>
</label>
        </div>
        <div class="panel-body">
              <p>
        <?= Html::a('Kembali', ['#ref-jenis-izin/index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Tambah', ['#ref-jenis-izin/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['#ref-jenis-izin/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['#ref-jenis-izin/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
       //     'id',
            'kd_jenis_izin:text:Kode Jenis Izin',
            'nm_jenis_izin:text:Nama Jenis Izin',
        ],
    ]) ?>            
        </div>
    </div>


</div>
