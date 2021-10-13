<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefIndeksLok */

$this->title = 'Update Ref Indeks Lok: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Indeks Loks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-indeks-lok-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
