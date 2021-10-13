<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PemohonPengajuan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pemohon Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pemohon-pengajuan-view">

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
            'no_registrasi',
            'id_user',
            'id_data_pemohon',
            'id_jenis_izin',
            'id_jenis_permohonan',
            'id_jenis_bdn_usaha',
            'status_pengajuan',
            'status_verifikasi',
            'status_selesai',
            'tgl_pengajuan',
            'tgl_verifikasi',
            'tgl_selesai',
            'status_kunci',
        ],
    ]) ?>

</div>
