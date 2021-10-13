<?php

use yii\db\Migration;

class m190406_201642_create_table_ref_tipe_pemohon extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_tipe_pemohon}}', [
            'id' => $this->primaryKey(),
            'kdjenis' => $this->char(),
            'nmjenis' => $this->char(),
        ], $tableOptions);

        $this->createIndex('kdjenis', '{{%ref_tipe_pemohon}}', 'kdjenis');
    }

    public function down()
    {
        $this->dropTable('{{%ref_tipe_pemohon}}');
    }
}
