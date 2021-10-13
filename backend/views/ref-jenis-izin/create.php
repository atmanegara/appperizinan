<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJenisIzin */

$this->title = 'Form Data Jenis Izin';
$this->params['breadcrumbs'][] = ['label' => 'Ref Jenis Izins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-jenis-izin-create">

  
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
