<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Berita */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Berita', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-berita-view">   
<div class="panel">
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
            'id',
            // 'id_label',
            'title',
            'description',
            // 'content:ntext',
            'slug',
            // 'id_user',
            'date',
            // 'timestamp',
        ],
    ]) ?>
</div>
</div>

</div>
