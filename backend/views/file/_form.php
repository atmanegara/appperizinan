<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Berita;
use backend\models\FileJenis;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\File */
/* @var $form yii\widgets\ActiveForm */

$this->registerCss("

.select2-container 
.select2-selection--single 
.select2-selection__rendered {
    padding:3px 0;
}

");


$id_file_jenis = ArrayHelper::map(FileJenis::find()->asArray()->all(),'id','nama');
$id_post = ArrayHelper::map(Berita::find()->asArray()->all(),'id','title');
?>

<div class="ejafung-file-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_file_jenis')->textInput()->label('Jenis File')->widget(Select2::classname(), [ 
        'data' => $id_file_jenis,
        'options' => [
            'placeholder' => 'Pilih Jenis File'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_post')->textInput()->label('Berita')->widget(Select2::classname(), [ 
        'data' => $id_post,
        'options' => [
            'placeholder' => 'Pilih Berita'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
