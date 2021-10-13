<?php

use yii\db\Migration;

class m190406_201641_create_table_konfir_byr_sewa extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%konfir_byr_sewa}}', [
            'id' => $this->primaryKey(),
            'no_reg_sewa' => $this->char(),
            'file_bukti' => $this->char(),
            'tgl_konfir' => $this->date(),
            'tgl_dikonfir' => $this->date(),
            'status_konfir' => $this->integer()->comment('0:belum bayar,1:minta konfirmasi,2:dikonfirmasi,3:tolak'),
        ], $tableOptions);

        $this->createIndex('tgl_dikonfir', '{{%konfir_byr_sewa}}', 'tgl_dikonfir');
        $this->createIndex('tgl_konfir', '{{%konfir_byr_sewa}}', 'tgl_konfir');
        $this->createIndex('no_reg_sewa', '{{%konfir_byr_sewa}}', 'no_reg_sewa');
    }

    public function down()
    {
        $this->dropTable('{{%konfir_byr_sewa}}');
    }
}
