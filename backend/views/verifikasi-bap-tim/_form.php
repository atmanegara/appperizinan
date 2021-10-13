<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VerifikasiBapTim */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="verifikasi-bap-tim-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pemohon_pengajuan')->textInput() ?>

    <?= $form->field($model, 'id_berita_acara')->textInput() ?>

    <?= $form->field($model, 'status_verifikasi')->textInput() ?>

    <?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
