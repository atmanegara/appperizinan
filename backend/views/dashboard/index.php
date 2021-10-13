<?php

use kartik\grid\GridView;
use yii\bootstrap\Html;

$detail = Yii::$app->request->get('detail');
?>

<div class="data-biaya-sewa-index">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Daftar Permohonan</h4>
        </div>
        <div class="panel-body">
            <?php
            switch ($detail) {
                case 'baru':
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            'nm_jenis_izin',
                            'nm_jenis_permohonan',
                            'tgl_pengajuan'
                        ]
                    ]);
                    break;
                case 'verifikasi':
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            'nm_jenis_izin',
                            'nm_jenis_permohonan',
                            'tgl_verifikasi'
                        ]
                    ]);
                    break;
                case 'selesai':
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            'nm_jenis_izin',
                            'nm_jenis_permohonan',
                            'tgl_selesai'
                        ]
                    ]);
                    break;
                  case 'tolak':
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            'nm_jenis_izin',
                            'nm_jenis_permohonan',
                            'tgl_selesai'
                        ]
                    ]);
                    break;
            }
            ?>
        </div>
    </div>
</div>
