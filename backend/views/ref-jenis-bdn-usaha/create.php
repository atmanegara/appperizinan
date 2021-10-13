<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJenisBdnUsaha */

$this->title = 'Create Ref Jenis Bdn Usaha';
$this->params['breadcrumbs'][] = ['label' => 'Ref Jenis Bdn Usahas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-jenis-bdn-usaha-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
