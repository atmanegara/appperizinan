<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJnsTl */

$this->title = 'Create Ref Jns Tl';
$this->params['breadcrumbs'][] = ['label' => 'Ref Jns Tls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-jns-tl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
