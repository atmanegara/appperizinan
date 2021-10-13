<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model backend\models\BeritaAcara */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Berita Acaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="berita-acara-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'no_berita',
            'tgl_berita',
          [        
              'format'=>'html',
              'attribute'=>'isi_berita',
             'header'=>'Isi Berita',
              'value'=>function($data){
                return $data['isi_berita'];
              }
          ],
        ],
    ]) ?>

</div>
