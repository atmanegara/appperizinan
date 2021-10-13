<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TarifJnsTlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tarif Jns Tls';
$this->params['breadcrumbs'][] = $this->title;
$id = Yii::$app->request->get('id');
?>
<div class="tarif-jns-tl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Kembali Ke Daftar', ['#ref-jns-tl/index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Create Tarif Jns Tl', ['#tarif-jns-tl/create','id_jns_tl'=>$id], ['class' => 'btn btn-success']) ?>
     </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
          //  'id_ref_jns_tl',
          //  'id_lok_jns_tl',
            [
                'header'=>'Jenis Lingkungan',
                'value'=>function($data){
                    $nm_jns_tl = backend\models\RefJnsTl::findOne($data['id_ref_jns_tl'])->nm_jns_tl;
                return $nm_jns_tl;
                    
                }
            ],
            [
                'header'=>'Kawasan',
                'value'=>function($data){
                    $nm_kawasan = backend\models\RefLokJnsTl::findOne($data['id_lok_jns_tl'])->nm_jns_lok_tl;
                return $nm_kawasan;
                    
                }
            ],
                    'awal_luas_t',
            'akhir_luas_t',
            //'tarif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
