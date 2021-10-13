<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use frontend\models\RefTipePemohon;
use backend\models\RefJenisBdnUsaha;

/* @var $this yii\web\View */
/* @var $model backend\models\DataPemohon */
/* @var $form yii\widgets\ActiveForm */



$dataProv = yii\helpers\ArrayHelper::map($getProv, 'id', 'nama');
$dataKab = yii\helpers\ArrayHelper::map($datkab, 'id', 'nama');
$dataKec = yii\helpers\ArrayHelper::map($datkec, 'id', 'nama');
$dataDesa = yii\helpers\ArrayHelper::map($datdesa, 'id', 'nama');
?>

<div class="data-pemohon-form">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title"> Form Data Pemohon</h4> 
        </div>
        <div class="panel-body">
             <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'id_tipe_pemohon')->widget(Select2::class, [
        'data' => RefTipePemohon::getDataTipePemohon(),
        'options' => [
            'placeholder' => 'Pilih Tipe Pemohon ...'
        ]
    ])
    ?>

    <?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_npwp')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'id_jns_bdn_usaha')->widget(Select2::class, [
        'data' => RefJenisBdnUsaha::getDataJenisBdnUsaha(),
        'options' => [
            'placeholder' => 'Pilih Jenis badan usaha ...'
        ]
    ])
    ?>

    <?= $form->field($model, 'nm_pemohon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_pmilik_bu')->textInput(['maxlength' => true]) ?>

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
    <?=
    $form->field($model, 'id_kabkot')->label('Kabupaten')->widget(Select2::class, [
        'data' => $dataKab,
        'options' => [
            'id' => 'id_kabkot',
            'placeholder' => 'Pilih Kabupaten ...',
            'onChange' => 'getKec(this.value)'
        ]
    ])
    ?>
    <?=
    $form->field($model, 'id_kec')->label('Kecamatan')->widget(Select2::class, [
        'data' => $dataKec,
        'options' => [
            'id' => 'id_kec',
            'placeholder' => 'Pilih Kecamatan ...',
            'onChange' => 'getDesa(this.value)'
        ]
    ])
    ?>
    <?=
    $form->field($model, 'id_desa')->label('Desa')->widget(Select2::class, [
        'data' => $dataDesa,
        'options' => [
            'id' => 'id_desa',
            'placeholder' => 'Pilih Desa ...'
        ]
    ])
    ?>         

    <?= $form->field($model, 'alamat_pemohon')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'email_pemohon')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'telp_pemohon')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
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
    function getDesa(id_kec) {
        var wilayah = 'desa';
        var posting = $.post("<?= \yii\helpers\Url::to(['get-data-wilayah']) ?>", {
            wilayah: wilayah,
            id_parent: id_kec
        });
        posting.done(function () {
            console.log('done')
        })
        posting.always(function (oHtml) {
            $("#id_desa").html(oHtml);
        })
    }
</script>