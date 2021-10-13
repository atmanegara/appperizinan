<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PemohonPengajuan */

$this->title = 'Update Pemohon Pengajuan, No. Reg: ' . $model->no_registrasi;
$this->params['breadcrumbs'][] = ['label' => 'Pemohon Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_registrasi, 'url' => ['view', 'id' => $model->no_registrasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemohon-pengajuan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
