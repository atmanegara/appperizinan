<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJenisBdnUsaha */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Jenis Bdn Usahas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-jenis-bdn-usaha-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
           <?= Html::a('Kembali', ['#ref-jenis-bdn-usaha/index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Tambah baru', ['#ref-jenis-bdn-usaha/create'], ['class' => 'btn btn-success']) ?>
     <?= Html::a('Update', ['#ref-jenis-bdn-usaha/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['#ref-jenis-bdn-usaha/delete', 'id' => $model->id], [
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
            'nm_jns_bdn_usaha',
        ],
    ]) ?>

</div>
