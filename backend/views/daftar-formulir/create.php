<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DaftarFormulir */

$this->title = 'Create Daftar Formulir';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Formulirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daftar-formulir-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>

</div>
