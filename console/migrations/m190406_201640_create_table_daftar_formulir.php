<?php

use yii\db\Migration;

class m190406_201640_create_table_daftar_formulir extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%daftar_formulir}}', [
            'id' => $this->primaryKey(),
            'nm_formulir' => $this->string(),
            'file_formulir' => $this->string(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%daftar_formulir}}');
    }
}
