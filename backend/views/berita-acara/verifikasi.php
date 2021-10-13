<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\ckeditor\CKEditor;
use kartik\dialog\Dialog;

/* @var $this yii\web\View */
/* @var $model backend\models\BeritaAcara */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Berita Acaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$pemohonPengajuan = \backend\models\PemohonPengajuan::find()->where(['id' => $model->id_pemohon_pengajuan])->one();
?>
<div class="berita-acara-view">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1><?= 'No. Reg ' . $pemohonPengajuan['no_registrasi'] ?></h1>

        </div>
        <div class="panel-body">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
//            'id',
                    'no_berita:text:No.Berita',
                    'tgl_berita:text:Tgl Terbit BAP',
                    [
                        'format' => 'html',
                        'attribute' => 'isi_berita',
                        'header' => 'Isi Berita',
                        'value' => function($data) {
                            return $data['isi_berita'];
                        }
                    ],
                    [
                        'label' => 'File Berita Acara',
                        'format' => 'raw',
                        'value' => function($data) {
                            $url = './uploads/' . $data['file_berita'];
                            if (!file_exists($url)) {
                                $url = '';
                            }
                            return Html::a('File Dok BAP', $url);
                        }
                    ]
                ],
            ])
            ?>

            <div class="row">
                <div class="col-md-3">
                    <p>
                        <?= Html::hiddenInput('berita_acara', $model['id'], ['id' => 'id_berita_acara']) ?>
                        <?= Html::hiddenInput('id_pemohon_pengajuan', $model['id_pemohon_pengajuan'], ['id' => 'id_pemohon_pengajuan']) ?>
                        <?=
                        yii\bootstrap4\Html::dropDownList('status_bap', null, [
                            '1' => 'Diterima',
                            '2' => 'Ditolak'
                                ], [
                            'required' => true,
                            'prompt' => 'Pilih Verifikasi..',
                            'id' => 'status_verifikasi',
                            'class' => 'form-control'
                        ]);
                        ?>                
                    </p>
                    <p>
<?= Html::textarea('catatan', null, ['id' => 'catatan', 'class' => 'form-control', 'required' => true]) ?>
                    </p>
                </div>
            </div>


            <p>
                <?=
                yii\bootstrap4\Html::button('Submit', [
                    'class' => 'btn btn-primary',
                    'onClick' => 'submitverifikasi()'
                ]);
                ?>   
            </p>
        </div>
    </div>




</div>
<?php
echo Dialog::widget([
    'libName' => 'krajeeDialogCust',
    'options' => ['type' => Dialog::TYPE_WARNING, 'draggable' => true, 'closable' => true], // custom options
]);
echo Dialog::widget([
    'libName' => 'krajeeDialogCust2',
    'options' => ['type' => Dialog::TYPE_SUCCESS, 'draggable' => true, 'closable' => true], // custom options
]);
?>
<script>
    function submitverifikasi()
    {
        var id_berita_acara = $("#id_berita_acara").val();
        var id_pemohon_pengajuan = $("#id_pemohon_pengajuan").val();
        var status_verifikasi = $("#status_verifikasi").val();
        var catatan = $("#catatan").val();
        if (status_verifikasi == '') {
            alert('Kolom Status verifikasi wajib di isi');
            return false;
        }

        var posting = $.post("<?= yii\helpers\Url::to(['submit-verifikasi']) ?>", {
            id_berita_acara: id_berita_acara,
            id_pemohon_pengajuan: id_pemohon_pengajuan,
            status_verifikasi: status_verifikasi,
            catatan: catatan
        });
        posting.done(function () {
            console.log('done');
        });
        posting.always(function (data) {
            var dataJson = JSON.parse(data);
            krajeeDialogCust2.alert(dataJson.msg);
        })
    }
</script>

<style>
    .modal-content{
        position: absolute
    }
</style>