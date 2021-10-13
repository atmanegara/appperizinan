<?php

use yii\db\Migration;

class m190406_201641_create_table_detail_tim_teknis extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%detail_tim_teknis}}', [
            'id' => $this->primaryKey(),
            'id_tim_teknis' => $this->integer(),
            'nip' => $this->char(),
            'nama' => $this->string(),
            'jabatan' => $this->string(),
            'ket' => $this->string(),
        ], $tableOptions);

        $this->addForeignKey('id_tim_teknis', '{{%detail_tim_teknis}}', 'id_tim_teknis', '{{%ref_tim_teknis}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%detail_tim_teknis}}');
    }
}
