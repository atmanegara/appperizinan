<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TarifJnsTl */

$this->title = 'Update Tarif Jns Tl: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tarif Jns Tls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tarif-jns-tl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
