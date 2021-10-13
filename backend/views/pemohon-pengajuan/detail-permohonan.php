<?php

use kartik\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use kartik\file\FileInput;
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
<div class="panel panel-info">
    <div class="panel-heading">
        <h4 class="panel-title">
            Prosess
        </h4>
    </div>
    <div class="panel-body"><table class="table table-bordered">
            <thead>
                <tr>
                    <th> Pengajuan</th> 
                    <th> Konfirmasi Penerimaan  dan Verifikasi Berkas di loket</th> 
                    <th> Peninjauan Lapangan</th> 
                    <th>  Penerbitan NO.SK</th> 
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>
                        <?= $model['tgl_pengajuan'] ?>
                    </td>
                    <td>
                        <?php
                        $status_pengajuan = "<span class='label label-warning'>Proses</span>";
                        $tgl_verifikasi_pengajuan = '';
                        if ($model['status_pengajuan'] == 1) {
                            $status_pengajuan = "<span class='label label-success'>Berkas Diterima</span>";
                            $tgl_verifikasi_pengajuan = $model['tgl_verifikasi_pengajuan'];
                        } elseif ($model['status_pengajuan'] == 2) {
                            $status_pengajuan = "<span class='label label-danger'>Berkas Ditolak</span>";
                            $tgl_verifikasi_pengajuan = $model['tgl_verifikasi_pengajuan'];
                        }
                        echo $status_pengajuan . '<hr>' . $tgl_verifikasi_pengajuan;
                        ?>
                    </td>
                    <td>
<?php
$query = (new \yii\db\Query())
                ->select('c.no_registrasi,c.id,a.no_ktp,a.nm_pemohon,b.nm_perusahaan,d.nm_jenis_izin,c.tgl_pengajuan,e.tgl_peninjauan,e.id as id_jdwl_peninjauan')
                ->from('data_pemohon a')
                ->innerJoin('data_perusahaan b', 'a.id=b.id_pemohon')
                ->innerJoin('pemohon_pengajuan c', 'a.id=c.id_data_pemohon')
                ->innerJoin('ref_jenis_izin d', 'c.id_jenis_izin = d.id')
                ->innerJoin('persetujuan_permohonan f', 'c.no_registrasi=f.no_registrasi')
                ->leftJoin('jadwal_peninjauan e', 'e.id_pemohon_pengajuan=c.id')
                ->where(['c.no_registrasi' => $model['no_registrasi']])->one();
$status_verifikasi = "<span class='label label-warning'>Proses</span>";
$tgl_verifikasi = '';
$tanggal_peninjauan = "Jadwal Peninjauan Lapangan oleh Tim Teknis : " . $query['tgl_peninjauan'];
if ($model['status_verifikasi'] == 1) {
    $status_verifikasi = "<span class='label label-success'>Verifikasi berhasil</span>";
    $tgl_verifikasi = $model['tgl_verifikasi'];
} elseif ($model['status_verifikasi'] == 2) {
    $status_verifikasi = "<span class='label label-danger'>Verifikasi ditolak, Hubungi admin</span>";
    $tgl_verifikasi_pengajuan = $model['tgl_verifikasi'];
}
echo '</hr> ' . $status_verifikasi . '<hr>' . $tgl_verifikasi.'<hr>'.$tanggal_peninjauan ;
?>
                    </td>
                    <td>
                        <?php
                        $status_selesai = "<span class='label label-warning'>Proses</span>";
                        $tgl_selesai = '';
                        if ($model['status_selesai'] == 1) {
                            $status_selesai = "<span class='label label-success'>Permohonan Perizinan Di Setujui, NO.SK Keluar</span>";
                            $tgl_selesai = $model['tgl_selesai'];
                        } elseif ($model['status_selesai'] == 2) {
                            $status_selesai = "<span class='label label-danger'>Permohonan Ditolak</span>";
                            $tgl_selesai = $model['tgl_selesai'];
                        }
                        echo $status_selesai . '<hr>' . $tgl_selesai;
                        ?>
                    </td>        
                </tr>
            </tbody>

        </table></div>
</div>

<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Daftar Dokumen</h4>
    </div>
    <div class="panel-body">
<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    //  'containerOptions'=>'table-responsive',
    'responsive' => true,
    'hover' => true,
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn'
        ],
        'nm_dok',
        [
            'header' => 'File Berkas',
            'format' => 'raw',
            'value' => function($data) {
                $url = './uploads/' . $data['data_file_upload'];
                return yii\bootstrap\Html::button('Tampil Dokumen', [
                            'title' => 'Tampil Dokumen Persyaratan',
                            'value' => Url::to(['tampil-dok', 'id' => $data['id']]),
                            'class' => 'btn btn-info showModalButton'
                ]);
            }
        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{reupload}',
            'buttons' => [
                'reupload' => function($url, $data) {
                    if ($data['status_berkas'] == 2) {
                        $htmlupload = "<i>Upload Ulang</i>" . '<div class="table-resposive">' . FileInput::widget([
                                    'name' => 'filedoc' . $data['id'],
                                    'pluginOptions' => [
                                        'uploadUrl' => Url::to(['pemohon-upload-file/file-reupload', 'id' => $data['id'], 'name' => 'filedoc' . $data['id'], 'no_registrasi' => $data['no_registrasi']]),
                                        'showPreview' => false,
                                        'showCaption' => true,
                                        'showRemove' => true,
                                        'showUpload' => true
                                    ]
                                ]) . '</div>';
                    } else {
                        $htmlupload = '';
                    }
                    return $htmlupload;
                }
            ]
        ]
    ]
])
?>

    </div>
</div>

        <?php
        Modal::begin([
            'headerOptions' => ['id' => 'modalHeader'],
            'id' => 'modal',
            'size' => 'modal-lg',
            'options' => [
                'style' => ['padding-top' => '70px']
            ],
//'clientOptions' => ['backdrop' => 'static', 'keyboard' => true]
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
        ?>