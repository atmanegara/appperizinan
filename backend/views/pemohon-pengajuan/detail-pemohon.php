<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PemohonPengajuan */


\yii\web\YiiAsset::register($this);
?>
<div class="pemohon-pengajuan-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         'no_ktp','no_npwp','nm_perusahaan','alamat'
        ],
    ]) ?>

</div>
