<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPemohon */

$this->title = 'Update Data Pemohon: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-pemohon-update">


    <?= $this->render('_form', [
        'model' => $model,
         'getProv'=> $getProv,
                    'datkab' => $datkab,
                    'datkec' => $datkec,
                    'datdesa' => $datdesa
    ]) ?>

</div>
