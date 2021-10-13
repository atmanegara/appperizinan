<?php

use yii\db\Migration;

class m190406_201641_create_table_menu_header extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%menu_header}}', [
            'id' => $this->primaryKey(),
            'urutan' => $this->integer()->notNull(),
            'nama_menu' => $this->string(),
            'icon' => $this->string()->defaultValue('fa fa-th-large'),
            'url' => $this->string()->defaultValue('#'),
            'group_menu' => $this->char()->defaultValue('H'),
            'sub_menu' => $this->string()->defaultValue('N'),
            'group_user' => $this->char()->defaultValue('SA'),
            'status_menu' => $this->string()->defaultValue('N'),
        ], $tableOptions);

        $this->createIndex('urutan', '{{%menu_header}}', 'urutan');
    }

    public function down()
    {
        $this->dropTable('{{%menu_header}}');
    }
}
