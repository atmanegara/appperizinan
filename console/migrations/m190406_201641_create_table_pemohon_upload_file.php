<?php

use yii\db\Migration;

class m190406_201641_create_table_pemohon_upload_file extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pemohon_upload_file}}', [
            'id' => $this->primaryKey(),
            'tahun' => $this->integer(),
            'no_registrasi' => $this->char(),
            'id_jenis_izin' => $this->integer(),
            'id_jenis_permohonan' => $this->integer(),
            'id_detail_jenis_izin' => $this->integer(),
            'data_file_upload' => $this->string(),
            'status_berkas' => $this->integer()->comment('0:file proses,1:file OK,2:file Failed'),
        ], $tableOptions);

        $this->createIndex('tahun', '{{%pemohon_upload_file}}', 'tahun');
        $this->createIndex('no_registrasi', '{{%pemohon_upload_file}}', 'no_registrasi');
        $this->createIndex('id', '{{%pemohon_upload_file}}', 'id');
        $this->createIndex('id_detail_jenis_izin', '{{%pemohon_upload_file}}', 'id_detail_jenis_izin');
        $this->createIndex('id_jenis_permohonan', '{{%pemohon_upload_file}}', 'id_jenis_permohonan');
        $this->createIndex('id_jenis_izin', '{{%pemohon_upload_file}}', 'id_jenis_izin');
    }

    public function down()
    {
        $this->dropTable('{{%pemohon_upload_file}}');
    }
}
