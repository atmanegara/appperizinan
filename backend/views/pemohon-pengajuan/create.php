<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PemohonPengajuan */

$this->title = 'Create Pemohon Pengajuan';
$this->params['breadcrumbs'][] = ['label' => 'Pemohon Pengajuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemohon-pengajuan-create">


    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>

</div>
