<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EjafungContent */

$typex = Yii::$app->request->get('type');

$this->title = 'Update Content: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index', 'type' => $typex]];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id, 'type' => $typex]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ejafung-content-update">
<div class="panel">
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
</div>
