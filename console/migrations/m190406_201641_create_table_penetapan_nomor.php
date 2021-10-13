<?php

use yii\db\Migration;

class m190406_201641_create_table_penetapan_nomor extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%penetapan_nomor}}', [
            'id' => $this->primaryKey(),
            'tahun' => $this->integer()->notNull(),
            'id_pemohon_pengajuan' => $this->integer(),
            'no_sk' => $this->char(),
            'tgl_sk' => $this->date(),
            'tgl_tempo_sk' => $this->date(),
            'id_tanda_tangan' => $this->integer(),
            'status_perizinan' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('tgl_sk', '{{%penetapan_nomor}}', 'tgl_sk');
        $this->createIndex('no_sk', '{{%penetapan_nomor}}', 'no_sk');
        $this->createIndex('id_pemohon_pengajuan', '{{%penetapan_nomor}}', 'id_pemohon_pengajuan');
        $this->createIndex('tgl_tempo_sk', '{{%penetapan_nomor}}', 'tgl_tempo_sk');
        $this->addForeignKey('id_tanda_tangan', '{{%penetapan_nomor}}', 'id_tanda_tangan', '{{%ref_tanda_tangan}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('pemohon_pengajuan', '{{%penetapan_nomor}}', 'id_pemohon_pengajuan', '{{%pemohon_pengajuan}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('status_perizinan', '{{%penetapan_nomor}}', 'status_perizinan', '{{%ref_status_perizinan}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%penetapan_nomor}}');
    }
}
