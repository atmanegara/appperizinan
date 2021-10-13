<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EjafungContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contents';
$this->params['breadcrumbs'][] = $this->title;

$typex = Yii::$app->request->get('type');

?>
<div class="ejafung-content-index">
<div class="panel">
    <div class="panel-body">

        <div class="pull-right">
            <p>
                <?= Html::a('New Content', ['create', 'type' => $typex], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            /*[
                'attribute' => 'type',
                'label' => 'Type',
                'filter' => array('TAB'=>'TAB','ACCORDION'=>'ACCORDION','FOOTER'=>'FOOTER')
            ],*/
            'position',
            'title',
            // 'content:ntext',
            // 'id_user',
            // 'timestamp',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view'=>  function ($url,$model) {
                        $typex = Yii::$app->request->get('type');
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['view','id' => $model['id'], 'type' => $typex], []);
                    },
                    'update'=>  function ($url,$model) {
                        $typex = Yii::$app->request->get('type');
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update','id' => $model['id'], 'type' => $typex], []);
                    },
                    'delete'=>  function ($url,$model) {
                        $typex = Yii::$app->request->get('type');
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete','id' => $model['id'], 'type' => $typex], []);
                    },
                ]
            ],
        ],
    ]); ?>
    </div>
</div>
</div>
