<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PenetapanNomor */

$this->title = 'Create Penetapan Nomor';
$this->params['breadcrumbs'][] = ['label' => 'Penetapan Nomors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penetapan-nomor-create">

    <p>
        <?= Html::a('Kembali', ['#berita-acara/index'], [
            'class'=>'btn btn-default'
        ]) ?>
    </p>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <label class="panel-title">
                Form Penetapan Nomor SK
            </label>
        </div>
        <div class="panel-body">
    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>            
        </div>
    </div>
</div>
