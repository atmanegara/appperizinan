<?php

use yii\db\Migration;

class m190406_201641_create_table_data_perusahaan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%data_perusahaan}}', [
            'id' => $this->primaryKey(),
            'id_pemohon' => $this->integer()->notNull(),
            'no_npwp' => $this->char(),
            'nm_perusahaan' => $this->string(),
            'nm_gedung' => $this->string(),
            'lantai' => $this->char(),
            'alamat' => $this->string(),
            'rt' => $this->char(),
            'rw' => $this->char(),
            'id_prov' => $this->char(),
            'id_kab' => $this->char(),
            'id_kec' => $this->char(),
            'kodepos' => $this->char(),
            'telp' => $this->string(),
            'fax' => $this->string(),
            'email' => $this->string(),
            'lat' => $this->string(),
            'long' => $this->string(),
        ], $tableOptions);

        $this->createIndex('id_kec', '{{%data_perusahaan}}', 'id_kec');
        $this->createIndex('id_kab', '{{%data_perusahaan}}', 'id_kab');
        $this->createIndex('id_prov', '{{%data_perusahaan}}', 'id_prov');
        $this->createIndex('id_pemohon', '{{%data_perusahaan}}', 'id_pemohon');
    }

    public function down()
    {
        $this->dropTable('{{%data_perusahaan}}');
    }
}
