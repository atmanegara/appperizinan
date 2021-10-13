<?php

use yii\db\Migration;

class m190406_201640_create_table_berita_label extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%berita_label}}', [
            'id' => $this->primaryKey(),
            'id_label' => $this->integer()->notNull(),
            'nama' => $this->string()->notNull(),
            'active' => $this->tinyInteger()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_label', '{{%berita_label}}', 'id_label');
    }

    public function down()
    {
        $this->dropTable('{{%berita_label}}');
    }
}
