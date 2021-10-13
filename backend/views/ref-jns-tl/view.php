<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RefJnsTl */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ref Jns Tls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ref-jns-tl-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Kembali ke Daftar', ['#ref-jns-tl/index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Update', ['#ref-jns-tl/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['#ref-jns-tl/delete', 'id' => $model->id], [
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
            'id',
            'nm_jns_tl',
        ],
    ]) ?>

</div>
