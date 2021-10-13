<?php

use yii\db\Migration;

class m190406_201641_create_table_detail_jenis_izin extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%detail_jenis_izin}}', [
            'id' => $this->primaryKey(),
            'id_jenis_izin' => $this->integer(),
            'id_jenis_permohonan' => $this->integer(),
            'no_urut' => $this->integer(),
            'nm_dok' => $this->string(),
        ], $tableOptions);

        $this->createIndex('id_jenis_permohonan', '{{%detail_jenis_izin}}', 'id_jenis_permohonan');
        $this->createIndex('id_jenis_izin', '{{%detail_jenis_izin}}', 'id_jenis_izin');
    }

    public function down()
    {
        $this->dropTable('{{%detail_jenis_izin}}');
    }
}
