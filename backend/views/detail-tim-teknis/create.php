<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailTimTeknis */

$this->title = 'Create Detail Tim Teknis';
$this->params['breadcrumbs'][] = ['label' => 'Detail Tim Teknis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-tim-teknis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>

</div>
