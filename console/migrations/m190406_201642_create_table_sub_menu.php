<?php

use yii\db\Migration;

class m190406_201642_create_table_sub_menu extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%sub_menu}}', [
            'id' => $this->primaryKey(),
            'id_menu_header' => $this->integer()->notNull(),
            'nomor_urut' => $this->integer()->notNull(),
            'nama_menu' => $this->string()->notNull(),
            'icon' => $this->string()->notNull()->defaultValue('fa fa-gem'),
            'url' => $this->string()->notNull()->defaultValue('#'),
            'group_user' => $this->string()->notNull()->defaultValue('G,SA'),
            'group_menu' => $this->string()->notNull()->defaultValue('D'),
            'level_menu' => $this->string()->notNull()->defaultValue('1'),
            'status_menu' => $this->string()->notNull()->defaultValue('Y'),
        ], $tableOptions);

        $this->createIndex('id_menu_header', '{{%sub_menu}}', 'id_menu_header');
    }

    public function down()
    {
        $this->dropTable('{{%sub_menu}}');
    }
}
