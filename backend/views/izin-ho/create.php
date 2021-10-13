<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinHo */

$this->title = 'Create Izin Ho';
$this->params['breadcrumbs'][] = ['label' => 'Izin Hos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-ho-create">

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
