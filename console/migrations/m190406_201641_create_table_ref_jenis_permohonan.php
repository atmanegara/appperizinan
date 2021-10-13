<?php

use yii\db\Migration;

class m190406_201641_create_table_ref_jenis_permohonan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_jenis_permohonan}}', [
            'id' => $this->primaryKey(),
            'nm_jenis_permohonan' => $this->char(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%ref_jenis_permohonan}}');
    }
}
