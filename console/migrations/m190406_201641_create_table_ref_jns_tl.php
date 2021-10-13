<?php

use yii\db\Migration;

class m190406_201641_create_table_ref_jns_tl extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_jns_tl}}', [
            'id' => $this->primaryKey(),
            'nm_jns_tl' => $this->char(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%ref_jns_tl}}');
    }
}
