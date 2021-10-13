<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EjafungFile */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'File Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-file-view">
        <div class="panel-body">

            <div class="pull-right">
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
            </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'id_file_jenis',
            'id_post',
            'position',
            'title',
            'description',
            'filename',
            'timestamp',
        ],
    ]) ?>
    </div>
</div>
</div>
