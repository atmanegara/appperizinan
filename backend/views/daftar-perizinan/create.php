<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPemohon */

$this->title = 'Create Data Pemohon';
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-pemohon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
