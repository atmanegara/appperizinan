<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataTarifReklame */

$this->title = 'Create Data Tarif Reklame';
$this->params['breadcrumbs'][] = ['label' => 'Data Tarif Reklames', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-tarif-reklame-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
