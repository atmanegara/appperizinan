<?php

use yii\db\Migration;

class m190406_201641_create_table_ref_desa extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_desa}}', [
            'id' => $this->primaryKey(),
            'id_kec' => $this->integer(),
            'nm_desa' => $this->char(),
        ], $tableOptions);

        $this->createIndex('id_kec', '{{%ref_desa}}', 'id_kec');
    }

    public function down()
    {
        $this->dropTable('{{%ref_desa}}');
    }
}
