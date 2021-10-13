<?php

use yii\db\Migration;

class m190406_201640_create_table_berita_acara extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%berita_acara}}', [
            'id' => $this->primaryKey(),
            'id_pemohon_pengajuan' => $this->integer()->notNull(),
            'no_berita' => $this->char(),
            'tgl_berita' => $this->date(),
            'isi_berita' => $this->text(),
            'file_berita' => $this->string(),
        ], $tableOptions);

        $this->createIndex('id_pemohon_pengajuan', '{{%berita_acara}}', 'id_pemohon_pengajuan');
        $this->createIndex('tgl_berita', '{{%berita_acara}}', 'tgl_berita');
        $this->createIndex('no_berita', '{{%berita_acara}}', 'no_berita');
    }

    public function down()
    {
        $this->dropTable('{{%berita_acara}}');
    }
}
