<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EjafungContent */

$typex = Yii::$app->request->get('type');

$this->title = 'Create Content';
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index', 'type' => $typex]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-content-create">
<div class="panel">
        <div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>

</div>
