<?php

use yii\db\Migration;

class m190406_201641_create_table_pemohon_pengajuan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pemohon_pengajuan}}', [
            'id' => $this->primaryKey(),
            'tahun' => $this->integer()->notNull(),
            'no_registrasi' => $this->char()->notNull(),
            'id_user' => $this->integer(),
            'id_data_pemohon' => $this->integer(),
            'id_data_perusahaan' => $this->integer(),
            'id_jenis_izin' => $this->integer(),
            'id_jenis_permohonan' => $this->integer(),
            'id_jenis_bdn_usaha' => $this->integer(),
            'lokasi_izin' => $this->text(),
            'status_pengajuan' => $this->integer()->comment('pengajuan ke loket ,0:proses,1:selesai,2:tolak'),
            'status_verifikasi' => $this->integer()->comment('verifikasi dr kasi, 0:proses,1 selesai,2:tolak'),
            'status_selesai' => $this->integer()->comment('verifikasi SK , selesai : 0:proses,1 selesai,2:tolak '),
            'tgl_pengajuan' => $this->dateTime()->comment('tanggal pegajuan / upload berkas'),
            'tgl_verifikasi_pengajuan' => $this->dateTime()->comment('tanggal verifikasi pengajuan berkas Onllie oleh loket '),
            'tgl_verifikasi' => $this->dateTime()->comment('tanggal verifikasi kasi'),
            'tgl_selesai' => $this->dateTime()->comment('tanggal selesai keluar SK'),
            'id_status_daftar' => $this->integer()->defaultValue('1')->comment('1:online,2:offline'),
            'status_kunci' => $this->string(),
            'catatan_verifikasi_pengajuan' => $this->text(),
            'catatan_verifikasi' => $this->text(),
            'catatan_selesai' => $this->text(),
        ], $tableOptions);

        $this->createIndex('id_jenis_izin', '{{%pemohon_pengajuan}}', 'id_jenis_izin');
        $this->createIndex('id_data_pemohon', '{{%pemohon_pengajuan}}', 'id_data_pemohon');
        $this->createIndex('id_user', '{{%pemohon_pengajuan}}', 'id_user');
        $this->createIndex('id_data_perusahaan', '{{%pemohon_pengajuan}}', 'id_data_perusahaan');
        $this->createIndex('id_jenis_bdn_usaha', '{{%pemohon_pengajuan}}', 'id_jenis_bdn_usaha');
        $this->createIndex('tgl_selesai', '{{%pemohon_pengajuan}}', 'tgl_selesai');
        $this->createIndex('tgl_verifikasi', '{{%pemohon_pengajuan}}', 'tgl_verifikasi');
        $this->createIndex('tgl_pengajuan', '{{%pemohon_pengajuan}}', 'tgl_pengajuan');
        $this->createIndex('no_registrasi', '{{%pemohon_pengajuan}}', 'no_registrasi');
        $this->createIndex('id_jenis_permohonan', '{{%pemohon_pengajuan}}', 'id_jenis_permohonan');
    }

    public function down()
    {
        $this->dropTable('{{%pemohon_pengajuan}}');
    }
}
