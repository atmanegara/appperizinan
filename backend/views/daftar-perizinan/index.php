<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\DetailView;
use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataPemohonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pemohons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-pemohon-index">
    <?php
    $hak_user = Yii::$app->user->identity->kode_group_user;
    if (in_array($hak_user, ['PORG'])) {
        ?>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">
                Data Pemohon
            </h4>
            
        </div>
        <div class="panel-body">
              <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                //      'id',
                //      'id_tipe_pemohon',
                'no_ktp',
                'no_npwp',
                //    'id_jns_bdn_usaha',
                'nm_pemohon',
                //      'nm_pmilik_bu',
                'alamat_pemohon',
                //       'id_desa',
                //       'id_kec',
                'email_pemohon:email',
                'telp_pemohon',
            ],
        ])
        ?>
        </div>
    </div>
      
    <?php }
    ?>
        <?php Pjax::begin(); ?>
   
    <p>
    <?= Html::a('Buat Pengajuan Permohonan Baru', ['#pemohon-pengajuan/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-primary">
        <div class="panel panel-heading">
            <h4 class="panel-title">Daftar Permohonan</h4>
        </div>
        <div class="panel-body">
                <?=
    kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'no_registrasi',
            'nm_jenis_izin',
            'nm_jenis_permohonan',
            'tgl_pengajuan',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{upload} {cetakbukti} {riwayat} ',
                'buttons' => [
                    'upload' => function ($url, $data) {
                        $url = Url::to(['#pemohon-upload-file/create', 'no_registrasi' => $data['no_registrasi']]);
                       $query = \backend\models\PersetujuanPermohonan::find()
                                        ->where(['no_registrasi' => $data['no_registrasi']])->exists();
                        if ($query > 0) {
                            $htmlbutton = Html::a('Upload File Berkas Syarat', '#', [
                                        'class' => 'btn btn-warning',
                                  'disabled' => true
                            ]);
                        } else {
                            $htmlbutton =yii\bootstrap\Html::a('Upload File Berkas Syarat', $url, [
                                    'class' => 'btn btn-primary'
                        ]);
                        }
                        return $htmlbutton;
                    },
                    'cetakbukti' => function($url, $data) {
                        $url = Url::to(['#daftar-perizinan/preview-bukti', 'no_registrasi' => $data['no_registrasi']]);
                        $query = \backend\models\PersetujuanPermohonan::find()
                                        ->where(['no_registrasi' => $data['no_registrasi']])->exists();
                        if ($query > 0) {
                            $htmlbutton = Html::a('Cetak Bukti', $url, [
                                        'class' => 'btn btn-warning'
                            ]);
                        } else {
                            $htmlbutton = Html::button('Cetak Bukti', [
                                        'class' => 'btn btn-warning',
                                        'disabled' => true
                            ]);
                        }
                        return $htmlbutton;
                    },
                            'riwayat'=>function($url,$data){
                            $url = Url::to(['#pemohon-pengajuan/detail-permohonan','no_registrasi'=>$data['no_registrasi']]);
                            return \yii\bootstrap\Html::a('Detail', $url, [
                                'class'=>'btn btn-info'
                            ]);
                            }
                ]],
        ],
    ]);
    ?>
        </div>
    </div>

<?php Pjax::end(); ?>
</div>
