<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPerusahaan */
/* @var $form yii\widgets\ActiveForm */

$dataProv = yii\helpers\ArrayHelper::map($datprov, 'id', 'nama');
$dataKab = yii\helpers\ArrayHelper::map($datkab, 'id', 'nama');
$dataKec = yii\helpers\ArrayHelper::map($datkec, 'id', 'nama');
$dataDesa = yii\helpers\ArrayHelper::map($datdesa, 'id', 'nama');
$itemJenisBadanUsaha = \yii\helpers\ArrayHelper::map(backend\models\RefJenisBdnUsaha::find()->asArray()->all(), 'id', 'nm_jns_bdn_usaha');
?>

<div class="data-perusahaan-form">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Data Perusahaan</h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row form-group m-b-10">
                <div class="col-md-6">
                    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'long')->textInput(['maxlength' => true]) ?>

                </div>
            </div>
            <div class="row form-group m-b-10">
                <div class="col-md-6">
                    <?= $form->field($model, 'id_ref_jenis_bdn_usaha')->dropDownList($itemJenisBadanUsaha,['prompt'=>'Pilih jenis badan usaha....']) ?>
                   <?= $form->field($model, 'no_npwp')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'nm_perusahaan')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row form-group m-b-10">
                <div class="col-md-6">
                    <?= $form->field($model, 'nm_gedung')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'lantai')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row form-group m-b-30">
                <div class="col-md-6">
                    <?= $form->field($model, 'alamat')->textarea(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row form-group m-b-30">
                <div class="col-md-6">
                    <?=
                    $form->field($model, 'id_prov')->label('Provinsi')->widget(Select2::class, [
                        'data' => $dataProv,
                        'options' => [
                            'placeholder' => 'Pilih Provinsi ...',
                            'onChange' => 'getKab(this.value)',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ]
                    ])
                    ?>

                </div>
                <div class="col-md-6">
                    <?=
                    $form->field($model, 'id_kab')->label('Kabupaten')->widget(Select2::class, [
                        'data' => $dataKab,
                        'options' => [
                            'id' => 'id_kabkot',
                            'placeholder' => 'Pilih Kabupaten ...',
                            'onChange' => 'getKec(this.value)'
                        ]
                    ])
                    ?>
                </div>
            </div>
            <div class="row form-group m-b-30">
                <div class="col-md-6">
                    <?=
                    $form->field($model, 'id_kec')->label('Kecamatan')->widget(Select2::class, [
                        'data' => $dataKec,
                        'options' => [
                            'id' => 'id_kec',
                            'placeholder' => 'Pilih Kecamatan ...',
                        //     'onChange' => 'getDesa(this.value)'
                        ]
                    ])
                    ?>

                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'kodepos')->textInput(['maxlength' => true]) ?>

                </div>
            </div>


            <div class="row form-group m-b-30">
                <div class="col-md-6">
                    <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>

                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>


</div>
<script>

    function getKab(id_prov) {
        var wilayah = 'kabupaten';
        var posting = $.post("<?= \yii\helpers\Url::to(['get-data-wilayah']) ?>", {
            wilayah: wilayah,
            id_parent: id_prov
        });
        posting.done(function () {
            console.log('done')
        })
        posting.always(function (oHtml) {
            $("#id_kabkot").html(oHtml);
        })
    }
    function getKec(id_kab) {
        var wilayah = 'kecamatan';
        var posting = $.post("<?= \yii\helpers\Url::to(['get-data-wilayah']) ?>", {
            wilayah: wilayah,
            id_parent: id_kab
        });
        posting.done(function () {
            console.log('done')
        })
        posting.always(function (oHtml) {
            $("#id_kec").html(oHtml);
        })
    }
</script>