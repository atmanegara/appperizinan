<?php

use yii\db\Migration;

class m190406_201640_create_table_data_pemohon extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%data_pemohon}}', [
            'id' => $this->primaryKey(),
            'id_tipe_pemohon' => $this->integer(),
            'no_ktp' => $this->char(),
            'no_npwp' => $this->char(),
            'id_jns_bdn_usaha' => $this->integer(),
            'nm_pemohon' => $this->char(),
            'nm_pmilik_bu' => $this->char()->comment('nama pemilik badan usaha'),
            'alamat_pemohon' => $this->char(),
            'id_prov' => $this->char(),
            'id_kabkot' => $this->char(),
            'id_desa' => $this->char(),
            'id_kec' => $this->char(),
            'email_pemohon' => $this->char(),
            'telp_pemohon' => $this->char(),
            'create_date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

        $this->createIndex('no_npwp', '{{%data_pemohon}}', 'no_npwp');
        $this->createIndex('no_ktp', '{{%data_pemohon}}', 'no_ktp');
        $this->createIndex('id_tipe_pemohon', '{{%data_pemohon}}', 'id_tipe_pemohon');
        $this->createIndex('id_kabkot', '{{%data_pemohon}}', 'id_kabkot');
        $this->createIndex('id_prov', '{{%data_pemohon}}', 'id_prov');
        $this->createIndex('id_kec', '{{%data_pemohon}}', 'id_kec');
        $this->createIndex('id_desa', '{{%data_pemohon}}', 'id_desa');
        $this->addForeignKey('id_jns_bdn_usaha', '{{%data_pemohon}}', 'id_jns_bdn_usaha', '{{%ref_jenis_bdn_usaha}}', 'id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%data_pemohon}}');
    }
}
