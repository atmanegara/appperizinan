<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\VerifikasiBapTim */

$this->title = 'Create Verifikasi Bap Tim';
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi Bap Tims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="verifikasi-bap-tim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
