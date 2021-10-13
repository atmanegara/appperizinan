<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJenisPermohonan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Jenis Permohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-jenis-permohonan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali', ['#ref-jenis-permohonan/index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Tambah', ['#ref-jenis-permohonan/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Update', ['#ref-jenis-permohonan/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['#ref-jenis-permohonan/delete', 'id' => $model->id], [
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
    //        'id',
            'nm_jenis_permohonan',
        ],
    ]) ?>

</div>
