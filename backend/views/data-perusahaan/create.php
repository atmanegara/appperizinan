<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPerusahaan */

$this->title = 'Create Data Perusahaan';
$this->params['breadcrumbs'][] = ['label' => 'Data Perusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-perusahaan-create">


    <?= $this->render('_form', [
        'model' => $model,
        'modelLegalitasPerusahaan'=>$modelLegalitasPerusahaan,
        'datprov'=>$datprov,
              'datkab' => [],
                    'datkec' =>[],
                    'datdesa' =>[]
    ]) ?>

</div>
