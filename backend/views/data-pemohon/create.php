<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPemohon */

$this->title = 'Create Data Pemohon';
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-pemohon-create">

 

    <?= $this->render('_form', [
        'model' => $model,
        'getProv'=>$getProv,
          'datkab' => [],
                    'datkec' =>[],
                    'datdesa' =>[]
    ]) ?>

</div>
