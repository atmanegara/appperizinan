<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EjafungFile */

$this->title = 'Buat File Berita';
$this->params['breadcrumbs'][] = ['label' => 'File Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-file-create">
<div class="panel">
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
</div>
