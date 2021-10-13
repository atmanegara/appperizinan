<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TarifJnsTl */

$this->title = 'Create Tarif Jns Tl';
$this->params['breadcrumbs'][] = ['label' => 'Tarif Jns Tls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarif-jns-tl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
