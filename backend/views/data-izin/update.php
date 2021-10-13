<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataIzin */

$this->title = 'Update Data Izin: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Izins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-izin-update">
  <p>
        <?= Html::a('Kembali', ['#berita-acara/index'], [
            'class'=>'btn btn-default'
        ]) ?>
    </p>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title">
                Form Surat Izin
            </label>
        </div>
        <div class="panel-body">
    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>            
        </div>
    </div>

</div>
