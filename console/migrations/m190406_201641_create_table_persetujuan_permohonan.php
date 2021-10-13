<?php

use yii\db\Migration;

class m190406_201641_create_table_persetujuan_permohonan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%persetujuan_permohonan}}', [
            'id' => $this->primaryKey(),
            'no_registrasi' => $this->char(),
            'pilih' => $this->string(),
        ], $tableOptions);

        $this->createIndex('no_registrasi', '{{%persetujuan_permohonan}}', 'no_registrasi');
    }

    public function down()
    {
        $this->dropTable('{{%persetujuan_permohonan}}');
    }
}
