<?php

use yii\db\Migration;

class m190406_201640_create_table_content extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%content}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull(),
            'position' => $this->integer()->notNull(),
            'title' => $this->string(),
            'content' => $this->text(),
            'id_user' => $this->integer()->notNull(),
            'timestamp' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

        $this->createIndex('position', '{{%content}}', 'position');
        $this->createIndex('type', '{{%content}}', 'type');
    }

    public function down()
    {
        $this->dropTable('{{%content}}');
    }
}
