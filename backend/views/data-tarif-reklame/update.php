<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataTarifReklame */

$this->title = 'Update Data Tarif Reklame: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Tarif Reklames', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-tarif-reklame-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
