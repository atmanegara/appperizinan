<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\VerifikasiBapTim */

$this->title = 'Update Verifikasi Bap Tim: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi Bap Tims', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="verifikasi-bap-tim-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
