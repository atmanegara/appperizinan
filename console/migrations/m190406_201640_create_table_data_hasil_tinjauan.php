<?php

use yii\db\Migration;

class m190406_201640_create_table_data_hasil_tinjauan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%data_hasil_tinjauan}}', [
            'id' => $this->primaryKey(),
            'no_registrasi' => $this->char(),
            'id_pemohon_pengajuan' => $this->integer(),
            'id_tim_teknis' => $this->char()->notNull(),
            'keterangan' => $this->text()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_tim_teknis', '{{%data_hasil_tinjauan}}', 'id_tim_teknis');
        $this->createIndex('id_pemohon_pengajuan', '{{%data_hasil_tinjauan}}', 'id_pemohon_pengajuan');
        $this->createIndex('no_registrasi', '{{%data_hasil_tinjauan}}', 'no_registrasi');
    }

    public function down()
    {
        $this->dropTable('{{%data_hasil_tinjauan}}');
    }
}
