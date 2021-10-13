<?php

use yii\db\Migration;

class m190406_201641_create_table_ref_indeks_lok extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_indeks_lok}}', [
            'id' => $this->primaryKey(),
            'nm_jns_index' => $this->char(),
            'nilai_index' => $this->integer(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%ref_indeks_lok}}');
    }
}
