<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EjafungContent */

$typex = Yii::$app->request->get('type');

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Contents', 'url' => ['index', 'type' => $typex]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ejafung-content-view">
<div class="panel">
        <div class="panel-body">

            <div class="pull-right">
                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id, 'type' => $typex], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id, 'type' => $typex], [
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
            'type',
            'position',
            'title',
            //'content:ntext',
            //'id_user',
            //'timestamp',
        ],
    ]) ?>

</div>
</div>

</div>
