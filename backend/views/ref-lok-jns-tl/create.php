<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefLokJnsTl */

$this->title = 'Create Ref Lok Jns Tl';
$this->params['breadcrumbs'][] = ['label' => 'Ref Lok Jns Tls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-lok-jns-tl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
