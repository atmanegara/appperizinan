<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\RefJenisReklame;
use backend\models\RefMediaAlat;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\DataTarifReklame */
/* @var $form yii\widgets\ActiveForm */

$refJenisReklame = ArrayHelper::map(RefJenisReklame::find()->asArray()->all(), 'id', 'jenis_reklame');
$refMediaAlat = ArrayHelper::map(RefMediaAlat::find()->asArray()->all(), 'id', 'jenis_alat');
?>

<div class="data-tarif-reklame-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ref_reklame')->widget(Select2::class,[
        'data'=>$refJenisReklame,
        'options'=>[
            'placeholder'=>'Jenis reklame...',
        ],
        'pluginOptions'=>[
            'allowClear'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'model_alatmedia')->widget(Select2::class,[
        'data'=>$refMediaAlat,
        'options'=>[
            'placeholder'=>'Jenis alat/ media pergunakan ...',
              'multiple'=>true
          
        ],
        'pluginOptions'=>[
            'allowClear'=>true,
        ]
    ])?>

    <?= $form->field($model, 'waktu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarif')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
