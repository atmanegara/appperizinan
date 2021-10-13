<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EjafungBeritaLabel */

$this->title = 'Update Label Berita: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Label Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ejafung-berita-label-update">
<div class="panel">
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
</div>
