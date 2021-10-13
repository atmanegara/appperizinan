<?php

use yii\db\Migration;

class m190406_201641_create_table_pemohon_sewa extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pemohon_sewa}}', [
            'id' => $this->primaryKey(),
            'no_reg_sewa' => $this->char()->notNull(),
            'id_data_pemohon' => $this->integer(),
            'id_bangunan' => $this->integer(),
            'biaya_sewa' => $this->integer(),
            'hari' => $this->char(),
            'tgl_sewa' => $this->date(),
            'jam_awal' => $this->time(),
            'jam_akhir' => $this->time(),
            'kegunaan' => $this->text(),
            'nm_pnggung_jwb' => $this->char(),
            'telp' => $this->char(),
        ], $tableOptions);

        $this->createIndex('tgl_sewa', '{{%pemohon_sewa}}', 'tgl_sewa');
        $this->createIndex('id_bangunan', '{{%pemohon_sewa}}', 'id_bangunan');
        $this->createIndex('id_data_pemohon', '{{%pemohon_sewa}}', 'id_data_pemohon');
        $this->createIndex('no_reg_sewa', '{{%pemohon_sewa}}', 'no_reg_sewa');
        $this->createIndex('jam_akhir', '{{%pemohon_sewa}}', 'jam_akhir');
        $this->createIndex('jam_awal', '{{%pemohon_sewa}}', 'jam_awal');
    }

    public function down()
    {
        $this->dropTable('{{%pemohon_sewa}}');
    }
}
