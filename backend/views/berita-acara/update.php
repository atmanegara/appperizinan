<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BeritaAcara */

$this->title = 'Update Berita Acara: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Berita Acaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="berita-acara-update">

   <p>
        <?= Html::a('Kembali', ['#berita-acara/index'], [
            'class'=>'btn btn-default'
        ]) ?>
    </p>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title">
                Form Berita Acara
            </label>
        </div>
        <div class="panel-body">
    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>            
        </div>
    </div>


</div>
