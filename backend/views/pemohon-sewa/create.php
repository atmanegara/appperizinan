<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PemohonSewa */

$this->title = 'Create Pemohon Sewa';
$this->params['breadcrumbs'][] = ['label' => 'Pemohon Sewas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemohon-sewa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>

</div>
