<?php

use yii\db\Migration;

class m190406_201641_create_table_legalitas_perusahaan extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%legalitas_perusahaan}}', [
            'id' => $this->primaryKey(),
            'id_data_perusahaan' => $this->integer(),
            'no_akta' => $this->char(),
            'tgl_berdiri' => $this->date(),
            'nm_notaris' => $this->char(),
            'no_sk_pengesahan' => $this->char(),
            'tgl_pengesahan' => $this->date(),
        ], $tableOptions);

        $this->createIndex('id_data_perusahaan', '{{%legalitas_perusahaan}}', 'id_data_perusahaan');
    }

    public function down()
    {
        $this->dropTable('{{%legalitas_perusahaan}}');
    }
}
