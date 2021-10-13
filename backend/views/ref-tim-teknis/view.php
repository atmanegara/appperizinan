<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RefTimTeknis */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Tim Teknis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-tim-teknis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
               <?= Html::a('Kembali', ['#ref-tim-teknis/index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Tambah baru', ['#ref-tim-teknis/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['#ref-tim-teknis/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['#ref-tim-teknis/delete', 'id' => $model->id], [
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
         //   'id',
            'nm_teknisi:text:Nama Teknisi',
            'tgl_terbentuk:text:Tanggal terbentuk',
            [
                'label'=>'Status',
                'value'=>function($model){
         $status_tim = $model['status_tim']=='Y' ? 'Aktif' : 'Non Aktif';
         return $status_tim;
                }
            ]
        ],
    ]) ?>

</div>
