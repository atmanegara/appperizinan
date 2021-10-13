<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use backend\models\BeritaLabel;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\Berita */
/* @var $form yii\widgets\ActiveForm */

$this->registerCss("

.select2-container 
.select2-selection--single 
.select2-selection__rendered {
    padding:3px 0;
}

");


$label = ArrayHelper::map(BeritaLabel::find()->asArray()->all(),'id','nama');
?>

<div class="ejafung-berita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_label')->textInput()->label('Parent Label')->widget(Select2::classname(), [ 
        'data' => $label,
        'options' => [
            'placeholder' => 'Parent Label'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->label(false)->hiddenInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [ 'preset' => 'full' ]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
