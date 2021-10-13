<?php

use yii\db\Migration;

class m190406_201641_create_table_ref_jenis_izin extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_jenis_izin}}', [
            'id' => $this->primaryKey(),
            'kd_jenis_izin' => $this->char()->notNull(),
            'nm_jenis_izin' => $this->char(),
        ], $tableOptions);

        $this->createIndex('kd_jenis_izin', '{{%ref_jenis_izin}}', 'kd_jenis_izin');
    }

    public function down()
    {
        $this->dropTable('{{%ref_jenis_izin}}');
    }
}
