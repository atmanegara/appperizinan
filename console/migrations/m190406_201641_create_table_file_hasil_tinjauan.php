<?php

use yii\db\Migration;

class m190406_201641_create_table_file_hasil_tinjauan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%file_hasil_tinjauan}}', [
            'id' => $this->primaryKey(),
            'tahun' => $this->integer(),
            'no_registrasi' => $this->char(),
            'tgl_upload' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'file_tinjauan' => $this->string(),
        ], $tableOptions);

        $this->createIndex('no_registrasi', '{{%file_hasil_tinjauan}}', 'no_registrasi');
    }

    public function down()
    {
        $this->dropTable('{{%file_hasil_tinjauan}}');
    }
}
