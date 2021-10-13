<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LegalitasPerusahaan */

$this->title = 'Update Legalitas Perusahaan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Legalitas Perusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="legalitas-perusahaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
