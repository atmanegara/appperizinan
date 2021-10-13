<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JadwalPeninjauan */

$this->title = 'Create Jadwal Peninjauan';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Peninjauans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-peninjauan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
