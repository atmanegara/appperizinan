<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\dialog\Dialog;
/* @var $this yii\web\View */
/* @var $model backend\models\IzinHo */

$this->title = false;
$this->params['breadcrumbs'][] = ['label' => 'Izin Hos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="izin-ho-view">

   <p>
        <?= Html::a('Update', ['#izin-ho/update', 'id' => $model['id']], ['class' => 'btn btn-primary']) ?>
        
        <?php
        echo Dialog::widget([
    'overrideYiiConfirm' => true,
    'options'=>[
            'type'=> Dialog::TYPE_DANGER,
        'title'=>'Konfirmasi'
    ]]);
        echo Html::a('Delete', ['#izin-ho/delete', 'id' => $model['id']], [
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
            'no_registrasi',
      'nm_pemohon',
            'nm_jns_tl:text:jenis Lingkungan',
            'nm_jns_lok_tl:text:Lokasi Lingkungan',
            'luas_tinggi:text:Luas Tinggi',
        'nm_jns_index:text:Kawasan',
            'tarif_retribusi:decimal:Tarif',
        ],
    ]) ?>

</div>
