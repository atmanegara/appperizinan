<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailJenisIzin */

$this->title = 'Create Detail Jenis Izin';
$this->params['breadcrumbs'][] = ['label' => 'Detail Jenis Izins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-jenis-izin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>

</div>
