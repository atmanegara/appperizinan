<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefTandaTangan */

$this->title = 'Update Ref Tanda Tangan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Tanda Tangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ref-tanda-tangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
