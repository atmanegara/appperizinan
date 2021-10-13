<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJenisIzin */

$this->title = 'Update Ref Jenis Izin: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Jenis Izins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-jenis-izin-update">

   <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title">
                <?= Html::encode($this->title) ?>
            </label>
        </div>
        <div class="panel-body">
    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>
            
        </div>
    </div>

</div>
