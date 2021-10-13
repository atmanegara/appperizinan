<?php

use yii\db\Migration;

class m190406_201640_create_table_berita extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%berita}}', [
            'id' => $this->primaryKey(),
            'id_label' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'slug' => $this->string()->notNull(),
            'id_user' => $this->integer()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'timestamp' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

        $this->createIndex('date', '{{%berita}}', 'date');
        $this->createIndex('FK_ejafung_berita_ejafung_berita_label', '{{%berita}}', 'id_label');
        $this->createIndex('slug', '{{%berita}}', 'slug');
    }

    public function down()
    {
        $this->dropTable('{{%berita}}');
    }
}
