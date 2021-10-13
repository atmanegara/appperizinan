<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPetugasLoket */

$this->title = 'Create Data Petugas Loket';
$this->params['breadcrumbs'][] = ['label' => 'Data Petugas Lokets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-petugas-loket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>

</div>
