<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefBangunan */

$this->title = 'Create Ref Bangunan';
$this->params['breadcrumbs'][] = ['label' => 'Ref Bangunans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-bangunan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
