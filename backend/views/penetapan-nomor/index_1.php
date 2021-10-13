<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PenetapanNomorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penetapan Nomors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penetapan-nomor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Penetapan Nomor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_pemohon_pengajuan',
            'no_sk',
            'tgl_sk',
            'tgl_tempo_sk',
            //'id_tanda_tangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
