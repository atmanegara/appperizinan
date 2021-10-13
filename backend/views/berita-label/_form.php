<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\BeritaLabel;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\BeritaLabel */
/* @var $form yii\widgets\ActiveForm */

$this->registerCss("

.select2-container 
.select2-selection--single 
.select2-selection__rendered {
    padding:3px 0;
}

");


$label = ArrayHelper::map(BeritaLabel::find()->asArray()->all(),'id','nama');

if (count($label) > 0) 
{
	$label = array_merge(array('0' => 'None'), $label);
}
else
{
	$label = array('0' => 'None');
}
?>

<div class="ejafung-berita-label-form">

    <?php $form = ActiveForm::begin(); ?>

  

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropdownList(['1' => 'Aktif', '0' => 'Tidak Aktif'], ['prompt'=>'Pilih Aktif atau Tidak']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
