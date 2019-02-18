<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%callback}}`.
 */
class m190213_124448_create_callback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%callback}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'done_at' => $this->integer(),
            'viewed' => $this->integer(1)->defaultValue(0),
            'name' => $this->text(),
            'phone' => $this->text(),
            'type' => $this->integer(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%callback}}');
    }
}
