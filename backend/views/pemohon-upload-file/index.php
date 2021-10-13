<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PemohonUploadFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemohon Upload Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemohon-upload-file-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pemohon Upload File', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tahun',
            'no_registrasi',
            'id_jenis_izin',
            'id_jenis_permohonan',
            //'data_file_upload:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
