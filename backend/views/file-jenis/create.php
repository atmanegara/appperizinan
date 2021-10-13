<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FileJenis */

$this->title = 'Buat Jenis File';
$this->params['breadcrumbs'][] = ['label' => 'Jenis File', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-file-jenis-create">
<div class="panel">
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
</div>
