<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataTarifReklameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Tarif Reklames';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-tarif-reklame-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Data Tarif Reklame', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_ref_reklame',
            'alat_media:ntext',
            'waktu',
            'tarif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
