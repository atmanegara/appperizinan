<?php

use yii\db\Migration;

class m190406_201642_create_table_tarif_jns_tl extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tarif_jns_tl}}', [
            'id' => $this->primaryKey(),
            'id_ref_jns_tl' => $this->integer(),
            'id_lok_jns_tl' => $this->integer(),
            'awal_luas_t' => $this->float(),
            'akhir_luas_t' => $this->float(),
            'tarif' => $this->float(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%tarif_jns_tl}}');
    }
}
