<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailJenisIzin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detail Jenis Izins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detail-jenis-izin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali', ['#detail-jenis-izin/index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Tambah baru', ['#detail-jenis-izin/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['#detail-jenis-izin/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['#detail-jenis-izin/delete', 'id' => $model->id], [
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
     //       'id',
        //    'id_jenis_izin',
        //    'id_jenis_permohonan',
            'nm_jenis_permohonan',
            'nm_jenis_izin',
            'no_urut',
            'nm_dok',
        ],
    ]) ?>

</div>
