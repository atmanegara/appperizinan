<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EjafungFile */

$this->title = 'Update File Berita: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'File Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ejafung-file-update">
<div class="panel">
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
</div>
