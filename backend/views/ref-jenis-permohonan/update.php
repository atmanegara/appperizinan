<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJenisPermohonan */

$this->title = 'Update Ref Jenis Permohonan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Jenis Permohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-jenis-permohonan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
