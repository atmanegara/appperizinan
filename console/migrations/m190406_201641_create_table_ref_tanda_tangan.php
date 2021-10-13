<?php

use yii\db\Migration;

class m190406_201641_create_table_ref_tanda_tangan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_tanda_tangan}}', [
            'id' => $this->primaryKey(),
            'nip' => $this->char(),
            'nm_pejabat' => $this->char(),
            'jabatan' => $this->char(),
            'status_ttd' => $this->string()->comment('Y:aktif;N:non Aktif'),
        ], $tableOptions);

        $this->createIndex('status_ttd', '{{%ref_tanda_tangan}}', 'status_ttd');
        $this->createIndex('nip', '{{%ref_tanda_tangan}}', 'nip');
    }

    public function down()
    {
        $this->dropTable('{{%ref_tanda_tangan}}');
    }
}
