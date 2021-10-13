<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JadwalPetugasLoket */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Petugas Lokets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jadwal-petugas-loket-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'id_data_petugas_loket',
            'id_ref_loket',
            'tgl_masuk',
            'jam_pagi',
            'jam_siang',
            'jam_sore',
            'id_ref_jenis_izin',
            'aktif',
        ],
    ]) ?>

</div>
