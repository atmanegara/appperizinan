<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailJenisIzin */


$this->params['breadcrumbs'][] = ['label' => 'Detail Jenis Izins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detail-jenis-izin-view">

    <h1><?= Html::encode($this->title) ?></h1>

  

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                 'no_registrasi',
            'keterangan',
          
        ],
    ]) ?>

</div>
