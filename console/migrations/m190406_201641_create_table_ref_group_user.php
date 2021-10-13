<?php

use yii\db\Migration;

class m190406_201641_create_table_ref_group_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_group_user}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->char()->notNull(),
            'uraian' => $this->string(),
            'url' => $this->char(),
            'layout_menu' => $this->char(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%ref_group_user}}');
    }
}
