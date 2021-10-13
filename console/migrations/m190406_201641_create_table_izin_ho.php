<?php

use yii\db\Migration;

class m190406_201641_create_table_izin_ho extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%izin_ho}}', [
            'id' => $this->primaryKey(),
            'id_data_pemohon' => $this->integer(),
            'jns_tl' => $this->integer()->comment('Jenis Tarif Lingkungan'),
            'kawasan' => $this->integer(),
            'luas_tinggi' => $this->integer(),
            'jns_jalan' => $this->integer()->comment('Jenis Jalan (Index Lokasi)'),
            'id_ref_nilai_skala' => $this->integer(),
            'nilai_investasi' => $this->float(),
            'tarif_retribusi' => $this->integer(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%izin_ho}}');
    }
}
