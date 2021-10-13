<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\RefJnsTl;

/* @var $this yii\web\View */
/* @var $model backend\models\TarifJnsTl */
/* @var $form yii\widgets\ActiveForm */

$ref_jns_tl = RefJnsTl::find()->where(['id'=>$model->id_ref_jns_tl])->one();
$items = yii\helpers\ArrayHelper::map(backend\models\RefLokJnsTl::find()->asArray()->all(),'id','nm_jns_lok_tl');
?>

<div class="tarif-jns-tl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ref_jns_tl')->textInput([
        'value'=>$ref_jns_tl['nm_jns_tl'],
        'disabled'=>true
    ]) ?>

    <?= $form->field($model, 'id_lok_jns_tl')->dropDownList($items,[
        'prompt'=>'Pilih Lokasi / Kawasan'
    ]) ?>
    <div class="row">
        <div class="col-md-6">
    <?= $form->field($model, 'awal_luas_t')->textInput() ?>
            
        </div>
        <div class="col-md-6">
    <?= $form->field($model, 'akhir_luas_t')->textInput() ?>
            
        </div>
    </div>


    <?= $form->field($model, 'tarif')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
