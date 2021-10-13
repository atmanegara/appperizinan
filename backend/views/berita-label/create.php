<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EjafungBeritaLabel */

$this->title = 'Buat Label Berita';
$this->params['breadcrumbs'][] = ['label' => 'Label Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-berita-label-create">
<div class="panel">
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
</div>
