<?php

use yii\db\Migration;

class m190406_201640_create_table_data_biaya_sewa extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%data_biaya_sewa}}', [
            'id' => $this->primaryKey(),
            'id_bangunan' => $this->integer(),
            'biaya' => $this->integer(),
            'lama' => $this->integer()->defaultValue('1'),
        ], $tableOptions);

        $this->createIndex('id_bangunan', '{{%data_biaya_sewa}}', 'id_bangunan');
    }

    public function down()
    {
        $this->dropTable('{{%data_biaya_sewa}}');
    }
}
