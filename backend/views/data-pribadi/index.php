<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataPribadiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pribadis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-pribadi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Data Pribadi', ['#data-pribadi/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nik',
            'nama',
            'tmp_lahir',
            'tgl_lahir',
            //'jkel',
            //'id_agama',
            //'alamat',
            //'rt',
            //'rw',
            //'id_prov',
            //'id_kab',
            //'id_kec',
            //'id_kel',
            //'kodepos',
            //'telp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
