<?php

use yii\db\Migration;

class m190406_201641_create_table_ref_kec extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_kec}}', [
            'id' => $this->integer()->notNull(),
            'nm_kec' => $this->char(),
        ], $tableOptions);

        $this->createIndex('id', '{{%ref_kec}}', 'id');
        $this->addForeignKey('ref_kec_ibfk_1', '{{%ref_kec}}', 'id', '{{%ref_desa}}', 'id_kec', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%ref_kec}}');
    }
}
