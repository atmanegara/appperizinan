<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EjafungFileJenis */

$this->title = 'Update Jenis File: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jenis File', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ejafung-file-jenis-update">
<div class="panel">
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
</div>
