<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\FileJenis;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'File Berita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-file-index">
<div class="panel">
    <div class="panel-body">

        <div class="pull-right">
            <p>
                <?= Html::a('New File Berita', ['create'], ['class' => 'btn btn-success', 'disabled' => 'disable', 'onclick' => 'return false']) ?>
            </p>
        </div>
    <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items}',

                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'filename',
                        'label' => 'Thumbnail',
                        'format' => 'raw',
                        'value' => function ($model) {

                            $ext = pathinfo($model->filename, PATHINFO_EXTENSION);

                            $gambar = array('jpg', 'png', 'jpeg');

                            if (in_array($ext, $gambar))
                            {
                                return Html::img('@web/upload/' . $model->filename , ['class' => 'pull-left img-responsive', 'height'=>'100px', 'width'=>'100px', 'alt' => $model->filename]);
                            }
                            else
                            {
                                return 'File ' . strtoupper($ext);
                            }
                        },
                    ],

                    [
                        'attribute' => 'id_file_jenis',
                        'label' => 'Jenis File',
                        'value' => function ($model) {
                            return FileJenis::name($model->id_file_jenis);
                        },
                    ],
                    'title',
                    
                    'timestamp',

                    [
                        'header' => 'Action',
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{action} | {view}',
                        'buttons' => [
                            'action' => function($url, $model, $key) {
                                $idpost = Yii::$app->request->get('idpost');
                                return Html::a('Delete', ['upload/delete', 'id_post' => $idpost, 'id_file_jenis' => $model->id_file_jenis]);
                            },
                            'view' => function($url, $model, $key) {

                                $ext = pathinfo($model->filename, PATHINFO_EXTENSION);

                                $gambar = array('jpg', 'png', 'jpeg');
                                
                                return Html::a(in_array($ext, $gambar) == true ? 'View' : 'Download', ['/upload/' . $model->filename], ['target' => '_blank']);
                            }
                        ]
                    ]
                ],
            ]); ?>
</div>
</div>
</div>