<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinHo */

$this->title = 'Update Izin Ho: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Izin Hos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="izin-ho-update">


    <div class="panel panel-success">
        <div class="panel-heading">
            Form Pengisian Tarif
        </div>
        <div class="panel-body">
              <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
 
        </div>
    </div>

</div>
