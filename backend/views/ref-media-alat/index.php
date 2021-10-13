<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefMediaAlatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Media Alats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-media-alat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ref Media Alat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jenis_alat',
            'aktf',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
