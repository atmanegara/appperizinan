<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LegalitasPerusahaan */

$this->params['breadcrumbs'][] = ['label' => 'Legalitas Perusahaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="legalitas-perusahaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Daftar Perusahaan', ['#data-perusahaan/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="panel panel-success">
        <div class="panel-heading">
            Informasi
        </div>
        <div class="panel-body">
            sdasdsa
        </div>
    </div>
</div>
