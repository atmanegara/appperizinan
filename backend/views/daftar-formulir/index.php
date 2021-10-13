<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DaftarFormulirSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Formulirs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daftar-formulir-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Upload Formulir Perizinan baru', ['#daftar-formulir/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nm_formulir',
            'file_formulir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
