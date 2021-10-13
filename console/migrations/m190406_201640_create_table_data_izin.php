<?php

use yii\db\Migration;

class m190406_201640_create_table_data_izin extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%data_izin}}', [
            'id' => $this->primaryKey(),
            'id_penetapan_nomor' => $this->integer()->notNull(),
            'tgl_surat' => $this->date()->notNull(),
            'isi_surat' => $this->text()->notNull(),
            'file_surat' => $this->string()->notNull(),
            'id_ref_ttd' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_penetapan_nomor', '{{%data_izin}}', 'id_penetapan_nomor');
        $this->createIndex('tgl_surat', '{{%data_izin}}', 'tgl_surat');
        $this->addForeignKey('id_ref_ttd', '{{%data_izin}}', 'id_ref_ttd', '{{%ref_tanda_tangan}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%data_izin}}');
    }
}
