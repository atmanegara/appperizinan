<?php

use yii\db\Migration;

class m190406_201641_create_table_jadwal_peninjauan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%jadwal_peninjauan}}', [
            'id' => $this->primaryKey(),
            'id_pemohon_pengajuan' => $this->integer(),
            'id_tim_teknis' => $this->integer(),
            'tgl_peninjauan' => $this->date(),
            'ket' => $this->char(),
        ], $tableOptions);

        $this->createIndex('id_tim_teknis', '{{%jadwal_peninjauan}}', 'id_tim_teknis');
        $this->createIndex('id_pemohon_pengajuan', '{{%jadwal_peninjauan}}', 'id_pemohon_pengajuan');
    }

    public function down()
    {
        $this->dropTable('{{%jadwal_peninjauan}}');
    }
}
