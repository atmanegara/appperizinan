<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DataPemohonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pemohons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-pemohon-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Data Pemohon', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_tipe_pemohon',
            'no_ktp',
            'no_npwp',
            'id_jns_bdn_usaha',
            //'nm_pemohon',
            //'nm_pmilik_bu',
            //'alamat_pemohon',
            //'id_desa',
            //'id_kec',
            //'email_pemohon:email',
            //'telp_pemohon',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
