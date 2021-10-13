<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\DataPemohon */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="data-pemohon-view">

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
            'id_tipe_pemohon',
            'no_ktp',
            'no_npwp',
            'id_jns_bdn_usaha',
            'nm_pemohon',
            'nm_pmilik_bu',
            'alamat_pemohon',
            'id_desa',
            'id_kec',
            'email_pemohon:email',
            'telp_pemohon',
        ],
    ]) ?>

</div>
