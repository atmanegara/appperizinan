<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LegalitasPerusahaan */

$this->title = 'Create Legalitas Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Legalitas Perusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="legalitas-perusahaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
