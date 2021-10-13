<?php

use yii\db\Migration;

class m190406_201641_create_table_file extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%file}}', [
            'id' => $this->primaryKey(),
            'id_file_jenis' => $this->integer()->notNull(),
            'id_post' => $this->integer()->notNull(),
            'position' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'filename' => $this->string()->notNull(),
            'timestamp' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

        $this->createIndex('FK_ejafung_file_ejafung_file_jenis', '{{%file}}', 'id_file_jenis');
        $this->createIndex('id_post', '{{%file}}', 'id_post');
    }

    public function down()
    {
        $this->dropTable('{{%file}}');
    }
}
