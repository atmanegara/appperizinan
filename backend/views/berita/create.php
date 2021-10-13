<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Berita */

$this->title = 'Buat Berita Baru';
$this->params['breadcrumbs'][] = ['label' => 'Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-berita-create">
<div class="panel">
        <div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>

</div>
