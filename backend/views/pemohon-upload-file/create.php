<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PemohonUploadFile */

$this->title = 'Create Pemohon Upload File';
$this->params['breadcrumbs'][] = ['label' => 'Pemohon Upload Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    .btn-file {
   overflow: visible; 
}
    </style>
<div class="pemohon-upload-file-create">

    <h1>No. Reg : <?= $no_registrasi?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProviderJenisPermohonan'=>$dataProviderJenisPermohonan,
        'no_registrasi'=>$no_registrasi
    ]) ?>

</div>
