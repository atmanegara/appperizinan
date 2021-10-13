<?php

use yii\db\Migration;

class m190406_201641_create_table_ref_bangunan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_bangunan}}', [
            'id' => $this->primaryKey(),
            'nm_bangunan' => $this->char(),
            'hak_milik' => $this->char(),
            'lokasi_bangunan' => $this->text(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%ref_bangunan}}');
    }
}
