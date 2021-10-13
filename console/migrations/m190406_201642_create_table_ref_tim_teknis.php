<?php

use yii\db\Migration;

class m190406_201642_create_table_ref_tim_teknis extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%ref_tim_teknis}}', [
            'id' => $this->primaryKey(),
            'nm_teknisi' => $this->char(),
            'tgl_terbentuk' => $this->date(),
            'status_tim' => $this->string()->defaultValue('N'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%ref_tim_teknis}}');
    }
}
