<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefLoket */

$this->title = 'Create Ref Loket';
$this->params['breadcrumbs'][] = ['label' => 'Ref Lokets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-loket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
