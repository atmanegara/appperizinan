<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataBiayaSewa */

$this->title = 'Create Data Biaya Sewa';
$this->params['breadcrumbs'][] = ['label' => 'Data Biaya Sewas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-biaya-sewa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
