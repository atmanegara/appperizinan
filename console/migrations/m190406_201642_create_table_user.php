<?php

use yii\db\Migration;

class m190406_201642_create_table_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'nip' => $this->char()->comment('id_pemohon'),
            'username' => $this->string()->notNull(),
            'auth_key' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'email' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue('10'),
            'kode_group_user' => $this->char(),
            'id_tipe_pemohon' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('password_reset_token', '{{%user}}', 'password_reset_token', true);
        $this->createIndex('email', '{{%user}}', 'email', true);
        $this->createIndex('username', '{{%user}}', 'username', true);
        $this->createIndex('id_tipe_pemohon', '{{%user}}', 'id_tipe_pemohon');
        $this->createIndex('nip', '{{%user}}', 'nip');
        $this->createIndex('kode_group_user', '{{%user}}', 'kode_group_user');
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
