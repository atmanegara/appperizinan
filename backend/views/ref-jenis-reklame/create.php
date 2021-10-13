<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJenisReklame */

$this->title = 'Create Ref Jenis Reklame';
$this->params['breadcrumbs'][] = ['label' => 'Ref Jenis Reklames', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-jenis-reklame-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
