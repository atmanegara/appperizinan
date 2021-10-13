<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EjafungBeritaLabel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Label Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-berita-label-view">
<div class="panel">
        <div class="panel-body">

            <div class="pull-right">
                <p>
                    <?= Html::a('Update', ['#berita-label/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['#berita-label/delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
            </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
      //      'id',
            'nama',
           [
                'label'=>'Status',
                'format'=>'raw',
                'value'=>function($data){
        return $data['active']==1 ? "<span class='label label-success'>Aktif</span>" : "<span class='label label-danger'>Non Aktif</span>";
                }
            ],
        ],
    ]) ?>
    </div>
</div>
</div>
