<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\PenetapanNomor;
use backend\models\RefTandaTangan;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\DataIzin */
/* @var $form yii\widgets\ActiveForm */
$items = yii\helpers\ArrayHelper::map(RefTandaTangan::find()->asArray()->where(['status_ttd' => "Y"])->all(), 'id',
                function ($model, $attribute) {
            return $model['nip'] . ' - ' . $model['nm_pejabat'];
        }
);
$datapenetapannomor = \yii\helpers\ArrayHelper::map(PenetapanNomor::find()->asArray()->all(), 'no_sk',
                function($model, $attribute) {
            return $model['no_sk'] . ' - ' . $model['tgl_sk'];
        }
        )
?>

<div class="data-izin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'id_penetapan_nomor')->label('No SK Penetapan')->widget(Select2::class, [
        'value' => $model->id_penetapan_nomor,
        'options' => [
            'placeholder' => '--No SK Penetapan--'
        ],
        'pluginOptions' => [
            'autoClose' => true,
            'autoClear' => true,
        ]
    ])
    ?>

    <?= $form->field($model, 'tgl_surat')->widget(kartik\date\DatePicker::class,
            [
                'language'=>'id',
                'options'=>[
                    'placeholder'=>'Pilih tanggal Surat'
                ],
                'pluginOptions'=>[
                    'todayHighlight' => true,
                                'format'=>'yyyy-mm-dd',
                    'autoclose'=>true,
                ]
            ]) ?>

    <?= $form->field($model, 'isi_surat')->widget(CKEditor::class,[
         'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <?= $form->field($model, 'imageFile')->label('Upload File Surat Izin')->widget(FileInput::class,[
        'options'=>['accept'=>'pdf,docx,doc'],
    ]) ?>

    <?=
    $form->field($model, 'id_ref_ttd')->dropDownList($items, [
        'prompt' => '-- Pilih Pejabat Yang bertanda tangan --'
    ])
    ?>

    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
