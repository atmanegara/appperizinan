<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RefTandaTanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ref Tanda Tangans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-tanda-tangan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ref Tanda Tangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nip',
            'nm_pejabat',
            'jabatan',
            'status_ttd',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
