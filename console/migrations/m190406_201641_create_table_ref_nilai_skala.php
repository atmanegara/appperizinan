<?php

use yii\db\Migration;

class m190406_201641_create_table_ref_nilai_skala extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_nilai_skala}}', [
            'id' => $this->primaryKey(),
            'kd_gol' => $this->integer(),
            'id_ref_kategori' => $this->integer(),
            'skala_1' => $this->float(),
            'skala_2' => $this->float(),
            'ket' => $this->string(),
            'tarif' => $this->float(),
        ], $tableOptions);

        $this->createIndex('id_kategori', '{{%ref_nilai_skala}}', 'id_ref_kategori');
        $this->createIndex('kd_gol', '{{%ref_nilai_skala}}', 'kd_gol');
    }

    public function down()
    {
        $this->dropTable('{{%ref_nilai_skala}}');
    }
}
