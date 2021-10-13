<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JadwalPeninjauanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal Peninjauans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-peninjauan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jadwal Peninjauan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_pemohon_pengajuan',
            'id_tim_teknis',
            'tgl_peninjauan',
            'ket',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
