<?php
use yii\bootstrap\Html;
$no_registrasi = Yii::$app->request->get('no_registrasi');
?>
<div class="data-pemohon-index">
<div class="panel panel-inverse">
    <div class="panel-heading ui-sortable-handle">
        <h4 class="panel-title">  Form Bukti Pendaftaran </h4>
    </div>
    <div class="panel-body">
        <?= $this->renderAjax('cetak-bukti',[
             'no_registrasi' => $no_registrasi,
                            'dataPemohon' => $dataPemohon
        ]) ?>
    </div>
    <div class="panel-footer text-left">
        <?= Html::a('Cetak Bukti',['cetak-bukti','no_registrasi'=>$no_registrasi], [
            'class'=>"btn btn-primary",
            'target'=>'_blank'
        ]) ?>
    </div>
</div>    
</div>
