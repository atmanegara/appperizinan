<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefBangunan */

$this->title = 'Update Ref Bangunan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Bangunans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-bangunan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
