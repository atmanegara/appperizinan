<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataBiayaSewaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Biaya Sewas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-biaya-sewa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Data Biaya Sewa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_bangunan',
            'biaya',
            'lama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
