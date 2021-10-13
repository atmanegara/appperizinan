<?php

use yii\db\Migration;

class m190406_201641_create_table_file_jenis extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%file_jenis}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
            'active' => $this->tinyInteger()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%file_jenis}}');
    }
}
