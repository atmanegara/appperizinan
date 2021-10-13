<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefIndeksLok */

$this->title = 'Create Ref Indeks Lok';
$this->params['breadcrumbs'][] = ['label' => 'Ref Indeks Loks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-indeks-lok-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
