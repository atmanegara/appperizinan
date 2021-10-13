<?php

use yii\widgets\DetailView;
?>

<?=
DetailView::widget([
    'model' => $model,
    'attributes' => [
        'no_registrasi:text:No.Reg',
        'no_ktp',
        'no_npwp',
        'nm_pemohon',
        'nm_jenis_izin',
        'nm_jenis_permohonan'
    ]
])
?>
