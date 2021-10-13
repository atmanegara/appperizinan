<?php

use yii\db\Migration;

class m190406_201641_create_table_data_pribadi extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%data_pribadi}}', [
            'id' => $this->primaryKey(),
            'nik' => $this->integer(),
            'nama' => $this->string(),
            'tmp_lahir' => $this->char(),
            'tgl_lahir' => $this->date(),
            'jkel' => $this->string(),
            'id_agama' => $this->integer(),
            'alamat' => $this->string(),
            'rt' => $this->char(),
            'rw' => $this->char(),
            'id_prov' => $this->integer(),
            'id_kab' => $this->integer(),
            'id_kec' => $this->integer(),
            'id_kel' => $this->integer(),
            'kodepos' => $this->integer(),
            'telp' => $this->char(),
        ], $tableOptions);

        $this->createIndex('id_prov', '{{%data_pribadi}}', 'id_prov');
        $this->createIndex('id_agama', '{{%data_pribadi}}', 'id_agama');
        $this->createIndex('nik', '{{%data_pribadi}}', 'nik');
        $this->createIndex('id_kel', '{{%data_pribadi}}', 'id_kel');
        $this->createIndex('id_kec', '{{%data_pribadi}}', 'id_kec');
        $this->createIndex('id_kab', '{{%data_pribadi}}', 'id_kab');
    }

    public function down()
    {
        $this->dropTable('{{%data_pribadi}}');
    }
}
