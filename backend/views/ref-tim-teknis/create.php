<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RefTimTeknis */

$this->title = 'Create Ref Tim Teknis';
$this->params['breadcrumbs'][] = ['label' => 'Ref Tim Teknis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-tim-teknis-create">
   <p>
        <?= Html::a('Kembali', ['#ref-tim-teknis/index'],[
            'class'=>'btn btn-default'
        ]) ?>
    </p>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title">
                Form Tim Teknis
            </label>
        </div>
        <div class="panel-body">

    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>
            
        </div>
    </div>

</div>
