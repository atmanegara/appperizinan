<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataBiayaSewa */

$this->title = 'Update Data Biaya Sewa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Biaya Sewas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-biaya-sewa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
