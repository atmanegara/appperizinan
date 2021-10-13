<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PemohonSewa */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pemohon Sewas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pemohon-sewa-view">

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
            'no_reg_sewa',
            'id_data_pemohon',
            'id_bangunan',
            'biaya_sewa',
            'hari',
            'tgl_sewa',
            'jam_awal',
            'jam_akhir',
            'kegunaan:ntext',
            'nm_pnggung_jwb',
            'telp',
        ],
    ]) ?>

</div>
