<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JadwalPetugasLoket */

$this->title = 'Create Jadwal Petugas Loket';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Petugas Lokets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-petugas-loket-create">

    <div class="panel panel-primary">
        <div class="panel-heading">
            Form jadwal petugas
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>            
        </div>
    </div>


</div>
