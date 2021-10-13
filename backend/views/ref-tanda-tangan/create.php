<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefTandaTangan */

$this->title = 'Create Ref Tanda Tangan';
$this->params['breadcrumbs'][] = ['label' => 'Ref Tanda Tangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-tanda-tangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
