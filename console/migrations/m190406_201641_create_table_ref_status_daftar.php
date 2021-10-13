<?php

use yii\db\Migration;

class m190406_201641_create_table_ref_status_daftar extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_status_daftar}}', [
            'id' => $this->primaryKey(),
            'status_daftar' => $this->char(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%ref_status_daftar}}');
    }
}
